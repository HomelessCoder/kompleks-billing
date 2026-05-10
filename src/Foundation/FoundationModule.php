<?php

declare(strict_types=1);

namespace LanBilling\Foundation;

use Modular\Framework\Container\ConfigurableContainerInterface;
use Modular\Framework\PowerModule\Contract\ExportsComponents;
use Modular\Framework\PowerModule\Contract\ImportsComponents;
use Modular\Framework\PowerModule\Contract\PowerModule;
use Modular\Framework\PowerModule\ImportItem;
use Modular\Persistence\Database\Database;
use Modular\Persistence\PersistenceModule;
use Modular\Persistence\Repository\Statement\Dialect\MysqlDialect;
use Modular\Persistence\Repository\Statement\Factory\GenericStatementFactory;
use Override;

final class FoundationModule implements
    PowerModule,
    ImportsComponents,
    ExportsComponents
{
    public const string ACCOUNT_STATEMENT_FACTORY = 'account_statement_factory';

    #[Override]
    public static function imports(): array
    {
        return [
            ImportItem::create(
                PersistenceModule::class,
                Database::class,
            ),
        ];
    }

    #[Override]
    public static function exports(): array
    {
        return [
            LbDatabase::class,
            self::ACCOUNT_STATEMENT_FACTORY,
        ];
    }

    #[Override]
    public function register(ConfigurableContainerInterface $container): void
    {
        $this->persistence($container);
    }

    private function persistence(ConfigurableContainerInterface $container): self
    {
        $container->set(self::ACCOUNT_STATEMENT_FACTORY, GenericStatementFactory::class)->addArguments([
            '',
            new MysqlDialect(),
        ]);

        $container->set(LbDatabase::class, static fn (): Database => $container->get(Database::class));

        return $this;
    }
}
