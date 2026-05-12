<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Infrastructure\Persistence;

use LanBilling\Foundation\HydratorValueHelper;
use LanBilling\Tariff\Domain\Model\Tariff;
use Modular\Persistence\Schema\Contract\IHydrator;
use Override;

/**
 * @implements IHydrator<Tariff>
 */
final class Hydrator implements IHydrator
{
    #[Override]
    public function hydrate(array $data): mixed
    {
        return new Tariff(
            HydratorValueHelper::hydrateRequiredInt($data[Schema::TarId->value] ?? null, Schema::TarId->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::Includes->value] ?? null, Schema::Includes->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::Above->value] ?? null, Schema::Above->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::Rent->value] ?? null, Schema::Rent->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::BlockRent->value] ?? null, Schema::BlockRent->value),
            HydratorValueHelper::hydrateString($data[Schema::Descr->value] ?? null),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::RentMode->value] ?? null, Schema::RentMode->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::Type->value] ?? null, Schema::Type->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::UseIncludes->value] ?? null, Schema::UseIncludes->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::FreeSeconds->value] ?? null, Schema::FreeSeconds->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::ConfAbove->value] ?? null, Schema::ConfAbove->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::CallMode->value] ?? null, Schema::CallMode->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::ActBlock->value] ?? null, Schema::ActBlock->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::RoundSeconds->value] ?? null, Schema::RoundSeconds->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::CatNumber->value] ?? null, Schema::CatNumber->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::IncomingCost->value] ?? null, Schema::IncomingCost->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::RedirectCost->value] ?? null, Schema::RedirectCost->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::IvrCharge->value] ?? null, Schema::IvrCharge->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::VoicemailCharge->value] ?? null, Schema::VoicemailCharge->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::OpcallCharge->value] ?? null, Schema::OpcallCharge->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::CatNumberIvox->value] ?? null, Schema::CatNumberIvox->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::CatNumberIncoming->value] ?? null, Schema::CatNumberIncoming->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::EmptycallCharge->value] ?? null, Schema::EmptycallCharge->value),
            HydratorValueHelper::hydrateInt($data[Schema::LocalRoundSeconds->value] ?? null),
            HydratorValueHelper::hydrateInt($data[Schema::LocalFreeSeconds->value] ?? null),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::Shape->value] ?? null, Schema::Shape->value),
            HydratorValueHelper::hydrateBool($data[Schema::Archive->value] ?? null),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::CatNumberIvoxPer->value] ?? null, Schema::CatNumberIvoxPer->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::PricePlan->value] ?? null, Schema::PricePlan->value),
            HydratorValueHelper::hydrateBool($data[Schema::VoipBlockLocal->value] ?? null),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::DynRoute->value] ?? null, Schema::DynRoute->value),
            HydratorValueHelper::hydrateRequiredBool($data[Schema::ReverseIncoming->value] ?? null, Schema::ReverseIncoming->value),
            HydratorValueHelper::hydrateRequiredBool($data[Schema::Unavaliable->value] ?? null, Schema::Unavaliable->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::TraffLimit->value] ?? null, Schema::TraffLimit->value),
            HydratorValueHelper::hydrateRequiredInt($data[Schema::TraffLimitPer->value] ?? null, Schema::TraffLimitPer->value),
            HydratorValueHelper::hydrateRequiredBool($data[Schema::RentMultiply->value] ?? null, Schema::RentMultiply->value),
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            Schema::TarId->value => $entity->tarId,
            Schema::Includes->value => $entity->includes,
            Schema::Above->value => $entity->above,
            Schema::Rent->value => $entity->rent,
            Schema::BlockRent->value => $entity->blockRent,
            Schema::Descr->value => $entity->descr,
            Schema::RentMode->value => $entity->rentMode,
            Schema::Type->value => $entity->type,
            Schema::UseIncludes->value => $entity->useIncludes,
            Schema::FreeSeconds->value => $entity->freeSeconds,
            Schema::ConfAbove->value => $entity->confAbove,
            Schema::CallMode->value => $entity->callMode,
            Schema::ActBlock->value => $entity->actBlock,
            Schema::RoundSeconds->value => $entity->roundSeconds,
            Schema::CatNumber->value => $entity->catNumber,
            Schema::IncomingCost->value => $entity->incomingCost,
            Schema::RedirectCost->value => $entity->redirectCost,
            Schema::IvrCharge->value => $entity->ivrCharge,
            Schema::VoicemailCharge->value => $entity->voicemailCharge,
            Schema::OpcallCharge->value => $entity->opcallCharge,
            Schema::CatNumberIvox->value => $entity->catNumberIvox,
            Schema::CatNumberIncoming->value => $entity->catNumberIncoming,
            Schema::EmptycallCharge->value => $entity->emptycallCharge,
            Schema::LocalRoundSeconds->value => $entity->localRoundSeconds,
            Schema::LocalFreeSeconds->value => $entity->localFreeSeconds,
            Schema::Shape->value => $entity->shape,
            Schema::Archive->value => HydratorValueHelper::dehydrateBool($entity->archive),
            Schema::CatNumberIvoxPer->value => $entity->catNumberIvoxPer,
            Schema::PricePlan->value => $entity->pricePlan,
            Schema::VoipBlockLocal->value => HydratorValueHelper::dehydrateBool($entity->voipBlockLocal),
            Schema::DynRoute->value => $entity->dynRoute,
            Schema::ReverseIncoming->value => HydratorValueHelper::dehydrateBool($entity->reverseIncoming),
            Schema::Unavaliable->value => HydratorValueHelper::dehydrateBool($entity->unavaliable),
            Schema::TraffLimit->value => $entity->traffLimit,
            Schema::TraffLimitPer->value => $entity->traffLimitPer,
            Schema::RentMultiply->value => HydratorValueHelper::dehydrateBool($entity->rentMultiply),
        ];
    }

    #[Override]
    public function getId(mixed $entity): int
    {
        return $entity->tarId;
    }

    #[Override]
    public function getIdFieldName(): string
    {
        return Schema::TarId->value;
    }
}
