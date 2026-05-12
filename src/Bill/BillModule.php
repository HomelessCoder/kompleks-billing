<?php

declare(strict_types=1);

namespace LanBilling\Bill;

use LanBilling\Bill\Domain\Persistence\IBillRepository;
use LanBilling\Bill\Infrastructure\Persistence\Hydrator;
use LanBilling\Bill\Infrastructure\Persistence\MysqlBillRepository;
use LanBilling\Foundation\FoundationModule;
use LanBilling\Foundation\LbDatabase;
use Modular\Framework\Container\ConfigurableContainerInterface;
use Modular\Framework\PowerModule\Contract\ExportsComponents;
use Modular\Framework\PowerModule\Contract\ImportsComponents;
use Modular\Framework\PowerModule\Contract\PowerModule;
use Modular\Framework\PowerModule\ImportItem;
use Override;

final class BillModule implements
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
        ];
    }

    #[Override]
    public static function exports(): array
    {
        return [
            IBillRepository::class,
            \LanBilling\Bill\Application\Query\ListBillsByAccountUid\Handler::class,
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
        $container->set(IBillRepository::class, MysqlBillRepository::class)->addArguments([
            LbDatabase::class,
            Hydrator::class,
            FoundationModule::ACCOUNT_STATEMENT_FACTORY,
        ]);

        $container->set(
            \LanBilling\Bill\Application\Query\ListBillsByAccountUid\Handler::class,
            \LanBilling\Bill\Application\Query\ListBillsByAccountUid\Handler::class,
        )->addArguments([
            IBillRepository::class,
        ]);

        return $this;
    }
}
