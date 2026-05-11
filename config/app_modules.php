<?php

declare(strict_types=1);

use LanBilling\Account\AccountModule;
use LanBilling\AccountRead\AccountReadModule;
use LanBilling\Agreement\AgreementModule;
use LanBilling\Bill\BillModule;
use LanBilling\Foundation\FoundationModule;
use LanBilling\Vgroup\VgroupModule;
use Modular\Persistence\PersistenceModule;

return [
    PersistenceModule::class,
    FoundationModule::class,
    AccountModule::class,
    AgreementModule::class,
    VgroupModule::class,
    BillModule::class,
    AccountReadModule::class,
];
