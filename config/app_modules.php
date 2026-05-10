<?php

declare(strict_types=1);

use LanBilling\Account\AccountModule;
use LanBilling\Foundation\FoundationModule;
use Modular\Persistence\PersistenceModule;

return [
    PersistenceModule::class,
    FoundationModule::class,
    AccountModule::class,
];
