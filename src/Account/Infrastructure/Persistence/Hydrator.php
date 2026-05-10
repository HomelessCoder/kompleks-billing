<?php

declare(strict_types=1);

namespace LanBilling\Account\Infrastructure\Persistence;

use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Model\AccountCategory;
use LanBilling\Account\Domain\Model\AccountType;
use LanBilling\Account\Domain\Model\BillDeliveryType;
use LanBilling\Account\Domain\Model\DiplomatStatus;
use LanBilling\Account\Domain\Model\ResidentStatus;
use LanBilling\Foundation\HydratorValueHelper;
use Modular\Persistence\Schema\Contract\IHydrator;
use Override;

/**
 * @implements IHydrator<Account>
 */
final class Hydrator implements IHydrator
{
    #[Override]
    public function hydrate(array $data): mixed
    {
        return new Account(
            (int) $data[Schema::Uid->value],
            HydratorValueHelper::hydrateString($data[Schema::Login->value]),
            HydratorValueHelper::hydrateString($data[Schema::Pass->value]),
            HydratorValueHelper::hydrateBool($data[Schema::Ipaccess->value]),
            $this->hydrateAccountType($data[Schema::Type->value]),
            (float) $data[Schema::Balance->value],
            HydratorValueHelper::hydrateFloat($data[Schema::Depth->value]),
            HydratorValueHelper::hydrateString($data[Schema::Descr->value]),
            HydratorValueHelper::hydrateString($data[Schema::Name->value]),
            HydratorValueHelper::hydrateString($data[Schema::Phone->value]),
            HydratorValueHelper::hydrateString($data[Schema::Fax->value]),
            HydratorValueHelper::hydrateString($data[Schema::AgrmNum->value]),
            HydratorValueHelper::hydrateString($data[Schema::AgrmDate->value]),
            HydratorValueHelper::hydrateString($data[Schema::Email->value]),
            HydratorValueHelper::hydrateString($data[Schema::Kod1c->value]),
            $this->hydrateBillDeliveryType($data[Schema::BillDelivery->value]),
            $this->hydrateAccountCategory($data[Schema::Category->value]),
            HydratorValueHelper::hydrateString($data[Schema::BankName->value]),
            HydratorValueHelper::hydrateString($data[Schema::BranchBankName->value]),
            HydratorValueHelper::hydrateString($data[Schema::TreasuryName->value]),
            HydratorValueHelper::hydrateString($data[Schema::TreasuryAccount->value]),
            HydratorValueHelper::hydrateString($data[Schema::Bik->value]),
            HydratorValueHelper::hydrateString($data[Schema::Settl->value]),
            HydratorValueHelper::hydrateString($data[Schema::Corr->value]),
            HydratorValueHelper::hydrateString($data[Schema::Kpp->value]),
            HydratorValueHelper::hydrateString($data[Schema::Inn->value]),
            HydratorValueHelper::hydrateString($data[Schema::Ogrn->value]),
            HydratorValueHelper::hydrateString($data[Schema::Okpo->value]),
            HydratorValueHelper::hydrateString($data[Schema::Okved->value]),
            HydratorValueHelper::hydrateString($data[Schema::GenDirU->value]),
            HydratorValueHelper::hydrateString($data[Schema::GlBuhgU->value]),
            HydratorValueHelper::hydrateString($data[Schema::KontPerson->value]),
            HydratorValueHelper::hydrateString($data[Schema::ActOnWhat->value]),
            HydratorValueHelper::hydrateString($data[Schema::FaIndex->value]),
            HydratorValueHelper::hydrateString($data[Schema::Country->value]),
            HydratorValueHelper::hydrateString($data[Schema::City->value]),
            HydratorValueHelper::hydrateString($data[Schema::Street->value]),
            HydratorValueHelper::hydrateString($data[Schema::Bnum->value]),
            HydratorValueHelper::hydrateString($data[Schema::Bknum->value]),
            HydratorValueHelper::hydrateString($data[Schema::Apart->value]),
            HydratorValueHelper::hydrateString($data[Schema::Addr->value]),
            HydratorValueHelper::hydrateString($data[Schema::Region->value]),
            HydratorValueHelper::hydrateString($data[Schema::District->value]),
            HydratorValueHelper::hydrateString($data[Schema::SettleArea->value]),
            HydratorValueHelper::hydrateString($data[Schema::YuIndex->value]),
            HydratorValueHelper::hydrateString($data[Schema::CountryU->value]),
            HydratorValueHelper::hydrateString($data[Schema::CityU->value]),
            HydratorValueHelper::hydrateString($data[Schema::StreetU->value]),
            HydratorValueHelper::hydrateString($data[Schema::BnumU->value]),
            HydratorValueHelper::hydrateString($data[Schema::BknumU->value]),
            HydratorValueHelper::hydrateString($data[Schema::ApartU->value]),
            HydratorValueHelper::hydrateString($data[Schema::AddrU->value]),
            HydratorValueHelper::hydrateString($data[Schema::RegionU->value]),
            HydratorValueHelper::hydrateString($data[Schema::DistrictU->value]),
            HydratorValueHelper::hydrateString($data[Schema::SettleAreaU->value]),
            HydratorValueHelper::hydrateString($data[Schema::BIndex->value]),
            HydratorValueHelper::hydrateString($data[Schema::CountryB->value]),
            HydratorValueHelper::hydrateString($data[Schema::CityB->value]),
            HydratorValueHelper::hydrateString($data[Schema::RegionB->value]),
            HydratorValueHelper::hydrateString($data[Schema::DistrictB->value]),
            HydratorValueHelper::hydrateString($data[Schema::SettleAreaB->value]),
            HydratorValueHelper::hydrateString($data[Schema::StreetB->value]),
            HydratorValueHelper::hydrateString($data[Schema::BnumB->value]),
            HydratorValueHelper::hydrateString($data[Schema::BknumB->value]),
            HydratorValueHelper::hydrateString($data[Schema::ApartB->value]),
            HydratorValueHelper::hydrateString($data[Schema::AddrB->value]),
            HydratorValueHelper::hydrateString($data[Schema::PassSernum->value]),
            HydratorValueHelper::hydrateString($data[Schema::PassNo->value]),
            HydratorValueHelper::hydrateString($data[Schema::PassIssuedate->value]),
            HydratorValueHelper::hydrateString($data[Schema::PassIssuedep->value]),
            HydratorValueHelper::hydrateString($data[Schema::PassIssueplace->value]),
            HydratorValueHelper::hydrateString($data[Schema::Birthdate->value]),
            HydratorValueHelper::hydrateString($data[Schema::Birthplace->value]),
            HydratorValueHelper::hydrateDateTime($data[Schema::LastModDate->value]),
            (int) $data[Schema::WrongActive->value],
            HydratorValueHelper::hydrateDateTime($data[Schema::WrongDate->value]),
            $this->hydrateDiplomatStatus($data[Schema::Diplomat->value]),
            $this->hydrateResidentStatus($data[Schema::Resident->value]),
            (int) $data[Schema::AgrmType->value],
            (int) $data[Schema::Oksm->value],
            (string) $data[Schema::Okato->value],
            (bool) $data[Schema::PublicAgree->value],
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            Schema::Uid->value => $entity->uid,
            Schema::Login->value => $entity->login,
            Schema::Pass->value => $entity->pass,
            Schema::Ipaccess->value => HydratorValueHelper::dehydrateBool($entity->ipaccess),
            Schema::Type->value => $this->dehydrateAccountType($entity->type),
            Schema::Balance->value => $entity->balance,
            Schema::Depth->value => $entity->depth,
            Schema::Descr->value => $entity->descr,
            Schema::Name->value => $entity->name,
            Schema::Phone->value => $entity->phone,
            Schema::Fax->value => $entity->fax,
            Schema::AgrmNum->value => $entity->agrmNum,
            Schema::AgrmDate->value => $entity->agrmDate,
            Schema::Email->value => $entity->email,
            Schema::Kod1c->value => $entity->kod1c,
            Schema::BillDelivery->value => $this->dehydrateBillDeliveryType($entity->billDelivery),
            Schema::Category->value => $this->dehydrateAccountCategory($entity->category),
            Schema::BankName->value => $entity->bankName,
            Schema::BranchBankName->value => $entity->branchBankName,
            Schema::TreasuryName->value => $entity->treasuryName,
            Schema::TreasuryAccount->value => $entity->treasuryAccount,
            Schema::Bik->value => $entity->bik,
            Schema::Settl->value => $entity->settl,
            Schema::Corr->value => $entity->corr,
            Schema::Kpp->value => $entity->kpp,
            Schema::Inn->value => $entity->inn,
            Schema::Ogrn->value => $entity->ogrn,
            Schema::Okpo->value => $entity->okpo,
            Schema::Okved->value => $entity->okved,
            Schema::GenDirU->value => $entity->genDirU,
            Schema::GlBuhgU->value => $entity->glBuhgU,
            Schema::KontPerson->value => $entity->kontPerson,
            Schema::ActOnWhat->value => $entity->actOnWhat,
            Schema::FaIndex->value => $entity->faIndex,
            Schema::Country->value => $entity->country,
            Schema::City->value => $entity->city,
            Schema::Street->value => $entity->street,
            Schema::Bnum->value => $entity->bnum,
            Schema::Bknum->value => $entity->bknum,
            Schema::Apart->value => $entity->apart,
            Schema::Addr->value => $entity->addr,
            Schema::Region->value => $entity->region,
            Schema::District->value => $entity->district,
            Schema::SettleArea->value => $entity->settleArea,
            Schema::YuIndex->value => $entity->yuIndex,
            Schema::CountryU->value => $entity->countryU,
            Schema::CityU->value => $entity->cityU,
            Schema::StreetU->value => $entity->streetU,
            Schema::BnumU->value => $entity->bnumU,
            Schema::BknumU->value => $entity->bknumU,
            Schema::ApartU->value => $entity->apartU,
            Schema::AddrU->value => $entity->addrU,
            Schema::RegionU->value => $entity->regionU,
            Schema::DistrictU->value => $entity->districtU,
            Schema::SettleAreaU->value => $entity->settleAreaU,
            Schema::BIndex->value => $entity->bIndex,
            Schema::CountryB->value => $entity->countryB,
            Schema::CityB->value => $entity->cityB,
            Schema::RegionB->value => $entity->regionB,
            Schema::DistrictB->value => $entity->districtB,
            Schema::SettleAreaB->value => $entity->settleAreaB,
            Schema::StreetB->value => $entity->streetB,
            Schema::BnumB->value => $entity->bnumB,
            Schema::BknumB->value => $entity->bknumB,
            Schema::ApartB->value => $entity->apartB,
            Schema::AddrB->value => $entity->addrB,
            Schema::PassSernum->value => $entity->passSernum,
            Schema::PassNo->value => $entity->passNo,
            Schema::PassIssuedate->value => $entity->passIssuedate,
            Schema::PassIssuedep->value => $entity->passIssuedep,
            Schema::PassIssueplace->value => $entity->passIssueplace,
            Schema::Birthdate->value => $entity->birthdate,
            Schema::Birthplace->value => $entity->birthplace,
            Schema::LastModDate->value => HydratorValueHelper::dehydrateZeroDateTime($entity->lastModDate),
            Schema::WrongActive->value => $entity->wrongActive,
            Schema::WrongDate->value => HydratorValueHelper::dehydrateZeroDateTime($entity->wrongDate),
            Schema::Diplomat->value => $this->dehydrateDiplomatStatus($entity->diplomat),
            Schema::Resident->value => $this->dehydrateResidentStatus($entity->resident),
            Schema::AgrmType->value => $entity->agrmType,
            Schema::Oksm->value => $entity->oksm,
            Schema::Okato->value => $entity->okato,
            Schema::PublicAgree->value => (int) $entity->publicAgree,
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
        return Schema::Uid->value;
    }

    private function hydrateAccountType(mixed $value): AccountType
    {
        return match ($value) {
            1, '1' => AccountType::Organization,
            2, '2' => AccountType::Personal,
            default => throw new \UnexpectedValueException(sprintf('Unknown account type: %s', (string) $value)),
        };
    }

    private function dehydrateAccountType(AccountType $value): int
    {
        return match ($value) {
            AccountType::Organization => 1,
            AccountType::Personal => 2,
        };
    }

    private function hydrateBillDeliveryType(mixed $value): ?BillDeliveryType
    {
        return match ($value) {
            null => null,
            0, '0' => BillDeliveryType::Courier,
            1, '1' => BillDeliveryType::Mail,
            2, '2' => BillDeliveryType::SelfService,
            3, '3' => BillDeliveryType::Other,
            default => throw new \UnexpectedValueException(sprintf('Unknown bill delivery type: %s', (string) $value)),
        };
    }

    private function dehydrateBillDeliveryType(?BillDeliveryType $value): ?int
    {
        return match ($value) {
            null => null,
            BillDeliveryType::Courier => 0,
            BillDeliveryType::Mail => 1,
            BillDeliveryType::SelfService => 2,
            BillDeliveryType::Other => 3,
        };
    }

    private function hydrateAccountCategory(mixed $value): ?AccountCategory
    {
        return match ($value) {
            null => null,
            0, '0' => AccountCategory::Budget,
            1, '1' => AccountCategory::Commercial,
            2, '2' => AccountCategory::Population,
            3, '3' => AccountCategory::SoleProprietor,
            default => throw new \UnexpectedValueException(sprintf('Unknown account category: %s', (string) $value)),
        };
    }

    private function dehydrateAccountCategory(?AccountCategory $value): ?int
    {
        return match ($value) {
            null => null,
            AccountCategory::Budget => 0,
            AccountCategory::Commercial => 1,
            AccountCategory::Population => 2,
            AccountCategory::SoleProprietor => 3,
        };
    }

    private function hydrateDiplomatStatus(mixed $value): DiplomatStatus
    {
        return match ($value) {
            1, '1' => DiplomatStatus::Diplomat,
            2, '2' => DiplomatStatus::NonDiplomat,
            default => throw new \UnexpectedValueException(sprintf('Unknown diplomat status: %s', (string) $value)),
        };
    }

    private function dehydrateDiplomatStatus(DiplomatStatus $value): int
    {
        return match ($value) {
            DiplomatStatus::Diplomat => 1,
            DiplomatStatus::NonDiplomat => 2,
        };
    }

    private function hydrateResidentStatus(mixed $value): ResidentStatus
    {
        return match ($value) {
            0, '0' => ResidentStatus::NonResident,
            1, '1' => ResidentStatus::Resident,
            default => throw new \UnexpectedValueException(sprintf('Unknown resident status: %s', (string) $value)),
        };
    }

    private function dehydrateResidentStatus(ResidentStatus $value): int
    {
        return match ($value) {
            ResidentStatus::NonResident => 0,
            ResidentStatus::Resident => 1,
        };
    }
}
