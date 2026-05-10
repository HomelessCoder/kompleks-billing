<?php

declare(strict_types=1);

namespace LanBilling\Tests\Unit\Bill\Application\Query\ListBillsByAccountUid;

use DateTimeImmutable;
use LanBilling\Bill\Application\Query\ListBillsByAccountUid\Handler;
use LanBilling\Bill\Application\Query\ListBillsByAccountUid\Query;
use LanBilling\Bill\Domain\Model\Bill;
use LanBilling\Bill\Domain\Model\BillStatus;
use LanBilling\Bill\Domain\Persistence\IBillRepository;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testItLoadsBillsForAccountUidWithOptionalDateFilter(): void
    {
        $payDateFrom = new DateTimeImmutable('2026-05-05 00:00:00');
        $bill = $this->createBill();

        $repository = new class ($bill) implements IBillRepository {
            public int $receivedUid = 0;
            public ?DateTimeImmutable $receivedPayDateFrom = null;

            public function __construct(
                private readonly Bill $bill,
            ) {
            }

            public function getBillsByAccountUid(int $accountUid, ?DateTimeImmutable $payDateFrom = null): array
            {
                $this->receivedUid = $accountUid;
                $this->receivedPayDateFrom = $payDateFrom;

                return [$this->bill];
            }
        };

        $handler = new Handler($repository);

        $result = $handler(new Query(501, $payDateFrom));

        self::assertSame(501, $repository->receivedUid);
        self::assertSame($payDateFrom, $repository->receivedPayDateFrom);
        self::assertSame([$bill], $result);
    }

    public function testItReturnsEmptyArrayWhenRepositoryHasNoBills(): void
    {
        $repository = new class () implements IBillRepository {
            public function getBillsByAccountUid(int $accountUid, ?DateTimeImmutable $payDateFrom = null): array
            {
                return [];
            }
        };

        $handler = new Handler($repository);

        $result = $handler(new Query(999));

        self::assertSame([], $result);
    }

    private function createBill(): Bill
    {
        return new Bill(
            recordId: 42,
            accountUid: 501,
            payDate: new DateTimeImmutable('2026-05-06 12:30:00'),
            sum: 150.75,
            modPerson: 12,
            billNum: 'BILL-42',
            billDescr: 'Test payment',
            isOrder: false,
            orderId: null,
            remoteDate: null,
            cancelDate: null,
            status: BillStatus::Primary,
            receipt: 'receipt-42',
        );
    }
}
