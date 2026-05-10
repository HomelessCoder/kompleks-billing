<?php

declare(strict_types=1);

namespace LanBilling\Account\Infrastructure\Persistence;

use Modular\Persistence\Schema\Contract\ISchema;
use Modular\Persistence\Schema\Definition\ColumnDefinition;

enum Schema: string implements ISchema
{
    case Uid = 'uid';
    case Login = 'login';
    case Pass = 'pass';
    case Ipaccess = 'ipaccess';
    case Type = 'type';
    case Balance = 'balance';
    case Depth = 'depth';
    case Descr = 'descr';
    case Name = 'name';
    case Phone = 'phone';
    case Fax = 'fax';
    case AgrmNum = 'agrm_num';
    case AgrmDate = 'agrm_date';
    case Email = 'email';
    case Kod1c = 'kod_1c';
    case BillDelivery = 'bill_delivery';
    case Category = 'category';
    case BankName = 'bank_name';
    case BranchBankName = 'branch_bank_name';
    case TreasuryName = 'treasury_name';
    case TreasuryAccount = 'treasury_account';
    case Bik = 'bik';
    case Settl = 'settl';
    case Corr = 'corr';
    case Kpp = 'kpp';
    case Inn = 'inn';
    case Ogrn = 'ogrn';
    case Okpo = 'okpo';
    case Okved = 'okved';
    case GenDirU = 'gen_dir_u';
    case GlBuhgU = 'gl_buhg_u';
    case KontPerson = 'kont_person';
    case ActOnWhat = 'act_on_what';
    case FaIndex = 'fa_index';
    case Country = 'country';
    case City = 'city';
    case Street = 'street';
    case Bnum = 'bnum';
    case Bknum = 'bknum';
    case Apart = 'apart';
    case Addr = 'addr';
    case Region = 'region';
    case District = 'district';
    case SettleArea = 'settle_area';
    case YuIndex = 'yu_index';
    case CountryU = 'country_u';
    case CityU = 'city_u';
    case StreetU = 'street_u';
    case BnumU = 'bnum_u';
    case BknumU = 'bknum_u';
    case ApartU = 'apart_u';
    case AddrU = 'addr_u';
    case RegionU = 'region_u';
    case DistrictU = 'district_u';
    case SettleAreaU = 'settle_area_u';
    case BIndex = 'b_index';
    case CountryB = 'country_b';
    case CityB = 'city_b';
    case RegionB = 'region_b';
    case DistrictB = 'district_b';
    case SettleAreaB = 'settle_area_b';
    case StreetB = 'street_b';
    case BnumB = 'bnum_b';
    case BknumB = 'bknum_b';
    case ApartB = 'apart_b';
    case AddrB = 'addr_b';
    case PassSernum = 'pass_sernum';
    case PassNo = 'pass_no';
    case PassIssuedate = 'pass_issuedate';
    case PassIssuedep = 'pass_issuedep';
    case PassIssueplace = 'pass_issueplace';
    case Birthdate = 'birthdate';
    case Birthplace = 'birthplace';
    case LastModDate = 'last_mod_date';
    case WrongActive = 'wrong_active';
    case WrongDate = 'wrong_date';
    case Diplomat = 'diplomat';
    case Resident = 'resident';
    case AgrmType = 'agrm_type';
    case Oksm = 'oksm';
    case Okato = 'okato';
    case PublicAgree = 'public_agree';

    public static function getTableName(): string
    {
        return 'accounts';
    }

