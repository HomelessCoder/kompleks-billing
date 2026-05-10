<?php

declare(strict_types=1);

use LanBilling\Account\AccountModule;
use LanBilling\Foundation\FoundationModule;
use LanBilling\Vgroup\VgroupModule;
use Modular\Persistence\PersistenceModule;

return [
    PersistenceModule::class,
    FoundationModule::class,
    AccountModule::class,
    VgroupModule::class,
];
