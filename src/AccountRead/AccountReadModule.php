<?php

declare(strict_types=1);

namespace LanBilling\AccountRead;

use LanBilling\Account\AccountModule;
use LanBilling\Account\Domain\Persistence\IAccountRepository;
use LanBilling\AccountRead\Domain\Persistence\IAccountUsergroupLinkRepository;
use LanBilling\AccountRead\Domain\Persistence\IAccountVgroupLinkRepository;
use LanBilling\AccountRead\Infrastructure\Persistence\Hydrator;
use LanBilling\AccountRead\Infrastructure\Persistence\MysqlAccountUsergroupLinkRepository;
use LanBilling\AccountRead\Infrastructure\Persistence\MysqlAccountVgroupLinkRepository;
use LanBilling\AccountRead\Infrastructure\Persistence\UsergroupLinkHydrator;
use LanBilling\Foundation\FoundationModule;
use LanBilling\Foundation\LbDatabase;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;
use LanBilling\Vgroup\VgroupModule;
use Modular\Framework\Container\ConfigurableContainerInterface;
use Modular\Framework\PowerModule\Contract\ExportsComponents;
use Modular\Framework\PowerModule\Contract\ImportsComponents;
use Modular\Framework\PowerModule\Contract\PowerModule;
use Modular\Framework\PowerModule\ImportItem;
use Override;

final class AccountReadModule implements
    PowerModule,
    ImportsComponents,
    ExportsComponents
{
    #[Override]
    public static function imports(): array
    {
        return [
            ImportItem::create(
                FoundationModule::class,
                LbDatabase::class,
                FoundationModule::ACCOUNT_STATEMENT_FACTORY,
            ),
            ImportItem::create(
                AccountModule::class,
                IAccountRepository::class,
            ),
            ImportItem::create(
                VgroupModule::class,
                IVgroupRepository::class,
            ),
        ];
    }

    #[Override]
    public static function exports(): array
    {
        return [
            IAccountVgroupLinkRepository::class,
            IAccountUsergroupLinkRepository::class,
        ];
    }

    #[Override]
    public function register(ConfigurableContainerInterface $container): void
    {
        $this->persistence($container);
    }

    private function persistence(ConfigurableContainerInterface $container): self
    {
        $container->set(Hydrator::class, Hydrator::class);
        $container->set(IAccountVgroupLinkRepository::class, MysqlAccountVgroupLinkRepository::class)->addArguments([
            LbDatabase::class,
            Hydrator::class,
            FoundationModule::ACCOUNT_STATEMENT_FACTORY,
        ]);
        $container->set(UsergroupLinkHydrator::class, UsergroupLinkHydrator::class);
        $container->set(IAccountUsergroupLinkRepository::class, MysqlAccountUsergroupLinkRepository::class)->addArguments([
            LbDatabase::class,
            UsergroupLinkHydrator::class,
            FoundationModule::ACCOUNT_STATEMENT_FACTORY,
        ]);

        return $this;
    }
}
