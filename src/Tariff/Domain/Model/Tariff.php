<?php

declare(strict_types=1);

namespace LanBilling\Tariff\Domain\Model;

/**
 * Тариф.
 *
 * @property-read int $tarId Идентификатор тарифа.
 * @property-read int $includes Предоплаченный трафик для базового тарифа для кабельных агентов.
 * @property-read int $above Стоимость превышения.
 * @property-read int $rent Аренда канала.
 * @property-read int $blockRent Аренда для учетной записи в заблокированном состоянии.
 * @property-read ?string $descr Описание тарифа.
 * @property-read int $rentMode Сценарий списания абонентской платы.
 * @property-read int $type Тип тарифа.
 * @property-read int $useIncludes Стоимость звонков и услуг, включенных в абонентскую плату.
 * @property-read int $freeSeconds Количество бесплатных секунд для всех тарифных зон.
 * @property-read int $confAbove Стоимость минуты конференции в агенте PCDR.
 * @property-read int $callMode Тарификация локальных звонков по времени или по факту.
 * @property-read int $actBlock Применять активную блокировку.
 * @property-read int $roundSeconds Точность округления.
 * @property-read int $catNumber Номер каталога для тарификации.
 * @property-read int $incomingCost Стоимость входящего звонка.
 * @property-read int $redirectCost Стоимость переадресации звонка.
 * @property-read int $ivrCharge Стоимость работы с IVR.
 * @property-read int $voicemailCharge Стоимость работы с голосовой почтой.
 * @property-read int $opcallCharge Стоимость работы с оператором.
 * @property-read int $catNumberIvox Номер каталога разовых услуг.
 * @property-read int $catNumberIncoming Номер каталога для тарификации входящих звонков.
 * @property-read int $emptycallCharge Цена нулевого исходящего звонка.
 * @property-read ?int $localRoundSeconds Точность округления локальных звонков.
 * @property-read ?int $localFreeSeconds Бесплатное время локальных звонков.
 * @property-read int $shape Скорость для шейпера.
 * @property-read ?bool $archive Активный или архивный тариф.
 * @property-read int $catNumberIvoxPer Идентификатор каталога периодических услуг для тарифов IVOX.
 * @property-read int $pricePlan Тип тарифа.
 * @property-read ?bool $voipBlockLocal Блокировать локальные звонки для агента VoIP.
 * @property-read int $dynRoute Динамическая маршрутизация VoIP звонков.
 * @property-read bool $reverseIncoming Искать входящие звонки по номеру Б или А.
 * @property-read bool $unavaliable Скрыт ли тариф в списках назначения.
 * @property-read int $traffLimit Ограничение трафика за период.
 * @property-read int $traffLimitPer Период ограничения трафика в днях.
 * @property-read bool $rentMultiply Признак умножения абонентской платы.
 */
final readonly class Tariff
{
    public function __construct(
        public int $tarId,
        public int $includes,
        public int $above,
        public int $rent,
        public int $blockRent,
        public ?string $descr,
        public int $rentMode,
        public int $type,
        public int $useIncludes,
        public int $freeSeconds,
        public int $confAbove,
        public int $callMode,
        public int $actBlock,
        public int $roundSeconds,
        public int $catNumber,
        public int $incomingCost,
        public int $redirectCost,
        public int $ivrCharge,
        public int $voicemailCharge,
        public int $opcallCharge,
        public int $catNumberIvox,
        public int $catNumberIncoming,
        public int $emptycallCharge,
        public ?int $localRoundSeconds,
        public ?int $localFreeSeconds,
        public int $shape,
        public ?bool $archive,
        public int $catNumberIvoxPer,
        public int $pricePlan,
        public ?bool $voipBlockLocal,
        public int $dynRoute,
        public bool $reverseIncoming,
        public bool $unavaliable,
        public int $traffLimit,
        public int $traffLimitPer,
        public bool $rentMultiply,
    ) {
    }
}
