# Toolchain
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

### .env 
- der Pfad zur DB ist aktuell noch absolut und muss individuell angepast werden

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
