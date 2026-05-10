<?php

declare(strict_types=1);

namespace LanBilling\Bill\Domain\Model;

use DateTimeImmutable;

/**
 * Платеж.
 *
 * @property-read int $recordId Идентификатор записи.
 * @property-read int $accountUid Учетная запись (vg_id из vgroups или uid).
 * @property-read DateTimeImmutable $payDate Дата платежа.
 * @property-read ?float $sum Сумма платежа.
 * @property-read ?int $modPerson Менеджер, модифицировавший запись (person_id из managers).
 * @property-read ?string $billNum Номер товарной накладной (уникальный идентификатор).
 * @property-read ?string $billDescr Описание платежа.
 * @property-read bool $isOrder 0 - обычный платеж, 1 - оплата счета.
 * @property-read ?int $orderId Идентификатор счета при оплате по счету (замена is_order в 11 сборке).
 * @property-read ?DateTimeImmutable $remoteDate Дата платежа по часам внешней платежной системы.
 * @property-read ?DateTimeImmutable $cancelDate Дата аннулирования платежа.
 * @property-read BillStatus $status Статус платежей, импортированных из внешних систем.
 * @property-read ?string $receipt Уникальный идентификатор платежа во внешней системе.
 */
final readonly class Bill
{
    public function __construct(
        public int $recordId,
        public int $accountUid,
        public DateTimeImmutable $payDate,
        public ?float $sum,
        public ?int $modPerson,
        public ?string $billNum,
        public ?string $billDescr,
        public bool $isOrder,
        public ?int $orderId,
        public ?DateTimeImmutable $remoteDate,
        public ?DateTimeImmutable $cancelDate,
        public BillStatus $status,
        public ?string $receipt,
    ) {
    }
}
