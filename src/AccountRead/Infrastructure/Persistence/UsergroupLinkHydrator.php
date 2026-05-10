<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Infrastructure\Persistence;

use LanBilling\AccountRead\Domain\Model\AccountUsergroupLink;
use LanBilling\Foundation\HydratorValueHelper;
use Modular\Persistence\Schema\Contract\IHydrator;
use Override;

/**
 * @implements IHydrator<AccountUsergroupLink>
 */
final class UsergroupLinkHydrator implements IHydrator
{
    #[Override]
    public function hydrate(array $data): mixed
    {
        return new AccountUsergroupLink(
            HydratorValueHelper::hydrateRequiredInt($data[UsergroupLinkSchema::GroupId->value] ?? null, UsergroupLinkSchema::GroupId->value),
            HydratorValueHelper::hydrateRequiredInt($data[UsergroupLinkSchema::Uid->value] ?? null, UsergroupLinkSchema::Uid->value),
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            UsergroupLinkSchema::GroupId->value => $entity->groupId,
            UsergroupLinkSchema::Uid->value => $entity->uid,
        ];
    }

    #[Override]
    public function getId(mixed $entity): int
    {
        return $entity->uid;
    }

    #[Override]
    public function getIdFieldName(): string
    {
        return UsergroupLinkSchema::Uid->value;
    }
}
