<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

/**
 * Поле vgroups.blk_req.
 */
enum VgroupBlockRequest
{
    /** 0 - нет запроса */
    case None;

    /** 1 - по балансу */
    case Balance;

    /** 2 - пользовательский */
    case User;

    /** 3 - администратором */
    case Administrator;
}
