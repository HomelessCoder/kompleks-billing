<?php

declare(strict_types=1);

namespace LanBilling\Agreement\Infrastructure\Persistence;

use Modular\Persistence\Schema\Contract\ISchema;
use Modular\Persistence\Schema\Definition\ColumnDefinition;

enum Schema: string implements ISchema
{
    case Uid = 'uid';
    case Operator = 'operator';
    case Number = 'number';
    case Date = 'date';

    public static function getTableName(): string
    {
        return 'agreements_list';
    }

    public function getColumnDefinition(): ColumnDefinition
    {
        return match ($this) {
            self::Uid => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::Operator => ColumnDefinition::int($this, 5)->nullable(false)->default(0),
            self::Number => ColumnDefinition::varchar($this, 64)->nullable(true)->default(null),
            self::Date => ColumnDefinition::date($this)->nullable(true)->default(null),
        };
    }
}
