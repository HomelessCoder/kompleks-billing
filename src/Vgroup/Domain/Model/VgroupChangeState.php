<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

/**
 * Поля vgroups.modified и vgroups.changed.
 */
enum VgroupChangeState
{
    /** 0 - не требуется */
    case NotRequired;

    /** 3 - новая */
    case New;

    /** 4 - изменена */
    case Changed;

    /** 5 - удалена */
    case Deleted;
}
