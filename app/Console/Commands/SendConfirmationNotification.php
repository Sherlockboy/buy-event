<?php

namespace App\Console\Commands;

use App\Mail\OrderAccepted;
use App\Models\Notification;
use App\Models\User;
use App\Services\SmsService;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendConfirmationNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:confirmation 
                            {user : ID of the user} 
                            {--m : Send confirmation over mail} 
                            {--s : Send confirmation over sms}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send order confirmation to user by SMS or Mail';

    protected $service;

    protected $message;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new SmsService();
        $this->message = "Your purchase is confirmed!";
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!$this->argument('user')){
            $this->alert("Please enter USER ID!");
        }
        
        $user = User::find($this->argument('user'));
        
        if($user) {
            if($this->option('m')) {
                $mail_response = $this->sendMail($user->email);
            }
    
            if($this->option('s')) {
                $sms_response = $this->sendSms($user->phone);
            }
            
            $this->showResultTable($mail_response ?? 0, $sms_response ?? 0, $user);

            $this->saveNotification($user->id, $this->option('m'), $this->option('s'));
        } else {
            $this->alert("User with ID={$this->argument('user')} is not found!");
        }
    }
    
    protected function sendMail($email)
    {
        try {
            Mail::to($email)
                ->send(new OrderAccepted($this->message));
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            $this->error('Could not send Email, please try again!');
            
            return 500;
        }

        return 200;
    }

    protected function sendSms($phone)
    {
        try {
            $this->service->send($this->message, $phone);
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            $this->error('Could not send SMS, please try again!');
            
            return 500;
        }

        return 200;
    }

    protected function showResultTable(int $mail_res, int $sms_res, User $user)
    {
        $this->table(
            ['USER ID', 'USER NAME', 'MAIL', 'SMS'],
            [
                [
                    $user->id,
                    $user->name,
                    $this->option('m')
                        ? ($mail_res == 200 ? 'SENT' : 'COULD NOT SENT')
                        : 'NOT SELECTED',
                    $this->option('s')
                        ? ($sms_res == 200 ? 'SENT' : 'COULD NOT SENT')
                        : 'NOT SELECTED'
                ]
            ] 
        );   
    }

    protected function saveNotification(int $user_id, $is_mail, $is_sms)
    {
        $notification = Notification::create([
            'user_id' => $user_id,
            'is_mail' => $is_mail,
            'is_sms' => $is_mail
        ]);
        
        if(!$notification){
            $this->error('Could not save notification into database.');
        }

        $this->info('Notification saved into database.');
    }
}
