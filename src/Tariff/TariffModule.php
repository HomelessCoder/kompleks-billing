<?php

declare(strict_types=1);

namespace LanBilling\Tariff;

use LanBilling\Foundation\FoundationModule;
use LanBilling\Foundation\LbDatabase;
use LanBilling\Tariff\Application\Query\GetTariff\Handler as GetTariffHandler;
use LanBilling\Tariff\Application\Query\ListTariffs\Handler as ListTariffsHandler;
use LanBilling\Tariff\Domain\Persistence\ITariffRepository;
use LanBilling\Tariff\Infrastructure\Persistence\Hydrator;
use LanBilling\Tariff\Infrastructure\Persistence\MysqlTariffRepository;
use Modular\Framework\Container\ConfigurableContainerInterface;
use Modular\Framework\PowerModule\Contract\ExportsComponents;
use Modular\Framework\PowerModule\Contract\ImportsComponents;
use Modular\Framework\PowerModule\Contract\PowerModule;
use Modular\Framework\PowerModule\ImportItem;
use Override;

final class TariffModule implements
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
            ITariffRepository::class,
            GetTariffHandler::class,
            ListTariffsHandler::class,
        ];
    }

    #[Override]
    public function register(ConfigurableContainerInterface $container): void
    {
        $this
            ->persistence($container)
            ->application($container)
        ;
    }

    private function persistence(ConfigurableContainerInterface $container): self
    {
        $container->set(Hydrator::class, Hydrator::class);
        $container->set(ITariffRepository::class, MysqlTariffRepository::class)->addArguments([
            LbDatabase::class,
            Hydrator::class,
            FoundationModule::ACCOUNT_STATEMENT_FACTORY,
        ]);

        return $this;
    }

    private function application(ConfigurableContainerInterface $container): self
    {
        $container->set(GetTariffHandler::class, GetTariffHandler::class)->addArguments([
            ITariffRepository::class,
        ]);
        $container->set(ListTariffsHandler::class, ListTariffsHandler::class)->addArguments([
            ITariffRepository::class,
        ]);

        return $this;
    }
}
