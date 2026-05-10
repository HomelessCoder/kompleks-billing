<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Infrastructure\Persistence;

use LanBilling\AccountRead\Domain\Model\AccountVgroupLink;
use Modular\Persistence\Schema\Contract\IHydrator;
use Override;

/**
 * @implements IHydrator<AccountVgroupLink>
 */
final class Hydrator implements IHydrator
{
    #[Override]
    public function hydrate(array $data): mixed
    {
        return new AccountVgroupLink(
            (int) $data[Schema::Uid->value],
            (int) $data[Schema::VgId->value],
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            Schema::Uid->value => $entity->uid,
            Schema::VgId->value => $entity->vgId,
        ];
    }

    #[Override]
    public function getId(mixed $entity): int
    {
        return $entity->vgId;
    }

    #[Override]
    public function getIdFieldName(): string
    {
        return Schema::VgId->value;
    }
}
