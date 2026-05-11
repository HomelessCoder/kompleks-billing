<?php

declare(strict_types=1);

namespace LanBilling\Agreement\Infrastructure\Persistence;

use LanBilling\Agreement\Domain\Model\Agreement;
use LanBilling\Foundation\HydratorValueHelper;
use Modular\Persistence\Schema\Contract\IHydrator;
use Override;

/**
 * @implements IHydrator<Agreement>
 */
final class Hydrator implements IHydrator
{
    #[Override]
    public function hydrate(array $data): mixed
    {
        return new Agreement(
            uid: HydratorValueHelper::hydrateRequiredInt($data[Schema::Uid->value] ?? null, Schema::Uid->value),
            operatorId: HydratorValueHelper::hydrateRequiredInt($data[Schema::Operator->value] ?? null, Schema::Operator->value),
            number: HydratorValueHelper::hydrateString($data[Schema::Number->value] ?? null),
            date: HydratorValueHelper::hydrateDate($data[Schema::Date->value] ?? null),
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            Schema::Uid->value => $entity->uid,
            Schema::Operator->value => $entity->operatorId,
            Schema::Number->value => $entity->number,
            Schema::Date->value => HydratorValueHelper::dehydrateDate($entity->date),
        ];
    }

    #[Override]
    public function getId(mixed $entity): string
    {
        return sprintf('%d:%d', $entity->uid, $entity->operatorId);
    }

    #[Override]
    public function getIdFieldName(): string
    {
        return Schema::Uid->value;
    }
}
