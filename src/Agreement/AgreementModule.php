<?php

declare(strict_types=1);

namespace LanBilling\Agreement;

use LanBilling\Agreement\Domain\Persistence\IAgreementRepository;
use LanBilling\Agreement\Infrastructure\Persistence\Hydrator;
use LanBilling\Agreement\Infrastructure\Persistence\MysqlAgreementRepository;
use LanBilling\Foundation\FoundationModule;
use LanBilling\Foundation\LbDatabase;
use Modular\Framework\Container\ConfigurableContainerInterface;
use Modular\Framework\PowerModule\Contract\ExportsComponents;
use Modular\Framework\PowerModule\Contract\ImportsComponents;
use Modular\Framework\PowerModule\Contract\PowerModule;
use Modular\Framework\PowerModule\ImportItem;
use Override;

final class AgreementModule implements
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
            IAgreementRepository::class,
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
        $container->set(IAgreementRepository::class, MysqlAgreementRepository::class)->addArguments([
            LbDatabase::class,
            Hydrator::class,
            FoundationModule::ACCOUNT_STATEMENT_FACTORY,
        ]);

        return $this;
    }
}
