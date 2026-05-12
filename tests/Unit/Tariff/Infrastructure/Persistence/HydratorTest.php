<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\Tariff\Infrastructure\Persistence;

use LanBilling\Tariff\Domain\Model\Tariff;
use LanBilling\Tariff\Infrastructure\Persistence\Hydrator;
use LanBilling\Tariff\Infrastructure\Persistence\Schema;
use PHPUnit\Framework\TestCase;

final class HydratorTest extends TestCase
{
    public function testHydrateMapsLegacyTariffRow(): void
    {
        $hydrator = new Hydrator();

        $entity = $hydrator->hydrate($this->row());

        self::assertInstanceOf(Tariff::class, $entity);
        self::assertSame(42, $entity->tarId);
        self::assertSame('Tariff 42', $entity->descr);
        self::assertSame(600, $entity->shape);
        self::assertFalse($entity->archive);
        self::assertTrue($entity->voipBlockLocal);
        self::assertTrue($entity->reverseIncoming);
        self::assertFalse($entity->unavaliable);
        self::assertSame(4_096, $entity->traffLimit);
        self::assertTrue($entity->rentMultiply);
        self::assertNull($entity->localRoundSeconds);
        self::assertSame(120, $entity->localFreeSeconds);
    }

    public function testDehydrateRestoresDatabaseColumnNames(): void
    {
        $hydrator = new Hydrator();
        $entity = $hydrator->hydrate($this->row());

        $data = $hydrator->dehydrate($entity);

        self::assertSame(42, $data[Schema::TarId->value]);
        self::assertSame('Tariff 42', $data[Schema::Descr->value]);
        self::assertNull($data[Schema::LocalRoundSeconds->value]);
        self::assertSame(120, $data[Schema::LocalFreeSeconds->value]);
        self::assertSame(0, $data[Schema::Archive->value]);
        self::assertSame(1, $data[Schema::VoipBlockLocal->value]);
        self::assertSame(1, $data[Schema::ReverseIncoming->value]);
        self::assertSame(0, $data[Schema::Unavaliable->value]);
        self::assertSame(1, $data[Schema::RentMultiply->value]);
    }

    /**
     * @return array<string, int|string|null>
     */
    private function row(): array
    {
        return [
            Schema::TarId->value => 42,
            Schema::Includes->value => 100,
            Schema::Above->value => 10,
            Schema::Rent->value => 50,
            Schema::BlockRent->value => 20,
            Schema::Descr->value => 'Tariff 42',
            Schema::RentMode->value => 1,
            Schema::Type->value => 0,
            Schema::UseIncludes->value => 1,
            Schema::FreeSeconds->value => 30,
            Schema::ConfAbove->value => 2,
            Schema::CallMode->value => 1,
            Schema::ActBlock->value => 2,
            Schema::RoundSeconds->value => 60,
            Schema::CatNumber->value => 5,
            Schema::IncomingCost->value => 4,
            Schema::RedirectCost->value => 3,
            Schema::IvrCharge->value => 2,
            Schema::VoicemailCharge->value => 1,
            Schema::OpcallCharge->value => 7,
            Schema::CatNumberIvox->value => 11,
            Schema::CatNumberIncoming->value => 12,
            Schema::EmptycallCharge->value => 13,
            Schema::LocalRoundSeconds->value => null,
            Schema::LocalFreeSeconds->value => 120,
            Schema::Shape->value => 600,
            Schema::Archive->value => 0,
            Schema::CatNumberIvoxPer->value => 14,
            Schema::PricePlan->value => 3,
            Schema::VoipBlockLocal->value => 1,
            Schema::DynRoute->value => 2,
            Schema::ReverseIncoming->value => 1,
            Schema::Unavaliable->value => 0,
            Schema::TraffLimit->value => 4_096,
            Schema::TraffLimitPer->value => 30,
            Schema::RentMultiply->value => 1,
        ];
    }
}
