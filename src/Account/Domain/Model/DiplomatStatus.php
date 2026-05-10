<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

/**
 * Поле accounts.diplomat.
 */
enum DiplomatStatus
{
    /** 1 - дипломат */
    case Diplomat;

    /** 2 - не дипломат */
    case NonDiplomat;
}
