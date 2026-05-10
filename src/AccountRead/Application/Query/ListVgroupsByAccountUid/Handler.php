<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Application\Query\ListVgroupsByAccountUid;

use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;
use LanBilling\AccountRead\Domain\Persistence\IAccountVgroupLinkRepository;
use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Persistence\IVgroupRepository;

final readonly class Handler
{
    public function __construct(
        private IAccountVgroupLinkRepository $accountVgroupLinkRepository,
        private IVgroupRepository $vgroupRepository,
    ) {
    }

    /**
     * @return array<Vgroup>
     */
    public function __invoke(Query $query): array
    {
        $links = $this->accountVgroupLinkRepository->getLinksByAccountUid($query->uid);
        $vgIds = array_map(static fn (AccountVgroupLink $link): int => $link->vgId, $links);

        if ($vgIds === []) {
            return [];
        }

        return $this->vgroupRepository->getVgroupsByIds($vgIds);
    }
}
