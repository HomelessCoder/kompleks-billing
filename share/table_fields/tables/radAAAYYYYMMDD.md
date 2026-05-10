# radAAAYYYYMMDD
**Description:** Таблицы с трафиком агента RADIUS (ежедневно создаются агентом)

| Field | Type | Description |
|---|---|---|
| login | varchar(63) | Имя клиента - идентификатор |
| cin | bigint | Входящий трафик в байтах |
| cout | bigint | Исходящий трафик в байтах |
| timefrom | datetime | Начало сессии YYYYMMDDHHMMSS |
| timeto | datetime | Окончание сессии YYYYMMDDHHMMSS |
| vg_id | int(11) | Идентификатор учетной записи (vg_id из vgroups) |
| session_id | varchar(32) | идентификатор сессии (из аккаунтинг пакета) |
| amount | double | Списано средств за сессию |
| ani | varchar(17) | calling-station-id из RADIUS пакета |
| ip | int(10) unsigned | выданный ip адрес |
