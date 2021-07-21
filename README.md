<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Laravel OAuth :clap:

This project is for fun to try the [OAuth](https://en.wikipedia.org/wiki/OAuth) providers outside there. This project is using [Laravel Sociallite](https://laravel.com/docs/8.x/socialite) to communicate with the [OAuth](https://en.wikipedia.org/wiki/OAuth) providers.

## How to use it

1. First you can clone or fork this projek into your local repository.
2. Please make an `.env` file from `.env.example` file.
3. If you already have client id and client secret for both google and facebook or one of them, you can paste it in the `.env` at th provided space
4. Do composer install to make your packages is update
```sh
composer install
```
5. Finally you can run your [Laravel](https://laravel.com) Server by typing this command
```sh
php artisan serve
```

## Application

Right now, there are only 2 applications that I connect. Those are:
- **[Facebook](https://developers.facebook.com/docs/facebook-login/web/)**
- **[Google](https://developers.google.com/identity/protocols/oauth2)**

## License

This projek is open-sourced and feel free :hugs: if you want to add the other application to this project. If you want to contribute more, just follow this guides or you can check through [Laravel Sociallite](https://laravel.com/docs/8.x/socialite) documentation directly.

These are the steps if you want to contribute:
1. Create an application id and secret on the application website you want
2. Don't forget to do composer install
```sh
composer install
```
3. After getting the id and the secret, save it in the .env file
4. Open `config/services.php` and you can add the client configuration
```php
'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('FACEBOOK_REDIRECT_URL'),
],
```
5. You can add 2 routes to authenticate the user to OAuth provider. [Sociallite](https://laravel.com/docs/8.x/socialite) will take care  `redirect` method for redirecting to the OAuth provider. And `user` method will give you the user information.
```php
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
});
```
Callback route is used when the OAuth provider already complete the authentication
6. For the final steps, you can add anchor tag with the redirect URL in the blade file :laughing: