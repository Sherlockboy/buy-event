# Buy-event

Simple e-commerce feature. Users make request to buy products, then admin accepts it. When admin accepts notification will be sent by mail or sms depends on choice of admin

## Installation

1. Clone the repository

```bash
git clone https://github.com/Sherlockboy/buy-event.git
```
or
```bash
git clone git@github.com:Sherlockboy/buy-event.git
```

2. Open project folder

```bash
cd buy-event
```

3. Copy contents of .env.example to .env file

```bash
cp .env.example .env
```

4. Run composer to install dependencies

```bash
composer install
```

5. Run migrations with seeders

```bash
php artisan migrate --seed
```

5. Run application

```bash
php artisan serve
```

## Default users

Admin
```bash
email: admin@doe.com
password: admin123
```

User
```bash
email: user@doe.com
password: user123
```

You can register as many users as you want in register page.

## Additional features

In order to use SMS and Mail notifications when admin accepts orders you must have basic setup for these channels:

1. SMS
Open [ClickSend](https://www.clicksend.com) website and create account, then you will have api key. Copy and paste your username and api key into .env file:
```bash
CLICK_SEND_USERNAME=your_username
CLICK_SEND_API_KEY=your_api_key
CLICK_SEND_ENDPOINT=https://rest.clicksend.com/v3/
```

2. Mail
You have lots of options to choose your Mail server, but now I will give an example of gmail server. First you must have google account, then fill the .env file with your account credentials:
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_google_account
MAIL_PASSWORD=your_google_account_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_google_account
MAIL_FROM_NAME="${APP_NAME}"
```
Basically, that's it. If you have problems with sending email over your google account please read [this answer](https://stackoverflow.com/questions/42558903/expected-response-code-250-but-got-code-535-with-message-535-5-7-8-username) on stackoverflow.
