# Laravel Mobile Phone Verification Demo

This is a Laravel 9 demo project with verifying the phone number via SMS, after the registration.

The goal was to mimic a similar process as in the official [Email Verification](https://laravel.com/docs/9.x/verification) feature of Laravel.

Registration process is based on Laravel Breeze.

SMS Sending is performed with Notifications, based on Vonage (ex Nexmo) provider, which is [officially supported by Laravel](https://laravel.com/docs/9.x/notifications#sms-notifications).

## Usage

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- That's it: launch the main URL and click `Register` on the top-right

---

## More from Laravel Daily

- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/?utm_source=github&utm_campaign=mobile-phone-verification)
- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com/?utm_source=github&utm_campaign=mobile-phone-verification)
- Subscribe to our [YouTube channel Laravel Daily](https://www.youtube.com/c/LaravelDaily)
- Subscribe to our [newsletter with 20+ Laravel links every Thursday](http://laraveldaily.com/weekly-laravel-newsletter/)
