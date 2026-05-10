# vg_blocks
**Description:** Журнал блокировок учетных записей

| Field | Type | Description |
|---|---|---|
| record_id | int(11) | Уникальный идентификатор записи. |
| vg_id | int unsigned | Учетная запись (vg_id из vgroups или uid из accounts) |
| timefrom | bigint(40) | дата блокировки (в unixtime) |
| timeto | bigint(40) | дата снятия блокировки (в unixtime) |
| block_type | tinyint unsigned | Блокировка: 3 - администратором, 2 - пользовательская, 1 – по балансу, 4 - активная блокировка в 3ем сценарии |
