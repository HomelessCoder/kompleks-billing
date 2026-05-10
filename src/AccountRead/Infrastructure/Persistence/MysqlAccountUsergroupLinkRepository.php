<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Infrastructure\Persistence;

use LanBilling\AccountRead\Domain\Model\AccountUsergroupLink;
use LanBilling\AccountRead\Domain\Persistence\IAccountUsergroupLinkRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Modular\Persistence\Repository\Condition;
use Override;

/**
 * @extends AbstractGenericRepository<AccountUsergroupLink>
 */
final class MysqlAccountUsergroupLinkRepository extends AbstractGenericRepository implements IAccountUsergroupLinkRepository
{
    /**
     * @return array<int>
     */
    #[Override]
    public function getAccountUidsByGroupId(int $groupId): array
    {
        $links = $this->findBy([
            Condition::equals(UsergroupLinkSchema::GroupId, $groupId),
        ]);

        return array_map(
            static fn (AccountUsergroupLink $link): int => $link->uid,
            $links,
        );
    }

    #[Override]
    protected function getTableName(): string
    {
        return UsergroupLinkSchema::getTableName();
    }
}
