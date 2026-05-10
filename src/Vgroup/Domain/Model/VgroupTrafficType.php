<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

/**
 * Поле vgroups.traff_type.
 */
enum VgroupTrafficType
{
    /** 1 - вход */
    case Incoming;

    /** 2 - исходящий */
    case Outgoing;

    /** 3 - общий */
    case Total;
}
