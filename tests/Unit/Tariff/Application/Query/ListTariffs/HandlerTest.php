<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\Tariff\Application\Query\ListTariffs;

use LanBilling\Tariff\Application\Query\ListTariffs\Handler;
use LanBilling\Tariff\Application\Query\ListTariffs\Query;
use LanBilling\Tariff\Domain\Model\Tariff;
use LanBilling\Tariff\Domain\Persistence\ITariffRepository;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testItLoadsActiveTariffsByDefault(): void
    {
        $tariff = $this->createTariff(5, false);

        $repository = new class ($tariff) implements ITariffRepository {
            public int $receivedArchive = -1;

            public function __construct(
                private readonly Tariff $tariff,
            ) {
            }

            public function getTariffById(int $tariffId): ?Tariff
            {
                return null;
            }

            public function getTariffs(int $archive = 0): array
            {
                $this->receivedArchive = $archive;

                return [$this->tariff];
            }
        };

        $handler = new Handler($repository);

        $result = $handler(new Query());

        self::assertSame(0, $repository->receivedArchive);
        self::assertSame([$tariff], $result);
    }

    public function testItAllowsArchiveOverride(): void
    {
        $archivedTariff = $this->createTariff(6, true);

        $repository = new class ($archivedTariff) implements ITariffRepository {
            public int $receivedArchive = -1;

            public function __construct(
                private readonly Tariff $tariff,
            ) {
            }

            public function getTariffById(int $tariffId): ?Tariff
            {
                return null;
            }

            public function getTariffs(int $archive = 0): array
            {
                $this->receivedArchive = $archive;

                return [$this->tariff];
            }
        };

        $handler = new Handler($repository);

        $result = $handler(new Query(1));

        self::assertSame(1, $repository->receivedArchive);
        self::assertSame([$archivedTariff], $result);
    }

    private function createTariff(int $tarId, bool $archive): Tariff
    {
        return new Tariff(
            tarId: $tarId,
            includes: 0,
            above: 0,
            rent: 100,
            blockRent: 50,
            descr: null,
            rentMode: 1,
            type: 0,
            useIncludes: 1,
            freeSeconds: 30,
            confAbove: 2,
            callMode: 1,
            actBlock: 2,
            roundSeconds: 60,
            catNumber: 11,
            incomingCost: 4,
            redirectCost: 5,
            ivrCharge: 6,
            voicemailCharge: 7,
            opcallCharge: 8,
            catNumberIvox: 12,
            catNumberIncoming: 13,
            emptycallCharge: 9,
            localRoundSeconds: null,
            localFreeSeconds: null,
            shape: 1_000,
            archive: $archive,
            catNumberIvoxPer: 14,
            pricePlan: 1,
            voipBlockLocal: false,
            dynRoute: 0,
            reverseIncoming: false,
            unavaliable: false,
            traffLimit: 2_048,
            traffLimitPer: 30,
            rentMultiply: true,
        );
    }
}