    public function getColumnDefinition(): ColumnDefinition
    {
        return match ($this) {
            self::Uid => ColumnDefinition::autoincrement($this)->primaryKey(),
            self::Login => ColumnDefinition::varchar($this, 32)->nullable(true)->default(null),
            self::Pass => ColumnDefinition::varchar($this, 32)->nullable(true)->default(null),
            self::Ipaccess => ColumnDefinition::tinyint($this, 1)->nullable(true)->default(0),
            self::Type => ColumnDefinition::int($this, 3)->nullable(true)->default(1),
            self::Balance => ColumnDefinition::decimal($this, 20, 2)->nullable(false)->default(0),
            self::Depth => ColumnDefinition::decimal($this, 20, 2)->nullable(true)->default(0),
            self::Descr => ColumnDefinition::text($this),
            self::Name => ColumnDefinition::varchar($this, 255)->nullable(true)->default(null),
            self::Phone => ColumnDefinition::varchar($this, 32)->nullable(true)->default(null),
            self::Fax => ColumnDefinition::varchar($this, 32)->nullable(true)->default(null),
            self::AgrmNum => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::AgrmDate => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::Email => ColumnDefinition::varchar($this, 128)->nullable(true)->default(null),
            self::Kod1c => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::BillDelivery => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(1),
            self::Category => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(2),
            self::BankName => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::BranchBankName => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::TreasuryName => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::TreasuryAccount => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::Bik => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::Settl => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::Corr => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::Kpp => ColumnDefinition::varchar($this, 32)->nullable(true)->default(null),
            self::Inn => ColumnDefinition::varchar($this, 40)->nullable(true)->default(null),
            self::Ogrn => ColumnDefinition::varchar($this, 30)->nullable(true)->default(null),
            self::Okpo => ColumnDefinition::varchar($this, 30)->nullable(true)->default(null),
            self::Okved => ColumnDefinition::varchar($this, 30)->nullable(true)->default(null),
            self::GenDirU => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::GlBuhgU => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::KontPerson => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::ActOnWhat => ColumnDefinition::varchar($this, 100)->nullable(true)->default(null),
            self::FaIndex => ColumnDefinition::varchar($this, 7)->nullable(true)->default(null),
            self::Country => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::City => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::Street => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::Bnum => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::Bknum => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::Apart => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::Addr => ColumnDefinition::varchar($this, 128)->nullable(true)->default(null),
            self::Region => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::District => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::SettleArea => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::YuIndex => ColumnDefinition::varchar($this, 7)->nullable(true)->default(null),
            self::CountryU => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::CityU => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::StreetU => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::BnumU => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::BknumU => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::ApartU => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::AddrU => ColumnDefinition::varchar($this, 128)->nullable(true)->default(null),
            self::RegionU => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::DistrictU => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::SettleAreaU => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::BIndex => ColumnDefinition::varchar($this, 7)->nullable(true)->default(null),
            self::CountryB => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::CityB => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::RegionB => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::DistrictB => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::SettleAreaB => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::StreetB => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::BnumB => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::BknumB => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::ApartB => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::AddrB => ColumnDefinition::varchar($this, 128)->nullable(true)->default(null),
            self::PassSernum => ColumnDefinition::varchar($this, 20)->nullable(true)->default(null),
            self::PassNo => ColumnDefinition::varchar($this, 30)->nullable(true)->default(null),
            self::PassIssuedate => ColumnDefinition::varchar($this, 20)->nullable(true)->default(null),
            self::PassIssuedep => ColumnDefinition::varchar($this, 200)->nullable(true)->default(null),
            self::PassIssueplace => ColumnDefinition::varchar($this, 240)->nullable(true)->default(null),
            self::Birthdate => ColumnDefinition::varchar($this, 20)->nullable(true)->default(null),
            self::Birthplace => ColumnDefinition::varchar($this, 240)->nullable(true)->default(null),
            self::LastModDate => ColumnDefinition::timestamp($this)->default('0000-00-00 00:00:00'),
            self::WrongActive => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(0),
            self::WrongDate => ColumnDefinition::timestamp($this)->default('0000-00-00 00:00:00'),
            self::Diplomat => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(2),
            self::Resident => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(1),
            self::AgrmType => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(1),
            self::Oksm => ColumnDefinition::int($this, 11)->nullable(false)->default(643),
            self::Okato => ColumnDefinition::varchar($this, 32)->nullable(false)->default('0'),
            self::PublicAgree => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(0),
        };
    }
}
