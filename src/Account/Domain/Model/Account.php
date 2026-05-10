<?php

declare(strict_types=1);

namespace LanBilling\Account\Domain\Model;

use DateTimeImmutable;

/**
 * Пользователь.
 *
 * Общие поля.
 * @property-read int $uid Идентификатор пользователя.
 * @property-read ?string $login Логин для входа в клиентский интерфейс.
 * @property-read ?string $pass Пароль для входа в клиентский интерфейс.
 * @property-read ?bool $ipaccess Доступ в кабинет клиента только с IP адресов учетных записей кабельных агентов.
 * @property-read AccountType $type Тип пользователя: 1 - Юридическое лицо, 2 - Физическое лицо.
 * @property-read float $balance Общий баланс (PRO, конвергентный биллинг).
 * @property-read ?float $depth Разрешенный размер кредита в р.е. (только для конвергентного режима).
 * @property-read ?string $descr Описание.
 * @property-read ?string $name Имя пользователя / Название компании.
 * @property-read ?string $phone Телефон.
 * @property-read ?string $fax Факс.
 * @property-read ?string $agrmNum Номер договора.
 * @property-read ?string $agrmDate Дата договора.
 * @property-read ?string $email E-mail.
 * @property-read ?string $kod1c Код 1С.
 * @property-read ?BillDeliveryType $billDelivery Способ доставки счета: 0-курьер, 1-почтой, 2-самостоятельно, 3-другой.
 * @property-read ?AccountCategory $category 0-Бюджет, 1-хозрасчет, 2-население, 3-ПБОЮЛ.
 * @property-read ?DateTimeImmutable $lastModDate Дата последнего изменения (заполняется автоматически).
 * @property-read int $wrongActive Счетчик неверно введенных карт предоплаты (максимально 10).
 * @property-read ?DateTimeImmutable $wrongDate Дата и время последнего неверного ввода карты предоплаты.
 * @property-read DiplomatStatus $diplomat 1 - дипломат, 2 - не дипломат.
 * @property-read ResidentStatus $resident 0 - не резидент, 1 - резидент.
 * @property-read int $agrmType Тип договора: 1-клиент(бизнес), 2-дистрибьютор(реселлер), 3-партнер(комиссионер), 4-оператор(взаимодействие), 5-оператор(присоединение), 6-дистрибьютор(агент), 7-поставщик(оператор), 8-клиент(частный), 7-поставщик(не оператор).
 * @property-read int $oksm Код страны абонента по ОКСМ.
 * @property-read string $okato Место заключения договора по ОКАТО.
 * @property-read bool $publicAgree Факт согласия абонента на использовании сведений в инф.-справочных системах.
 *
 * Реквизиты для юридических лиц.
 * @property-read ?string $bankName Для юр. лиц - название банка.
 * @property-read ?string $branchBankName Наименование отделения банка.
 * @property-read ?string $treasuryName Наименование казначейства.
 * @property-read ?string $treasuryAccount Номер лицевого счета в казначействе.
 * @property-read ?string $bik БИК.
 * @property-read ?string $settl Расчетный счет.
 * @property-read ?string $corr Корр. счет.
 * @property-read ?string $kpp КПП.
 * @property-read ?string $inn ИНН.
 * @property-read ?string $ogrn ОГРН - обще-государственный регистрационный номер.
 * @property-read ?string $okpo ОКПО.
 * @property-read ?string $okved ОКВЕД.
 * @property-read ?string $genDirU Для юр. лиц - генеральный директор.
 * @property-read ?string $glBuhgU Для юр. лиц - главбух.
 * @property-read ?string $kontPerson Для юр. лиц - контактное лицо.
 * @property-read ?string $actOnWhat Для юр. лиц - на основании чего действует директор.
 *
 * Фактический адрес.
 * @property-read ?string $faIndex Фактический индекс.
 * @property-read ?string $country Фактический адрес: страна.
 * @property-read ?string $city Фактический адрес: город.
 * @property-read ?string $street Фактический адрес: улица.
 * @property-read ?string $bnum Фактический адрес: дом.
 * @property-read ?string $bknum Фактический адрес: корпус.
 * @property-read ?string $apart Фактический адрес: квартира/офис.
 * @property-read ?string $addr Фактический адрес: примечание.
 * @property-read ?string $region Фактический адрес: регион.
 * @property-read ?string $district Фактический адрес: район.
 * @property-read ?string $settleArea Фактический адрес: населенный пункт.
 *
 * Юридический адрес.
 * @property-read ?string $yuIndex Юридический индекс.
 * @property-read ?string $countryU Юридический адрес: страна.
 * @property-read ?string $cityU Юридический адрес: город.
 * @property-read ?string $streetU Юридический адрес: улица.
 * @property-read ?string $bnumU Юридический адрес: дом.
 * @property-read ?string $bknumU Юридический адрес: корпус.
 * @property-read ?string $apartU Юридический адрес: квартира/офис.
 * @property-read ?string $addrU Юридический адрес: примечание.
 * @property-read ?string $regionU Юридический адрес: регион.
 * @property-read ?string $districtU Юридический адрес: район.
 * @property-read ?string $settleAreaU Юридический адрес: населенный пункт.
 *
 * Адрес для предоставления счета.
 * @property-read ?string $bIndex Адрес счета: индекс.
 * @property-read ?string $countryB Адрес счета: страна.
 * @property-read ?string $cityB Адрес счета: город.
 * @property-read ?string $regionB Адрес счета: регион.
 * @property-read ?string $districtB Адрес счета: район.
 * @property-read ?string $settleAreaB Адрес счета: населенный пункт.
 * @property-read ?string $streetB Адрес счета: улица.
 * @property-read ?string $bnumB Адрес счета: дом.
 * @property-read ?string $bknumB Адрес счета: корпус.
 * @property-read ?string $apartB Адрес счета: квартира/офис.
 * @property-read ?string $addrB Адрес счета: примечание.
 *
 * Паспортные данные для физических лиц.
 * @property-read ?string $passSernum Паспортные данные: серия.
 * @property-read ?string $passNo Паспортные данные: номер.
 * @property-read ?string $passIssuedate Паспортные данные: дата выдачи.
 * @property-read ?string $passIssuedep Паспортные данные: кем выдан.
 * @property-read ?string $passIssueplace Паспортные данные: место выдачи.
 * @property-read ?string $birthdate Дата рождения.
 * @property-read ?string $birthplace Место рождения.
 */
