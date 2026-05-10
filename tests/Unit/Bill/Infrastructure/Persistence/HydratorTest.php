<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\Bill\Infrastructure\Persistence;

use DateTimeImmutable;
use LanBilling\Bill\Domain\Model\Bill;
use LanBilling\Bill\Domain\Model\BillStatus;
use LanBilling\Bill\Infrastructure\Persistence\Hydrator;
use LanBilling\Bill\Infrastructure\Persistence\Schema;
use PHPUnit\Framework\TestCase;

final class HydratorTest extends TestCase
{
    public function testHydrateMapsBillingRowsToBills(): void
    {
        $hydrator = new Hydrator();

        $entity = $hydrator->hydrate($this->row());

        self::assertInstanceOf(Bill::class, $entity);
        self::assertSame(42, $entity->recordId);
        self::assertSame(501, $entity->accountUid);
        self::assertEquals(new DateTimeImmutable('2026-05-06 12:30:00'), $entity->payDate);
        self::assertSame(150.75, $entity->sum);
        self::assertSame(12, $entity->modPerson);
        self::assertSame('BILL-42', $entity->billNum);
        self::assertSame('Test payment', $entity->billDescr);
        self::assertTrue($entity->isOrder);
        self::assertSame(77, $entity->orderId);
        self::assertNull($entity->remoteDate);
        self::assertNull($entity->cancelDate);
        self::assertSame(BillStatus::Cancelled, $entity->status);
        self::assertSame('receipt-42', $entity->receipt);
    }

    public function testDehydrateRestoresDatabaseColumnNames(): void
    {
        $hydrator = new Hydrator();
        $entity = $hydrator->hydrate($this->row());

        $data = $hydrator->dehydrate($entity);

        self::assertSame(42, $data[Schema::RecordId->value]);
        self::assertSame(501, $data[Schema::VgId->value]);
        self::assertSame('2026-05-06 12:30:00', $data[Schema::PayDate->value]);
        self::assertSame(150.75, $data[Schema::Sum->value]);
        self::assertSame(12, $data[Schema::ModPerson->value]);
        self::assertSame('BILL-42', $data[Schema::BillNum->value]);
        self::assertSame('Test payment', $data[Schema::BillDescr->value]);
        self::assertSame(1, $data[Schema::IsOrder->value]);
        self::assertSame(77, $data[Schema::OrderId->value]);
        self::assertNull($data[Schema::RemoteDate->value]);
        self::assertNull($data[Schema::CancelDate->value]);
        self::assertSame(2, $data[Schema::Status->value]);
        self::assertSame('receipt-42', $data[Schema::Receipt->value]);
    }

    /**
     * @return array<string, int|string|null>
     */
    private function row(): array
    {
        return [
            Schema::RecordId->value => 42,
            Schema::VgId->value => 501,
            Schema::PayDate->value => '2026-05-06 12:30:00',
            Schema::Sum->value => '150.75',
            Schema::BillNum->value => 'BILL-42',
            Schema::ModPerson->value => 12,
            Schema::BillDescr->value => 'Test payment',
            Schema::IsOrder->value => 1,
            Schema::OrderId->value => 77,
            Schema::RemoteDate->value => '0000-00-00 00:00:00',
            Schema::CancelDate->value => null,
            Schema::Status->value => 2,
            Schema::Receipt->value => 'receipt-42',
        ];
    }
}
