<?php

declare(strict_types=1);

use Modular\Persistence\Config\Config;
use Modular\Persistence\Config\Setting;

return Config::create()
    ->set(Setting::Dsn, $_SERVER['BILLING_DB_DSN'])
    ->set(Setting::Username, $_SERVER['BILLING_DB_USERNAME'])
    ->set(Setting::Password, $_SERVER['BILLING_DB_PASSWORD'])
;
