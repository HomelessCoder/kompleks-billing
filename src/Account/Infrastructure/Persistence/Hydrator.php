<?php

declare(strict_types=1);

namespace LanBilling\Account\Infrastructure\Persistence;

use DateTimeImmutable;
use LanBilling\Account\Domain\Model\Account;
use LanBilling\Account\Domain\Model\AccountCategory;
use LanBilling\Account\Domain\Model\AccountType;
use LanBilling\Account\Domain\Model\BillDeliveryType;
use LanBilling\Account\Domain\Model\DiplomatStatus;
use LanBilling\Account\Domain\Model\ResidentStatus;
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
            null === $data[Schema::Login->value] ? null : (string) $data[Schema::Login->value],
            null === $data[Schema::Pass->value] ? null : (string) $data[Schema::Pass->value],
            null === $data[Schema::Ipaccess->value] ? null : (bool) $data[Schema::Ipaccess->value],
            $this->hydrateAccountType($data[Schema::Type->value]),
            (float) $data[Schema::Balance->value],
            null === $data[Schema::Depth->value] ? null : (float) $data[Schema::Depth->value],
            null === $data[Schema::Descr->value] ? null : (string) $data[Schema::Descr->value],
            null === $data[Schema::Name->value] ? null : (string) $data[Schema::Name->value],
            null === $data[Schema::Phone->value] ? null : (string) $data[Schema::Phone->value],
            null === $data[Schema::Fax->value] ? null : (string) $data[Schema::Fax->value],
            null === $data[Schema::AgrmNum->value] ? null : (string) $data[Schema::AgrmNum->value],
            null === $data[Schema::AgrmDate->value] ? null : (string) $data[Schema::AgrmDate->value],
            null === $data[Schema::Email->value] ? null : (string) $data[Schema::Email->value],
            null === $data[Schema::Kod1c->value] ? null : (string) $data[Schema::Kod1c->value],
            $this->hydrateBillDeliveryType($data[Schema::BillDelivery->value]),
            $this->hydrateAccountCategory($data[Schema::Category->value]),
            null === $data[Schema::BankName->value] ? null : (string) $data[Schema::BankName->value],
            null === $data[Schema::BranchBankName->value] ? null : (string) $data[Schema::BranchBankName->value],
            null === $data[Schema::TreasuryName->value] ? null : (string) $data[Schema::TreasuryName->value],
            null === $data[Schema::TreasuryAccount->value] ? null : (string) $data[Schema::TreasuryAccount->value],
            null === $data[Schema::Bik->value] ? null : (string) $data[Schema::Bik->value],
            null === $data[Schema::Settl->value] ? null : (string) $data[Schema::Settl->value],
            null === $data[Schema::Corr->value] ? null : (string) $data[Schema::Corr->value],
            null === $data[Schema::Kpp->value] ? null : (string) $data[Schema::Kpp->value],
            null === $data[Schema::Inn->value] ? null : (string) $data[Schema::Inn->value],
            null === $data[Schema::Ogrn->value] ? null : (string) $data[Schema::Ogrn->value],
            null === $data[Schema::Okpo->value] ? null : (string) $data[Schema::Okpo->value],
            null === $data[Schema::Okved->value] ? null : (string) $data[Schema::Okved->value],
            null === $data[Schema::GenDirU->value] ? null : (string) $data[Schema::GenDirU->value],
            null === $data[Schema::GlBuhgU->value] ? null : (string) $data[Schema::GlBuhgU->value],
            null === $data[Schema::KontPerson->value] ? null : (string) $data[Schema::KontPerson->value],
            null === $data[Schema::ActOnWhat->value] ? null : (string) $data[Schema::ActOnWhat->value],
            null === $data[Schema::FaIndex->value] ? null : (string) $data[Schema::FaIndex->value],
            null === $data[Schema::Country->value] ? null : (string) $data[Schema::Country->value],
            null === $data[Schema::City->value] ? null : (string) $data[Schema::City->value],
            null === $data[Schema::Street->value] ? null : (string) $data[Schema::Street->value],
            null === $data[Schema::Bnum->value] ? null : (string) $data[Schema::Bnum->value],
            null === $data[Schema::Bknum->value] ? null : (string) $data[Schema::Bknum->value],
            null === $data[Schema::Apart->value] ? null : (string) $data[Schema::Apart->value],
            null === $data[Schema::Addr->value] ? null : (string) $data[Schema::Addr->value],
            null === $data[Schema::Region->value] ? null : (string) $data[Schema::Region->value],
            null === $data[Schema::District->value] ? null : (string) $data[Schema::District->value],
            null === $data[Schema::SettleArea->value] ? null : (string) $data[Schema::SettleArea->value],
            null === $data[Schema::YuIndex->value] ? null : (string) $data[Schema::YuIndex->value],
            null === $data[Schema::CountryU->value] ? null : (string) $data[Schema::CountryU->value],
            null === $data[Schema::CityU->value] ? null : (string) $data[Schema::CityU->value],
            null === $data[Schema::StreetU->value] ? null : (string) $data[Schema::StreetU->value],
            null === $data[Schema::BnumU->value] ? null : (string) $data[Schema::BnumU->value],
            null === $data[Schema::BknumU->value] ? null : (string) $data[Schema::BknumU->value],
            null === $data[Schema::ApartU->value] ? null : (string) $data[Schema::ApartU->value],
            null === $data[Schema::AddrU->value] ? null : (string) $data[Schema::AddrU->value],
            null === $data[Schema::RegionU->value] ? null : (string) $data[Schema::RegionU->value],
            null === $data[Schema::DistrictU->value] ? null : (string) $data[Schema::DistrictU->value],
            null === $data[Schema::SettleAreaU->value] ? null : (string) $data[Schema::SettleAreaU->value],
            null === $data[Schema::BIndex->value] ? null : (string) $data[Schema::BIndex->value],
            null === $data[Schema::CountryB->value] ? null : (string) $data[Schema::CountryB->value],
            null === $data[Schema::CityB->value] ? null : (string) $data[Schema::CityB->value],
            null === $data[Schema::RegionB->value] ? null : (string) $data[Schema::RegionB->value],
            null === $data[Schema::DistrictB->value] ? null : (string) $data[Schema::DistrictB->value],
            null === $data[Schema::SettleAreaB->value] ? null : (string) $data[Schema::SettleAreaB->value],
            null === $data[Schema::StreetB->value] ? null : (string) $data[Schema::StreetB->value],
            null === $data[Schema::BnumB->value] ? null : (string) $data[Schema::BnumB->value],
            null === $data[Schema::BknumB->value] ? null : (string) $data[Schema::BknumB->value],
            null === $data[Schema::ApartB->value] ? null : (string) $data[Schema::ApartB->value],
            null === $data[Schema::AddrB->value] ? null : (string) $data[Schema::AddrB->value],
            null === $data[Schema::PassSernum->value] ? null : (string) $data[Schema::PassSernum->value],
            null === $data[Schema::PassNo->value] ? null : (string) $data[Schema::PassNo->value],
            null === $data[Schema::PassIssuedate->value] ? null : (string) $data[Schema::PassIssuedate->value],
            null === $data[Schema::PassIssuedep->value] ? null : (string) $data[Schema::PassIssuedep->value],
            null === $data[Schema::PassIssueplace->value] ? null : (string) $data[Schema::PassIssueplace->value],
            null === $data[Schema::Birthdate->value] ? null : (string) $data[Schema::Birthdate->value],
            null === $data[Schema::Birthplace->value] ? null : (string) $data[Schema::Birthplace->value],
            $this->hydrateDateTime($data[Schema::LastModDate->value]),
            (int) $data[Schema::WrongActive->value],
            $this->hydrateDateTime($data[Schema::WrongDate->value]),
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
            Schema::Ipaccess->value => null === $entity->ipaccess ? null : (int) $entity->ipaccess,
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
            Schema::LastModDate->value => $this->dehydrateDateTime($entity->lastModDate),
            Schema::WrongActive->value => $entity->wrongActive,
            Schema::WrongDate->value => $this->dehydrateDateTime($entity->wrongDate),
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

    private function hydrateDateTime(mixed $value): ?DateTimeImmutable
    {
        if ($value === null || $value === '0000-00-00 00:00:00') {
            return null;
        }

        return new DateTimeImmutable((string) $value);
    }

    private function dehydrateDateTime(?DateTimeImmutable $value): string
    {
        return $value?->format('Y-m-d H:i:s') ?? '0000-00-00 00:00:00';
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
