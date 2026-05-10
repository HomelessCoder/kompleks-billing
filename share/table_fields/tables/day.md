# day
**Description:** Дневная статистика (формируется из данных в таблице userYYYYMMDD)

| Field | Type | Description |
|---|---|---|
| ip | int unsgned | IP адрес клиента |
| cin | bigint | Входящий трафик в байтах |
| cout | bigint | Исходящий трафик в байтах |
| timefrom | datetime | Дата сохраненного трафика с точностью до дня в формате |
| amount | double | Суммарные списания в р.е. по трафику (аналогично полю amount в user*) |
| vg_id | int unsgned | Идентификатор учетной записи (vg_id из vgroups) |
