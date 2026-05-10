<?php

declare(strict_types=1);

namespace LanBilling\Bill\Application\Query\ListBillsByAccountUid;

use LanBilling\Bill\Domain\Model\Bill;
use LanBilling\Bill\Domain\Persistence\IBillRepository;

final readonly class Handler
{
    public function __construct(
        private IBillRepository $billRepository,
    ) {
    }

    /**
     * @return array<Bill>
     */
    public function __invoke(Query $query): array
    {
        return $this->billRepository->getBillsByAccountUid($query->uid, $query->payDateFrom);
    }
}
