# Laravel TinyPesa Integration

This Laravel package integrates TinyPesa, a powerful payment gateway, into your Laravel application. With this package, you can easily process mobile money payments using TinyPesa's API.

## Features

- Seamless integration with the TinyPesa payment gateway
- Process mobile money payments with ease
- Store transaction details in your application's database
- Handle callbacks to update transaction statuses
- Simple and intuitive API for easy usage

## Getting Started

To get started with Laravel TinyPesa integration, follow these steps:

1. Install the package using Composer:

   ```shell
   composer require mcomps/laravel-tinypesa
   ```

2. Publish the Package Assets (Optional)

   If you want to customize the default views provided by the package, you can publish them to your application's `resources/views` directory:

   ```shell
   php artisan vendor:publish --tag=tinypesa-views
   ```

   This will give you access to the default views, which you can modify according to your application's design.

3. Configure Your TinyPesa API Credentials

   Obtain your API key from the [TinyPesa website](https://tinypesa.com). Add the following entries to your `.env` file:

   ```
   TINYPESA_API_KEY=your-api-key
   ```

4. Run the Migration

   Run the migration to create the `tinypesa` table in your database:

   ```shell
   php artisan migrate
   ```

5. Customize Your Payment Form and Payment Logic

   Customize your payment form and payment logic based on your application's requirements. Use the `TinyPesa` facade to initiate the payment process and handle the response.

   ```php
   use Mcomps\TinyPesa\Facades\TinyPesa;

   public function payNow()
   {
       // Enter your payment logic here
   }
   ```

6. Implement the Callback Handler

   Implement the callback handler to update the transaction status based on the callback response from TinyPesa.

   ```php
   Route::post('/tinypesa/callback', [PaymentController::class, 'handleCallback']);

   public function handleCallback()
   {
       // Handle the callback response here
   }
   ```

7. Customize Your Views and User Interface

   If you have published the package views, customize them in your application's `resources/views` directory. Modify the payment form and transaction status views to match your application's design.

## Advantages of Laravel TinyPesa Integration

- Seamless Integration: The package is specifically built for Laravel, ensuring smooth integration with your Laravel applications.
- Secure and Reliable: TinyPesa is a trusted payment gateway that guarantees secure and reliable mobile money transactions.
- Efficient Transaction Handling: The package provides an intuitive API for handling payment initiation, callback handling, and transaction status updates.
- Database Storage: Transaction details can be stored in your application's database for future reference and reporting.
- Customization Options: You can easily customize the payment form, user interface, and transaction handling logic to suit your specific needs.

For more details and usage instructions, please refer to the package documentation.

## Sponsorship and Contributions

The Laravel TinyPesa Integration package is proudly sponsored and maintained by Mcomps. We are dedicated to providing high-quality Laravel packages and excellent support. To contribute to the development of this package or become a sponsor, please visit the Mcomps website at [mcomps.co.ke](https://mcomps.co.ke).

We appreciate the contributions of all sponsors, contributors, and users of this package. Your support helps us continue to improve and enhance the package.

## License

The Laravel TinyPesa Integration package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT). You are free to use, modify, and distribute the package in accordance with the terms of the license.

For more information, please visit the official Laravel and TinyPesa websites:

- [Laravel](https://laravel.com)
- [TinyPesa](https://tinypesa.com)
- [Mcomps](https://mcomps.co.ke)

Enjoy seamless mobile money payments with Laravel TinyPesa Integration!
```

I hope this revised version meets your requirements. Let me know if you need any further assistance.

Please write in English language.
