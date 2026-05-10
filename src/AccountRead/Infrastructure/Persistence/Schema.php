<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Infrastructure\Persistence;

use Modular\Persistence\Schema\Contract\ISchema;
use Modular\Persistence\Schema\Definition\ColumnDefinition;

enum Schema: string implements ISchema
{
    case Uid = 'uid';
    case VgId = 'vg_id';

    public static function getTableName(): string
    {
        return 'acc_list';
    }

    public function getColumnDefinition(): ColumnDefinition
    {
        return match ($this) {
            self::Uid => ColumnDefinition::int($this, 11)->nullable(false)->default(0),
            self::VgId => ColumnDefinition::int($this, 10)->nullable(false)->default(0)->primaryKey(),
        };
    }
}
