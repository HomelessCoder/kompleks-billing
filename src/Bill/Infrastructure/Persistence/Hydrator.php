<?php

declare(strict_types=1);

namespace LanBilling\Bill\Infrastructure\Persistence;

use LanBilling\Bill\Domain\Model\Bill;
use LanBilling\Bill\Domain\Model\BillStatus;
use LanBilling\Foundation\HydratorValueHelper;
use Modular\Persistence\Schema\Contract\IHydrator;
use Override;
use UnexpectedValueException;

/**
 * @implements IHydrator<Bill>
 */
final class Hydrator implements IHydrator
{
    #[Override]
    public function hydrate(array $data): mixed
    {
        return new Bill(
            recordId: HydratorValueHelper::hydrateRequiredInt($data[Schema::RecordId->value] ?? null, Schema::RecordId->value),
            accountUid: HydratorValueHelper::hydrateRequiredInt($data[Schema::VgId->value] ?? null, Schema::VgId->value),
            payDate: HydratorValueHelper::hydrateRequiredDateTime($data[Schema::PayDate->value] ?? null, Schema::PayDate->value),
            sum: HydratorValueHelper::hydrateFloat($data[Schema::Sum->value] ?? null),
            modPerson: HydratorValueHelper::hydrateInt($data[Schema::ModPerson->value] ?? null),
            billNum: HydratorValueHelper::hydrateString($data[Schema::BillNum->value] ?? null),
            billDescr: HydratorValueHelper::hydrateString($data[Schema::BillDescr->value] ?? null),
            isOrder: HydratorValueHelper::hydrateRequiredBool($data[Schema::IsOrder->value] ?? null, Schema::IsOrder->value),
            orderId: HydratorValueHelper::hydrateInt($data[Schema::OrderId->value] ?? null),
            remoteDate: HydratorValueHelper::hydrateDateTime($data[Schema::RemoteDate->value] ?? null),
            cancelDate: HydratorValueHelper::hydrateDateTime($data[Schema::CancelDate->value] ?? null),
            status: $this->hydrateStatus($data[Schema::Status->value] ?? null),
            receipt: HydratorValueHelper::hydrateString($data[Schema::Receipt->value] ?? null),
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            Schema::RecordId->value => $entity->recordId,
            Schema::VgId->value => $entity->accountUid,
            Schema::PayDate->value => $entity->payDate->format('Y-m-d H:i:s'),
            Schema::Sum->value => $entity->sum,
            Schema::BillNum->value => $entity->billNum,
            Schema::ModPerson->value => $entity->modPerson,
            Schema::BillDescr->value => $entity->billDescr,
            Schema::IsOrder->value => HydratorValueHelper::dehydrateBool($entity->isOrder),
            Schema::OrderId->value => $entity->orderId,
            Schema::RemoteDate->value => HydratorValueHelper::dehydrateNullableDateTime($entity->remoteDate),
            Schema::CancelDate->value => HydratorValueHelper::dehydrateNullableDateTime($entity->cancelDate),
            Schema::Status->value => $this->dehydrateStatus($entity->status),
            Schema::Receipt->value => $entity->receipt,
        ];
    }

    #[Override]
    public function getId(mixed $entity): int
    {
        return $entity->recordId;
    }

    #[Override]
    public function getIdFieldName(): string
    {
        return Schema::RecordId->value;
    }

    private function hydrateStatus(mixed $value): BillStatus
    {
        return match ($value) {
            0, '0' => BillStatus::Primary,
            1, '1' => BillStatus::Confirmed,
            2, '2' => BillStatus::Cancelled,
            default => throw new UnexpectedValueException(sprintf('Unknown bill status: %s', (string) $value)),
        };
    }

    private function dehydrateStatus(BillStatus $status): int
    {
        return match ($status) {
            BillStatus::Primary => 0,
            BillStatus::Confirmed => 1,
            BillStatus::Cancelled => 2,
        };
    }
}
