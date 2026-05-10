<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

use DateTimeImmutable;

final readonly class Vgroup
{
    public function __construct(
        public int $vgId,
        public int $cLimit,
        public int $dLimit,
        public ?DateTimeImmutable $dClear,
        public ?string $login,
        public ?string $pass,
        public ?VgroupStatus $status,
        public ?VgroupBlockRequest $blkReq,
        public ?VgroupBlockState $blocked,
        public ?string $descr,
        public ?float $balance,
        public ?int $tarId,
        public ?int $agentId,
        public ?VgroupChangeState $modified,
        public ?int $bLimit,
        public ?int $bCheck,
        public ?int $bNotify,
        public ?DateTimeImmutable $offTime,
        public ?float $billActive,
        public ?bool $accOn,
        public ?DateTimeImmutable $accOnDate,
        public ?DateTimeImmutable $accOffDate,
        public ?VgroupTrafficType $traffType,
        public ?float $depth,
        public ?bool $allowNoIp,
        public ?string $telPin,
        public ?VgroupChangeState $changed,
        public ?int $shape,
        public ?bool $useAon,
        public ?int $zcTable,
        public ?int $zcRecordId,
        public ?float $zcBalance,
        public ?ZeroCrossingType $zcType,
        public ?int $prevCLimit,
        public ?DateTimeImmutable $accOnPlanDate,
        public string $comments,
        public int $wrongActive,
        public ?DateTimeImmutable $wrongDate,
        public ?int $operator,
        public ?bool $useAs,
        public ?int $maxSessions,
        public ?bool $archive,
        public ?string $operCode,
        public ?bool $vatFree,
        public ?bool $ignoreUserBlock,
        public ?string $kod1c,
        public ?int $cuId,
    ) {
    }
}
