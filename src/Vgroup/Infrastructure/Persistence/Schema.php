<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Infrastructure\Persistence;

use Modular\Persistence\Schema\Contract\ISchema;
use Modular\Persistence\Schema\Definition\ColumnDefinition;

enum Schema: string implements ISchema
{
    case VgId = 'vg_id';
    case CLimit = 'c_limit';
    case DLimit = 'd_limit';
    case DClear = 'd_clear';
    case Login = 'login';
    case Pass = 'pass';
    case Status = 'status';
    case BlkReq = 'blk_req';
    case Blocked = 'blocked';
    case Descr = 'descr';
    case Balance = 'balance';
    case TarId = 'tar_id';
    case Id = 'id';
    case Modified = 'modified';
    case BLimit = 'b_limit';
    case BCheck = 'b_check';
    case BNotify = 'b_notify';
    case OffTime = 'off_time';
    case BillActive = 'bill_active';
    case AccOn = 'acc_on';
    case AccOndate = 'acc_ondate';
    case AccOffdate = 'acc_offdate';
    case TraffType = 'traff_type';
    case Depth = 'depth';
    case Allownoip = 'allownoip';
    case TelPin = 'tel_pin';
    case Changed = 'changed';
    case Shape = 'shape';
    case UseAon = 'use_aon';
    case ZcTable = 'zc_table';
    case ZcRecordId = 'zc_record_id';
    case ZcBalance = 'zc_balance';
    case ZcType = 'zc_type';
    case PrevCLimit = 'prev_c_limit';
    case AccOnplandate = 'acc_onplandate';
    case Comments = 'comments';
    case WrongActive = 'wrong_active';
    case WrongDate = 'wrong_date';
    case Operator = 'operator';
    case UseAs = 'use_as';
    case MaxSessions = 'max_sessions';
    case Archive = 'archive';
    case OperCode = 'oper_code';
    case VatFree = 'vat_free';
    case IgnoreUserBlock = 'ignore_user_block';
    case Kod1c = 'kod_1c';
    case CuId = 'cu_id';

    public static function getTableName(): string
    {
        return 'vgroups';
    }

    public function getColumnDefinition(): ColumnDefinition
    {
        return match ($this) {
            self::VgId => ColumnDefinition::autoincrement($this)->primaryKey(),
            self::CLimit => ColumnDefinition::bigint($this, 20)->nullable(false)->default(0),
            self::DLimit => ColumnDefinition::bigint($this, 20)->nullable(false)->default(0),
            self::DClear => ColumnDefinition::date($this)->nullable(true)->default(null),
            self::Login => ColumnDefinition::varchar($this, 63)->nullable(true)->default(null),
            self::Pass => ColumnDefinition::varchar($this, 128)->nullable(true)->default(null),
            self::Status => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::BlkReq => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::Blocked => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::Descr => ColumnDefinition::text($this),
            self::Balance => ColumnDefinition::decimal($this, 20, 2)->nullable(true)->default(0),
            self::TarId => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::Id => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::Modified => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::BLimit => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::BCheck => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::BNotify => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::OffTime => ColumnDefinition::timestamp($this)->nullable(true)->default(null),
            self::BillActive => ColumnDefinition::decimal($this, 20, 2)->nullable(true)->default(0),
            self::AccOn => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(0),
            self::AccOndate => ColumnDefinition::timestamp($this)->nullable(false)->default('0000-00-00 00:00:00'),
            self::AccOffdate => ColumnDefinition::timestamp($this)->nullable(false)->default('0000-00-00 00:00:00'),
            self::TraffType => ColumnDefinition::int($this, 11)->nullable(true)->default(3),
            self::Depth => ColumnDefinition::decimal($this, 20, 2)->nullable(true)->default(0),
            self::Allownoip => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::TelPin => ColumnDefinition::varchar($this, 32)->nullable(true)->default(null),
            self::Changed => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::Shape => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::UseAon => ColumnDefinition::int($this, 1)->nullable(true)->default(0),
            self::ZcTable => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::ZcRecordId => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::ZcBalance => ColumnDefinition::decimal($this, 20, 2)->nullable(true)->default(0),
            self::ZcType => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::PrevCLimit => ColumnDefinition::bigint($this, 40)->nullable(true)->default(0),
            self::AccOnplandate => ColumnDefinition::date($this)->nullable(true)->default(null),
            self::Comments => ColumnDefinition::varchar($this, 250)->nullable(false)->default(''),
            self::WrongActive => ColumnDefinition::tinyint($this, 3)->nullable(false)->default(0),
            self::WrongDate => ColumnDefinition::timestamp($this)->nullable(false)->default('0000-00-00 00:00:00'),
            self::Operator => ColumnDefinition::tinyint($this, 1)->nullable(true)->default(0),
            self::UseAs => ColumnDefinition::tinyint($this, 1)->nullable(true)->default(0),
            self::MaxSessions => ColumnDefinition::int($this, 11)->nullable(true)->default(1),
            self::Archive => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(0),
            self::OperCode => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::VatFree => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(0),
            self::IgnoreUserBlock => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(0),
            self::Kod1c => ColumnDefinition::varchar($this, 10)->nullable(true)->default(null),
            self::CuId => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
        };
    }
}
