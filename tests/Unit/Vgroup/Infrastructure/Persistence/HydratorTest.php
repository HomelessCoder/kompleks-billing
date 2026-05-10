<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\Vgroup\Infrastructure\Persistence;

use DateTimeImmutable;
use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Model\VgroupBlockRequest;
use LanBilling\Vgroup\Domain\Model\VgroupBlockState;
use LanBilling\Vgroup\Domain\Model\VgroupChangeState;
use LanBilling\Vgroup\Domain\Model\VgroupStatus;
use LanBilling\Vgroup\Domain\Model\VgroupTrafficType;
use LanBilling\Vgroup\Domain\Model\ZeroCrossingType;
use LanBilling\Vgroup\Infrastructure\Persistence\Hydrator;
use LanBilling\Vgroup\Infrastructure\Persistence\Schema;
use PHPUnit\Framework\TestCase;

final class HydratorTest extends TestCase
{
    public function testHydrateNormalizesLegacyDatesAndFlags(): void
    {
        $hydrator = new Hydrator();

        $entity = $hydrator->hydrate($this->row());

        self::assertInstanceOf(Vgroup::class, $entity);
        self::assertSame(10, $entity->vgId);
        self::assertSame(12_345, $entity->cLimit);
        self::assertNull($entity->dClear);
        self::assertSame('vg-login', $entity->login);
        self::assertSame(VgroupStatus::AutoDisable, $entity->status);
        self::assertSame(VgroupBlockRequest::User, $entity->blkReq);
        self::assertSame(VgroupBlockState::Administrator, $entity->blocked);
        self::assertSame(77, $entity->agentId);
        self::assertSame(VgroupChangeState::Changed, $entity->modified);
        self::assertTrue($entity->accOn);
        self::assertNull($entity->accOnDate);
        self::assertSame(VgroupTrafficType::Total, $entity->traffType);
        self::assertNull($entity->wrongDate);
        self::assertTrue($entity->allowNoIp);
        self::assertSame(VgroupChangeState::Changed, $entity->changed);
        self::assertFalse($entity->archive);
        self::assertSame(ZeroCrossingType::UsageCharge, $entity->zcType);
        self::assertEquals(new DateTimeImmutable('2026-05-01'), $entity->accOnPlanDate);
        self::assertSame('test comment', $entity->comments);
        self::assertSame('ABCD1234', $entity->kod1c);
        self::assertSame(991, $entity->cuId);
    }

    public function testDehydrateRestoresZeroDateDefaults(): void
    {
        $hydrator = new Hydrator();
        $entity = $hydrator->hydrate($this->row());

        $data = $hydrator->dehydrate($entity);

        self::assertSame('0000-00-00 00:00:00', $data[Schema::AccOndate->value]);
        self::assertSame('0000-00-00 00:00:00', $data[Schema::WrongDate->value]);
        self::assertSame('2026-05-01', $data[Schema::AccOnplandate->value]);
        self::assertSame(1, $data[Schema::AccOn->value]);
        self::assertSame(1, $data[Schema::Status->value]);
        self::assertSame(2, $data[Schema::BlkReq->value]);
        self::assertSame(3, $data[Schema::Blocked->value]);
        self::assertSame(4, $data[Schema::Modified->value]);
        self::assertSame(3, $data[Schema::TraffType->value]);
        self::assertSame(4, $data[Schema::Changed->value]);
        self::assertSame(1, $data[Schema::ZcType->value]);
        self::assertSame(0, $data[Schema::Archive->value]);
    }

    /**
     * @return array<string, int|string|null>
     */
    private function row(): array
    {
        return [
            Schema::VgId->value => 10,
            Schema::CLimit->value => 12_345,
            Schema::DLimit->value => 54_321,
            Schema::DClear->value => null,
            Schema::Login->value => 'vg-login',
            Schema::Pass->value => 'secret',
            Schema::Status->value => 1,
            Schema::BlkReq->value => 2,
            Schema::Blocked->value => 3,
            Schema::Descr->value => 'descr',
            Schema::Balance->value => '150.75',
            Schema::TarId->value => 5,
            Schema::Id->value => 77,
            Schema::Modified->value => 4,
            Schema::BLimit->value => 100,
            Schema::BCheck->value => 1,
            Schema::BNotify->value => 1,
            Schema::OffTime->value => '2026-05-10 12:30:00',
            Schema::BillActive->value => '11.20',
            Schema::AccOn->value => 1,
            Schema::AccOndate->value => '0000-00-00 00:00:00',
            Schema::AccOffdate->value => '2026-05-20 00:00:00',
            Schema::TraffType->value => 3,
            Schema::Depth->value => '42.50',
            Schema::Allownoip->value => 1,
            Schema::TelPin->value => '1234',
            Schema::Changed->value => 4,
            Schema::Shape->value => 0,
            Schema::UseAon->value => 0,
            Schema::ZcTable->value => 7,
            Schema::ZcRecordId->value => 8,
            Schema::ZcBalance->value => '10.00',
            Schema::ZcType->value => 1,
            Schema::PrevCLimit->value => 999,
            Schema::AccOnplandate->value => '2026-05-01',
            Schema::Comments->value => 'test comment',
            Schema::WrongActive->value => 2,
            Schema::WrongDate->value => '0000-00-00 00:00:00',
            Schema::Operator->value => 0,
            Schema::UseAs->value => 1,
            Schema::MaxSessions->value => 4,
            Schema::Archive->value => 0,
            Schema::OperCode->value => 'OP-1',
            Schema::VatFree->value => 1,
            Schema::IgnoreUserBlock->value => 0,
            Schema::Kod1c->value => 'ABCD1234',
            Schema::CuId->value => 991,
        ];
    }
}
