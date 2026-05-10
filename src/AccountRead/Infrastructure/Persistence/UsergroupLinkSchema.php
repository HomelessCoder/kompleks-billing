<?php

declare(strict_types=1);

namespace LanBilling\AccountRead\Infrastructure\Persistence;

use Modular\Persistence\Schema\Contract\ISchema;
use Modular\Persistence\Schema\Definition\ColumnDefinition;

enum UsergroupLinkSchema: string implements ISchema
{
    case GroupId = 'group_id';
    case Uid = 'uid';

    public static function getTableName(): string
    {
        return 'usergroups_staff';
    }

    public function getColumnDefinition(): ColumnDefinition
    {
        return match ($this) {
            self::GroupId => ColumnDefinition::int($this, 11)->default(0),
            self::Uid => ColumnDefinition::int($this, 11)->default(0),
        };
    }
}