final readonly class Account
{
    public function __construct(
        public int $uid,
        public ?string $login,
        public ?string $pass,
        public ?bool $ipaccess,
        public AccountType $type,
        public float $balance,
        public ?float $depth,
        public ?string $descr,
        public ?string $name,
        public ?string $phone,
        public ?string $fax,
        public ?string $agrmNum,
        public ?string $agrmDate,
        public ?string $email,
        public ?string $kod1c,
        public ?BillDeliveryType $billDelivery,
        public ?AccountCategory $category,
        public ?string $bankName,
        public ?string $branchBankName,
        public ?string $treasuryName,
        public ?string $treasuryAccount,
        public ?string $bik,
        public ?string $settl,
        public ?string $corr,
        public ?string $kpp,
        public ?string $inn,
        public ?string $ogrn,
        public ?string $okpo,
        public ?string $okved,
        public ?string $genDirU,
        public ?string $glBuhgU,
        public ?string $kontPerson,
        public ?string $actOnWhat,
        public ?string $faIndex,
        public ?string $country,
        public ?string $city,
        public ?string $street,
        public ?string $bnum,
        public ?string $bknum,
        public ?string $apart,
        public ?string $addr,
        public ?string $region,
        public ?string $district,
        public ?string $settleArea,
        public ?string $yuIndex,
        public ?string $countryU,
        public ?string $cityU,
        public ?string $streetU,
        public ?string $bnumU,
        public ?string $bknumU,
        public ?string $apartU,
        public ?string $addrU,
        public ?string $regionU,
        public ?string $districtU,
        public ?string $settleAreaU,
        public ?string $bIndex,
        public ?string $countryB,
        public ?string $cityB,
        public ?string $regionB,
        public ?string $districtB,
        public ?string $settleAreaB,
        public ?string $streetB,
        public ?string $bnumB,
        public ?string $bknumB,
        public ?string $apartB,
        public ?string $addrB,
        public ?string $passSernum,
        public ?string $passNo,
        public ?string $passIssuedate,
        public ?string $passIssuedep,
        public ?string $passIssueplace,
        public ?string $birthdate,
        public ?string $birthplace,
        public ?DateTimeImmutable $lastModDate,
        public int $wrongActive,
        public ?DateTimeImmutable $wrongDate,
        public DiplomatStatus $diplomat,
        public ResidentStatus $resident,
        public int $agrmType,
        public int $oksm,
        public string $okato,
        public bool $publicAgree,
    ) {
    }
}
