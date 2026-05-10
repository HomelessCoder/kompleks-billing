<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Infrastructure\Persistence;

use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;
use LanBilling\AccountRead\Domain\Persistence\IAccountVgroupLinkRepository;
use Modular\Persistence\Repository\AbstractGenericRepository;
use Modular\Persistence\Repository\Condition;
use Override;

/**
 * @extends AbstractGenericRepository<AccountVgroupLink>
 */
final class MysqlAccountVgroupLinkRepository extends AbstractGenericRepository implements IAccountVgroupLinkRepository
{
    #[Override]
    public function getLinksByAccountUid(int $uid): array
    {
        return $this->findBy([
            Condition::equals(Schema::Uid, $uid),
        ]);
    }

    #[Override]
    protected function getTableName(): string
    {
        return Schema::getTableName();
    }
}
