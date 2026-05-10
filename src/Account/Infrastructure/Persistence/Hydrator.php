<?php

declare(strict_types=1);

namespace LanBilling\Account\Infrastructure\Persistence;

use LanBilling\Account\Domain\Model\Account;
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
            $data[Schema::Uid->value],
            $data[Schema::Login->value],
            $data[Schema::Pass->value],
            $data[Schema::Ipaccess->value],
            $data[Schema::Type->value],
            $data[Schema::Balance->value],
            $data[Schema::Depth->value],
            $data[Schema::Descr->value],
            $data[Schema::Name->value],
            $data[Schema::Phone->value],
            $data[Schema::Fax->value],
            $data[Schema::AgrmNum->value],
            $data[Schema::AgrmDate->value],
            $data[Schema::Email->value],
            $data[Schema::Kod1c->value],
            $data[Schema::BillDelivery->value],
            $data[Schema::Category->value],
            $data[Schema::BankName->value],
            $data[Schema::BranchBankName->value],
            $data[Schema::TreasuryName->value],
            $data[Schema::TreasuryAccount->value],
            $data[Schema::Bik->value],
            $data[Schema::Settl->value],
            $data[Schema::Corr->value],
            $data[Schema::Kpp->value],
            $data[Schema::Inn->value],
            $data[Schema::Ogrn->value],
            $data[Schema::Okpo->value],
            $data[Schema::Okved->value],
            $data[Schema::GenDirU->value],
            $data[Schema::GlBuhgU->value],
            $data[Schema::KontPerson->value],
            $data[Schema::ActOnWhat->value],
            $data[Schema::FaIndex->value],
            $data[Schema::Country->value],
            $data[Schema::City->value],
            $data[Schema::Street->value],
            $data[Schema::Bnum->value],
            $data[Schema::Bknum->value],
            $data[Schema::Apart->value],
            $data[Schema::Addr->value],
            $data[Schema::Region->value],
            $data[Schema::District->value],
            $data[Schema::SettleArea->value],
            $data[Schema::YuIndex->value],
            $data[Schema::CountryU->value],
            $data[Schema::CityU->value],
            $data[Schema::StreetU->value],
            $data[Schema::BnumU->value],
            $data[Schema::BknumU->value],
            $data[Schema::ApartU->value],
            $data[Schema::AddrU->value],
            $data[Schema::RegionU->value],
            $data[Schema::DistrictU->value],
            $data[Schema::SettleAreaU->value],
            $data[Schema::BIndex->value],
            $data[Schema::CountryB->value],
            $data[Schema::CityB->value],
            $data[Schema::RegionB->value],
            $data[Schema::DistrictB->value],
            $data[Schema::SettleAreaB->value],
            $data[Schema::StreetB->value],
            $data[Schema::BnumB->value],
            $data[Schema::BknumB->value],
            $data[Schema::ApartB->value],
            $data[Schema::AddrB->value],
            $data[Schema::PassSernum->value],
            $data[Schema::PassNo->value],
            $data[Schema::PassIssuedate->value],
            $data[Schema::PassIssuedep->value],
            $data[Schema::PassIssueplace->value],
            $data[Schema::Birthdate->value],
            $data[Schema::Birthplace->value],
            $data[Schema::LastModDate->value],
            $data[Schema::WrongActive->value],
            $data[Schema::WrongDate->value],
            $data[Schema::Diplomat->value],
            $data[Schema::Resident->value],
            $data[Schema::AgrmType->value],
            $data[Schema::Oksm->value],
            $data[Schema::Okato->value],
            $data[Schema::PublicAgree->value],
        );
    }

    #[Override]
    public function dehydrate(mixed $entity): array
    {
        return [
            Schema::Uid->value => $entity->uid,
            Schema::Login->value => $entity->login,
            Schema::Pass->value => $entity->pass,
            Schema::Ipaccess->value => $entity->ipaccess,
            Schema::Type->value => $entity->type,
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
            Schema::BillDelivery->value => $entity->billDelivery,
            Schema::Category->value => $entity->category,
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
            Schema::LastModDate->value => $entity->lastModDate,
            Schema::WrongActive->value => $entity->wrongActive,
            Schema::WrongDate->value => $entity->wrongDate,
            Schema::Diplomat->value => $entity->diplomat,
            Schema::Resident->value => $entity->resident,
            Schema::AgrmType->value => $entity->agrmType,
            Schema::Oksm->value => $entity->oksm,
            Schema::Okato->value => $entity->okato,
            Schema::PublicAgree->value => $entity->publicAgree,
        ];
    }

    #[Override]
    public function getId(mixed $entity): string
    {
        return $entity->uid;
    }

    #[Override]
    public function getIdFieldName(): string
    {
        return Schema::Uid->value;
    }
}
