<?php
return [
    // docs: https://github.com/paypal/PayPal-PHP-SDK/wiki/File-based-Configurations

        // PayPal mode, sanbox hoặc live


        // Thời gian của một kết nối (tính bằng giây)
        'http.ConnectionTimeOut' => 30,

        // Logging Information: DEBUG, INFO, WARN, ERROR
        'log.logEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'DEBUG',

        //Validation Configuration
        'validation.level' => 'disable',

        //Caching Configuration
        'cache.enabled' => 'true',
        'cache.FileName' => storage_path() . '/caches/paypal_auth.cache',

];
