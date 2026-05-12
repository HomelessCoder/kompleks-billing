<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Infrastructure\Persistence;

use Modular\Persistence\Schema\Contract\ISchema;
use Modular\Persistence\Schema\Definition\ColumnDefinition;

enum Schema: string implements ISchema
{
    case TarId = 'tar_id';
    case Includes = 'includes';
    case Above = 'above';
    case Rent = 'rent';
    case BlockRent = 'block_rent';
    case Descr = 'descr';
    case RentMode = 'rent_mode';
    case Type = 'type';
    case UseIncludes = 'use_includes';
    case FreeSeconds = 'free_seconds';
    case ConfAbove = 'conf_above';
    case CallMode = 'call_mode';
    case ActBlock = 'act_block';
    case RoundSeconds = 'round_seconds';
    case CatNumber = 'cat_number';
    case IncomingCost = 'incoming_cost';
    case RedirectCost = 'redirect_cost';
    case IvrCharge = 'ivr_charge';
    case VoicemailCharge = 'voicemail_charge';
    case OpcallCharge = 'opcall_charge';
    case CatNumberIvox = 'cat_number_ivox';
    case CatNumberIncoming = 'cat_number_incoming';
    case EmptycallCharge = 'emptycall_charge';
    case LocalRoundSeconds = 'local_round_seconds';
    case LocalFreeSeconds = 'local_free_seconds';
    case Shape = 'shape';
    case Archive = 'archive';
    case CatNumberIvoxPer = 'cat_number_ivox_per';
    case PricePlan = 'price_plan';
    case VoipBlockLocal = 'voip_block_local';
    case DynRoute = 'dyn_route';
    case ReverseIncoming = 'reverse_incoming';
    case Unavaliable = 'unavaliable';
    case TraffLimit = 'traff_limit';
    case TraffLimitPer = 'traff_limit_per';
    case RentMultiply = 'rent_multiply';

    public static function getTableName(): string
    {
        return 'tarifs';
    }

    public function getColumnDefinition(): ColumnDefinition
    {
        return match ($this) {
            self::TarId => ColumnDefinition::autoincrement($this)->primaryKey(),
            self::Includes => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::Above => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::Rent => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::BlockRent => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::Descr => ColumnDefinition::varchar($this, 255)->nullable(true)->default(null),
            self::RentMode => ColumnDefinition::int($this, 1)->nullable(false)->default(0),
            self::Type => ColumnDefinition::int($this, 2)->nullable(false)->default(0),
            self::UseIncludes => ColumnDefinition::int($this, 11)->nullable(false)->default(1),
            self::FreeSeconds => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::ConfAbove => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::CallMode => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::ActBlock => ColumnDefinition::int($this, 11)->nullable(false)->default(2),
            self::RoundSeconds => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::CatNumber => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::IncomingCost => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::RedirectCost => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::IvrCharge => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::VoicemailCharge => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::OpcallCharge => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::CatNumberIvox => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::CatNumberIncoming => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::EmptycallCharge => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::LocalRoundSeconds => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::LocalFreeSeconds => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::Shape => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::Archive => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(0),
            self::CatNumberIvoxPer => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::PricePlan => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(0),
            self::VoipBlockLocal => ColumnDefinition::tinyint($this, 4)->nullable(true)->default(0),
            self::DynRoute => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(0),
            self::ReverseIncoming => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(0),
            self::Unavaliable => ColumnDefinition::tinyint($this, 1)->nullable(false)->default(0),
            self::TraffLimit => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::TraffLimitPer => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::RentMultiply => ColumnDefinition::tinyint($this, 1)->nullable(false)->default(0),
        };
    }
}
