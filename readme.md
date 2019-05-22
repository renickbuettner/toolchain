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

### Ngix configuration
```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### Setup environment parameters
To start with demo settings, just copy the `.env.demo` to `.env` and run the application.
