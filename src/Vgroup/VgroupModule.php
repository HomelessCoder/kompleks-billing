<?php

declare(strict_types=1);

namespace LanBilling\Vgroup;

use LanBilling\Foundation\FoundationModule;
use LanBilling\Foundation\LbDatabase;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;
use LanBilling\Vgroup\Infrastructure\Persistence\Hydrator;
use LanBilling\Vgroup\Infrastructure\Persistence\MysqlVgroupRepository;
use Modular\Framework\Container\ConfigurableContainerInterface;
use Modular\Framework\PowerModule\Contract\ExportsComponents;
use Modular\Framework\PowerModule\Contract\ImportsComponents;
use Modular\Framework\PowerModule\Contract\PowerModule;
use Modular\Framework\PowerModule\ImportItem;
use Override;

final class VgroupModule implements
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
            IVgroupRepository::class,
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
        $container->set(IVgroupRepository::class, MysqlVgroupRepository::class)->addArguments([
            LbDatabase::class,
            Hydrator::class,
            FoundationModule::ACCOUNT_STATEMENT_FACTORY,
        ]);

        return $this;
    }
}
