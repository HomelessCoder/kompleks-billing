<?php

declare(strict_types=1);

namespace LanBilling\Vgroup\Domain\Model;

use DateTimeImmutable;

/**
 * Учетная запись.
 *
 * @property-read int $vgId Уникальный идентификатор учетной записи.
 * @property-read int $cLimit Количество байт или минут укаченных с начала месяца.
 * @property-read int $dLimit Счетчик байт (секунд для DialUp по времени), используемый для ограничения трафика за период.
 * @property-read ?DateTimeImmutable $dClear Дата последнего обнуления счетчика d_limit.
 * @property-read ?string $login Логин к собственной статистике через веб.
 * @property-read ?string $pass Пароль доступа к собственной статистике через веб.
 * @property-read ?VgroupStatus $status Привилегированная ли группа: 1 - отключать автоматически, 0 - не отключать.
 * @property-read ?VgroupBlockRequest $blkReq Необходимость блокировки / разблокировки: 3 - администратором, 2 - пользовательский, 1 - по балансу, 0 - нет запроса.
 * @property-read ?VgroupBlockState $blocked Признак блокировки: 5 - лимит трафика за период, 4 - активная блокировка, 3 - администратором, 2 - пользователь, 1 - баланс, 0 - разблокировано.
 * @property-read ?string $descr Описание группы.
 * @property-read ?float $balance Баланс группы в расчетных единицах.
 * @property-read ?int $tarId Номер базового тарифа (tar_id из tarifs).
 * @property-read ?int $agentId Агент, которому принадлежит учетная запись (id из settings).
 * @property-read ?VgroupChangeState $modified Признак модификации NLAI: 5 - удалена, 4 - изменена, 3 - новая, 0 - не требуется.
 * @property-read ?int $bLimit Предел после которого уведомлять.
 * @property-read ?int $bCheck Уведомлять ли о балансе (если уже то 1).
 * @property-read ?int $bNotify Уведомлять ли о балансе.
 * @property-read ?DateTimeImmutable $offTime Время отключения группы.
 * @property-read ?float $billActive Размер оплаты за подключения к услуге.
 * @property-read ?bool $accOn Флаг подключения группы к услуге.
 * @property-read ?DateTimeImmutable $accOnDate Дата подключения услуги.
 * @property-read ?DateTimeImmutable $accOffDate Дата предполагаемого отключения услуги.
 * @property-read ?VgroupTrafficType $traffType Тип трафика, подлежащего учету (1-вход, 2-исходящий, 3-общий).
 * @property-read ?float $depth Размер кредита для абонентов RADIUS, EtherNet, NetFlow (0 - кредит не разрешен).
 * @property-read ?bool $allowNoIp Разрешение работы в VPN без IP (0-запрещено, 1-разрешено).
 * @property-read ?string $telPin Пароль при авторизации по АОН.
 * @property-read ?VgroupChangeState $changed Любое изменение информации об учетной записи: 5 - удалена, 4 - изменена, 3 - новая, 0 - не требуется.
 * @property-read ?int $shape Ограничение трафика (0 - не ограничено).
 * @property-read ?bool $useAon Пускать по АОН в USER_NAME, проверяя пароль (tel_pin).
 * @property-read ?int $zcTable Дата пересечения нуля балансом.
 * @property-read ?int $zcRecordId Номер записи в таблице с детальной статистикой, на которой произошло пересечение нуля.
 * @property-read ?float $zcBalance Баланс, который был перед пересечением нуля.
 * @property-read ?ZeroCrossingType $zcType Признак списания, вызвавшего переход баланса через 0.
 * @property-read ?int $prevCLimit Предыдущий c_limit (при смене месяца агент копирует сюда c_limit, который обнуляет).
 * @property-read ?DateTimeImmutable $accOnPlanDate Дата подключения учетной записи.
 * @property-read string $comments Комментарии при подключении.
 * @property-read int $wrongActive Счетчик неверно введенных карт предоплаты (максимально 10).
 * @property-read ?DateTimeImmutable $wrongDate Дата и время последнего неверного ввода карты предоплаты.
 * @property-read ?bool $useAs Флаг, использовать или нет тарификацию по AS.
 * @property-read ?int $maxSessions Количество одновременных сессий для данной учетной записи (для агентов RADIUS, VoIP, Кабельных).
 * @property-read ?bool $archive Признак удаления записи.
 * @property-read ?string $operCode Код, определяемый оператором (для выгрузки РТ).
 * @property-read ?bool $vatFree Облагается ли НДС (для выгрузки РТ).
 * @property-read ?bool $ignoreUserBlock Для учетных записей, обслуживаемых агентами RADIUS: не учитывать пользовательскую блокировку при аутентификации.
 * @property-read ?string $kod1c Код 1С.
 * @property-read ?int $cuId Идентификатор учетной записи во внешней системе (используется агентом IVOX).
 */
final readonly class Vgroup
{
    public function __construct(
        public int $vgId,
        public int $cLimit,
        public int $dLimit,
        public ?DateTimeImmutable $dClear,
        public ?string $login,
        public ?string $pass,
        public ?VgroupStatus $status,
        public ?VgroupBlockRequest $blkReq,
        public ?VgroupBlockState $blocked,
        public ?string $descr,
        public ?float $balance,
        public ?int $tarId,
        public ?int $agentId,
        public ?VgroupChangeState $modified,
        public ?int $bLimit,
        public ?int $bCheck,
        public ?int $bNotify,
        public ?DateTimeImmutable $offTime,
        public ?float $billActive,
        public ?bool $accOn,
        public ?DateTimeImmutable $accOnDate,
        public ?DateTimeImmutable $accOffDate,
        public ?VgroupTrafficType $traffType,
        public ?float $depth,
        public ?bool $allowNoIp,
        public ?string $telPin,
        public ?VgroupChangeState $changed,
        public ?int $shape,
        public ?bool $useAon,
        public ?int $zcTable,
        public ?int $zcRecordId,
        public ?float $zcBalance,
        public ?ZeroCrossingType $zcType,
        public ?int $prevCLimit,
        public ?DateTimeImmutable $accOnPlanDate,
        public string $comments,
        public int $wrongActive,
        public ?DateTimeImmutable $wrongDate,
        public ?int $operator,
        public ?bool $useAs,
        public ?int $maxSessions,
        public ?bool $archive,
        public ?string $operCode,
        public ?bool $vatFree,
        public ?bool $ignoreUserBlock,
        public ?string $kod1c,
        public ?int $cuId,
    ) {
    }
}
