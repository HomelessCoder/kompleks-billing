<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\Tariff\Application\Query\GetTariff;

use LanBilling\Tariff\Application\Query\GetTariff\Handler;
use LanBilling\Tariff\Application\Query\GetTariff\Query;
use LanBilling\Tariff\Domain\Model\Tariff;
use LanBilling\Tariff\Domain\Persistence\ITariffRepository;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testItReturnsTariffById(): void
    {
        $tariff = $this->createTariff(5);

        $repository = new class ($tariff) implements ITariffRepository {
            public int $receivedTariffId = 0;

            public function __construct(
                private readonly Tariff $tariff,
            ) {
            }

            public function getTariffById(int $tariffId): ?Tariff
            {
                $this->receivedTariffId = $tariffId;

                return $tariffId === $this->tariff->tarId ? $this->tariff : null;
            }

            public function getTariffs(int $archive = 0): array
            {
                return [$this->tariff];
            }
        };

        $handler = new Handler($repository);

        $result = $handler(new Query(5));

        self::assertSame(5, $repository->receivedTariffId);
        self::assertSame($tariff, $result);
    }

    public function testItReturnsNullWhenTariffDoesNotExist(): void
    {
        $repository = new class () implements ITariffRepository {
            public int $receivedTariffId = 0;

            public function getTariffById(int $tariffId): ?Tariff
            {
                $this->receivedTariffId = $tariffId;

                return null;
            }

            public function getTariffs(int $archive = 0): array
            {
                return [];
            }
        };

        $handler = new Handler($repository);

        $result = $handler(new Query(404));

        self::assertSame(404, $repository->receivedTariffId);
        self::assertNull($result);
    }

    private function createTariff(int $tarId): Tariff
    {
        return new Tariff(
            tarId: $tarId,
            includes: 0,
            above: 0,
            rent: 100,
            blockRent: 50,
            descr: 'Test tariff',
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
            localRoundSeconds: 10,
            localFreeSeconds: 20,
            shape: 1_000,
            archive: false,
            catNumberIvoxPer: 14,
            pricePlan: 1,
            voipBlockLocal: true,
            dynRoute: 2,
            reverseIncoming: true,
            unavaliable: false,
            traffLimit: 2_048,
            traffLimitPer: 30,
            rentMultiply: false,
        );
    }
}
