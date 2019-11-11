# Toolchain

> Currently, we developed our web app with Firefox support
> in mind. All Chromium engines should work fine as well. 
> Internet Explorer users may will experience layout glitches.

## Setup
### Requirements
- PHP >7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

--- 
 
### Bundles commands for starting the application
```bash
yarn && yarn run production
composer install
php artisan migrate
php artisan serve
```

For running toolchain, you need an OAuth private and public token from Google. 
In the developer console of Google, you can create your own project. Then you
can setup an token for single-sign on. Just add this token to your environment 
config. 

The database file is located as a sqlite file in the storage folder. After setting 
up a token for single-sign on, you have to add email addresses on a whitelist.
After a initial launch of the application, there'll be a whitelist.json in the storage
folder. Please add all addresses for users which should read or manage the services.
Manage does mean, that a user can create and remove services. Viewing allow to user 
to sign-in into your instance.

---

### Composer configuration
````bash
composer global require laravel/installer
````
Please don't forget to setup your environment variables
```bash
macOS: $HOME/.composer/vendor/bin
GNU / Linux Distributions: $HOME/.config/composer/vendor/bin
Windows: %USERPROFILE%\AppData\Roaming\Composer\vendor\bin
```

### Ngix configuration
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### Setup environment parameters
To start with demo settings, just copy the `.env.demo` to `.env` and run the application.

### Frontend setup
We're working with Node v11. 
Then let npm install all dependencies. `npm install`

````bash
// Run all Mix tasks...
npm run dev

// Watch changes
npm run watch

// Run all Mix tasks and minify output...
npm run production

````
