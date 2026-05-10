<?php

declare(strict_types=1);

namespace LanBilling\Bill\Infrastructure\Persistence;

use Modular\Persistence\Schema\Contract\ISchema;
use Modular\Persistence\Schema\Definition\ColumnDefinition;

enum Schema: string implements ISchema
{
    case RecordId = 'record_id';
    case VgId = 'vg_id';
    case PayDate = 'pay_date';
    case Sum = 'sum';
    case BillNum = 'bill_num';
    case ModPerson = 'mod_person';
    case BillDescr = 'bill_descr';
    case IsOrder = 'is_order';
    case OrderId = 'order_id';
    case RemoteDate = 'remote_date';
    case CancelDate = 'cancel_date';
    case Status = 'status';
    case Receipt = 'receipt';

    public static function getTableName(): string
    {
        return 'bills';
    }

    public function getColumnDefinition(): ColumnDefinition
    {
        return match ($this) {
            self::RecordId => ColumnDefinition::autoincrement($this)->primaryKey(),
            self::VgId => ColumnDefinition::int($this, 10)->nullable(true)->default(null),
            self::PayDate => ColumnDefinition::timestamp($this)->nullable(false),
            self::Sum => ColumnDefinition::decimal($this, 20, 2)->nullable(true)->default(null),
            self::BillNum => ColumnDefinition::varchar($this, 32)->nullable(true)->default(null),
            self::ModPerson => ColumnDefinition::int($this, 11)->nullable(true)->default(0),
            self::BillDescr => ColumnDefinition::varchar($this, 200)->nullable(true)->default(null),
            self::IsOrder => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(0),
            self::OrderId => ColumnDefinition::int($this, 11)->nullable(true)->default(null),
            self::RemoteDate => ColumnDefinition::timestamp($this)->nullable(true)->default(null),
            self::CancelDate => ColumnDefinition::timestamp($this)->nullable(true)->default(null),
            self::Status => ColumnDefinition::tinyint($this, 4)->nullable(false)->default(0),
            self::Receipt => ColumnDefinition::varchar($this, 36)->nullable(true)->default(null),
        };
    }
}
