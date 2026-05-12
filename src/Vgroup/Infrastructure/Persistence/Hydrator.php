<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Infrastructure\Persistence;

use LanBilling\Foundation\HydratorValueHelper;
use LanBilling\Vgroup\Domain\Model\Vgroup;
use LanBilling\Vgroup\Domain\Model\VgroupBlockRequest;
use LanBilling\Vgroup\Domain\Model\VgroupBlockState;
use LanBilling\Vgroup\Domain\Model\VgroupChangeState;
use LanBilling\Vgroup\Domain\Model\VgroupStatus;
use LanBilling\Vgroup\Domain\Model\VgroupTrafficType;
use LanBilling\Vgroup\Domain\Model\ZeroCrossingType;
use Modular\Persistence\Schema\Contract\IHydrator;
use Override;

/**
 * @implements IHydrator<Vgroup>
 */
final class Hydrator implements IHydrator
{
    #[Override]
    public function hydrate(array $data): mixed
    {
        return new Vgroup(
            HydratorValueHelper::hydrateRequiredInt($data[Schema::VgId->value] ?? null, Schema::VgId->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::CLimit->value] ?? null, Schema::CLimit->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::DLimit->value] ?? null, Schema::DLimit->value),
            HydratorValueHelper::hydrateDate($data[Schema::DClear->value]),
            HydratorValueHelper::hydrateString($data[Schema::Login->value]),
            HydratorValueHelper::hydrateString($data[Schema::Pass->value]),
            $this->hydrateStatus($data[Schema::Status->value]),
            $this->hydrateBlockRequest($data[Schema::BlkReq->value]),
            $this->hydrateBlockState($data[Schema::Blocked->value]),
            HydratorValueHelper::hydrateString($data[Schema::Descr->value]),
            HydratorValueHelper::hydrateFloat($data[Schema::Balance->value]),
            HydratorValueHelper::hydrateInt($data[Schema::TarId->value]),
            HydratorValueHelper::hydrateInt($data[Schema::Id->value]),
            $this->hydrateChangeState($data[Schema::Modified->value]),
            HydratorValueHelper::hydrateInt($data[Schema::BLimit->value]),
            HydratorValueHelper::hydrateInt($data[Schema::BCheck->value]),
            HydratorValueHelper::hydrateInt($data[Schema::BNotify->value]),
            HydratorValueHelper::hydrateDateTime($data[Schema::OffTime->value]),
            HydratorValueHelper::hydrateFloat($data[Schema::BillActive->value]),
            HydratorValueHelper::hydrateBool($data[Schema::AccOn->value]),
            HydratorValueHelper::hydrateDateTime($data[Schema::AccOndate->value]),
            HydratorValueHelper::hydrateDateTime($data[Schema::AccOffdate->value]),
            $this->hydrateTrafficType($data[Schema::TraffType->value]),
            HydratorValueHelper::hydrateFloat($data[Schema::Depth->value]),
            HydratorValueHelper::hydrateBool($data[Schema::Allownoip->value]),
            HydratorValueHelper::hydrateString($data[Schema::TelPin->value]),
            $this->hydrateChangeState($data[Schema::Changed->value]),
            HydratorValueHelper::hydrateInt($data[Schema::Shape->value]),
            HydratorValueHelper::hydrateBool($data[Schema::UseAon->value]),
            HydratorValueHelper::hydrateInt($data[Schema::ZcTable->value]),
            HydratorValueHelper::hydrateInt($data[Schema::ZcRecordId->value]),
            HydratorValueHelper::hydrateFloat($data[Schema::ZcBalance->value]),
            $this->hydrateZeroCrossingType($data[Schema::ZcType->value]),
            HydratorValueHelper::hydrateInt($data[Schema::PrevCLimit->value]),
            HydratorValueHelper::hydrateDate($data[Schema::AccOnplandate->value]),
            HydratorValueHelper::hydrateRequiredString($data[Schema::Comments->value] ?? null, Schema::Comments->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::WrongActive->value] ?? null, Schema::WrongActive->value),
            HydratorValueHelper::hydrateDateTime($data[Schema::WrongDate->value]),
            HydratorValueHelper::hydrateInt($data[Schema::Operator->value]),
            HydratorValueHelper::hydrateBool($data[Schema::UseAs->value]),
            HydratorValueHelper::hydrateInt($data[Schema::MaxSessions->value]),
            HydratorValueHelper::hydrateBool($data[Schema::Archive->value]),
            HydratorValueHelper::hydrateString($data[Schema::OperCode->value]),
            HydratorValueHelper::hydrateBool($data[Schema::VatFree->value]),
            HydratorValueHelper::hydrateBool($data[Schema::IgnoreUserBlock->value]),
            HydratorValueHelper::hydrateString($data[Schema::Kod1c->value]),
            HydratorValueHelper::hydrateInt($data[Schema::CuId->value]),
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            Schema::VgId->value => $entity->vgId,
            Schema::CLimit->value => $entity->cLimit,
            Schema::DLimit->value => $entity->dLimit,
            Schema::DClear->value => HydratorValueHelper::dehydrateDate($entity->dClear),
            Schema::Login->value => $entity->login,
            Schema::Pass->value => $entity->pass,
            Schema::Status->value => $this->dehydrateStatus($entity->status),
            Schema::BlkReq->value => $this->dehydrateBlockRequest($entity->blkReq),
            Schema::Blocked->value => $this->dehydrateBlockState($entity->blocked),
            Schema::Descr->value => $entity->descr,
            Schema::Balance->value => $entity->balance,
            Schema::TarId->value => $entity->tarId,
            Schema::Id->value => $entity->agentId,
            Schema::Modified->value => $this->dehydrateChangeState($entity->modified),
            Schema::BLimit->value => $entity->bLimit,
            Schema::BCheck->value => $entity->bCheck,
            Schema::BNotify->value => $entity->bNotify,
            Schema::OffTime->value => HydratorValueHelper::dehydrateNullableDateTime($entity->offTime),
            Schema::BillActive->value => $entity->billActive,
            Schema::AccOn->value => HydratorValueHelper::dehydrateBool($entity->accOn),
            Schema::AccOndate->value => HydratorValueHelper::dehydrateZeroDateTime($entity->accOnDate),
            Schema::AccOffdate->value => HydratorValueHelper::dehydrateZeroDateTime($entity->accOffDate),
            Schema::TraffType->value => $this->dehydrateTrafficType($entity->traffType),
            Schema::Depth->value => $entity->depth,
            Schema::Allownoip->value => HydratorValueHelper::dehydrateBool($entity->allowNoIp),
            Schema::TelPin->value => $entity->telPin,
            Schema::Changed->value => $this->dehydrateChangeState($entity->changed),
            Schema::Shape->value => $entity->shape,
            Schema::UseAon->value => HydratorValueHelper::dehydrateBool($entity->useAon),
            Schema::ZcTable->value => $entity->zcTable,
            Schema::ZcRecordId->value => $entity->zcRecordId,
            Schema::ZcBalance->value => $entity->zcBalance,
            Schema::ZcType->value => $this->dehydrateZeroCrossingType($entity->zcType),
            Schema::PrevCLimit->value => $entity->prevCLimit,
            Schema::AccOnplandate->value => HydratorValueHelper::dehydrateDate($entity->accOnPlanDate),
            Schema::Comments->value => $entity->comments,
            Schema::WrongActive->value => $entity->wrongActive,
            Schema::WrongDate->value => HydratorValueHelper::dehydrateZeroDateTime($entity->wrongDate),
            Schema::Operator->value => $entity->operator,
            Schema::UseAs->value => HydratorValueHelper::dehydrateBool($entity->useAs),
            Schema::MaxSessions->value => $entity->maxSessions,
            Schema::Archive->value => HydratorValueHelper::dehydrateBool($entity->archive),
            Schema::OperCode->value => $entity->operCode,
            Schema::VatFree->value => HydratorValueHelper::dehydrateBool($entity->vatFree),
            Schema::IgnoreUserBlock->value => HydratorValueHelper::dehydrateBool($entity->ignoreUserBlock),
            Schema::Kod1c->value => $entity->kod1c,
            Schema::CuId->value => $entity->cuId,
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

    private function hydrateStatus(mixed $value): ?VgroupStatus
    {
        return match ($value) {
            null => null,
            0 => VgroupStatus::DoNotDisable,
            1 => VgroupStatus::AutoDisable,
            default => throw new \UnexpectedValueException(sprintf('Unknown vgroup status: %s', (string) $value)),
        };
    }

    private function dehydrateStatus(?VgroupStatus $value): ?int
    {
        return match ($value) {
            null => null,
            VgroupStatus::DoNotDisable => 0,
            VgroupStatus::AutoDisable => 1,
        };
    }

    private function hydrateBlockRequest(mixed $value): ?VgroupBlockRequest
    {
        return match ($value) {
            null => null,
            0 => VgroupBlockRequest::None,
            1 => VgroupBlockRequest::Balance,
            2 => VgroupBlockRequest::User,
            3 => VgroupBlockRequest::Administrator,
            default => throw new \UnexpectedValueException(sprintf('Unknown vgroup block request: %s', (string) $value)),
        };
    }

    private function dehydrateBlockRequest(?VgroupBlockRequest $value): ?int
    {
        return match ($value) {
            null => null,
            VgroupBlockRequest::None => 0,
            VgroupBlockRequest::Balance => 1,
            VgroupBlockRequest::User => 2,
            VgroupBlockRequest::Administrator => 3,
        };
    }

    private function hydrateBlockState(mixed $value): ?VgroupBlockState
    {
        return match ($value) {
            null => null,
            0 => VgroupBlockState::Unblocked,
            1 => VgroupBlockState::Balance,
            2 => VgroupBlockState::User,
            3 => VgroupBlockState::Administrator,
            4 => VgroupBlockState::Active,
            5 => VgroupBlockState::PeriodLimit,
            default => throw new \UnexpectedValueException(sprintf('Unknown vgroup block state: %s', (string) $value)),
        };
    }

    private function dehydrateBlockState(?VgroupBlockState $value): ?int
    {
        return match ($value) {
            null => null,
            VgroupBlockState::Unblocked => 0,
            VgroupBlockState::Balance => 1,
            VgroupBlockState::User => 2,
            VgroupBlockState::Administrator => 3,
            VgroupBlockState::Active => 4,
            VgroupBlockState::PeriodLimit => 5,
        };
    }

    private function hydrateChangeState(mixed $value): ?VgroupChangeState
    {
        return match ($value) {
            null => null,
            0 => VgroupChangeState::NotRequired,
            3 => VgroupChangeState::New,
            4 => VgroupChangeState::Changed,
            5 => VgroupChangeState::Deleted,
            default => throw new \UnexpectedValueException(sprintf('Unknown vgroup change state: %s', (string) $value)),
        };
    }

    private function dehydrateChangeState(?VgroupChangeState $value): ?int
    {
        return match ($value) {
            null => null,
            VgroupChangeState::NotRequired => 0,
            VgroupChangeState::New => 3,
            VgroupChangeState::Changed => 4,
            VgroupChangeState::Deleted => 5,
        };
    }

    private function hydrateTrafficType(mixed $value): ?VgroupTrafficType
    {
        return match ($value) {
            null => null,
            1 => VgroupTrafficType::Incoming,
            2 => VgroupTrafficType::Outgoing,
            3 => VgroupTrafficType::Total,
            default => throw new \UnexpectedValueException(sprintf('Unknown vgroup traffic type: %s', (string) $value)),
        };
    }

    private function dehydrateTrafficType(?VgroupTrafficType $value): ?int
    {
        return match ($value) {
            null => null,
            VgroupTrafficType::Incoming => 1,
            VgroupTrafficType::Outgoing => 2,
            VgroupTrafficType::Total => 3,
        };
    }

    private function hydrateZeroCrossingType(mixed $value): ?ZeroCrossingType
    {
        return match ($value) {
            null, 0 => null,
            1 => ZeroCrossingType::UsageCharge,
            2 => ZeroCrossingType::SubscriptionFee,
            3 => ZeroCrossingType::NegativeChargeReversal,
            default => throw new \UnexpectedValueException(sprintf('Unknown zero crossing type: %s', (string) $value)),
        };
    }

    private function dehydrateZeroCrossingType(?ZeroCrossingType $value): ?int
    {
        return match ($value) {
            null => null,
            ZeroCrossingType::UsageCharge => 1,
            ZeroCrossingType::SubscriptionFee => 2,
            ZeroCrossingType::NegativeChargeReversal => 3,
        };
    }
}
