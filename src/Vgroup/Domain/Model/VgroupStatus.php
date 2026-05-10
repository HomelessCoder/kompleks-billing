<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

/**
 * Поле vgroups.status.
 */
enum VgroupStatus
{
    /** 0 - не отключать */
    case DoNotDisable;

    /** 1 - отключать автоматически */
    case AutoDisable;
}
