# vg_backup
**Description:** Информация о изменении учетных записей (заполняется значениями из vgroups)

| Field | Type | Description |
|---|---|---|
| record_id | int(11) | Уникальный идентификатор записи. |
| vg_id | int(11) | учетная запись (vg_id из vgroups) |
| mod_date | datetime | Дата изменения |
| mod_person | int(11) | идентификатор менеджера, проводившего модификацию (person_id из managers) |
| login | varchar(63) | Логин к собственной статистике через веб |
| na_id | int(11) | Идентификатор агента которому принадлежит учетная запись (id из vgroups, который есть id из settings) |
| indreq | int(11) | Необходимость индексации: 5 - удалена, 4 - изменена, 3 - новая, 0 - не требуется |
| allowvpn | int(11) | Разрешение работы в VPN без IP (0-запрещено, 1-разрешено) |
| pin | varchar(32) | PIN (tel_pin из vgroups) |
| base_tariff | Int(11) | Тариф (tar_id из tarifs) |
| bal_limit | double | Предел после которого уведомлять (b_limit из vgroups) |
| pass | varchar(128) | Пароль доступа к собственной статистике через веб |
