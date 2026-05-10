# month
**Description:** Месячная статистика (формируется из данных в таблице userYYYYMMDD)

| Field | Type | Description |
|---|---|---|
| ip | int unsgned | IP адрес клиента |
| cin | bigint(20) | Входящий трафик в байтах |
| cout | bigint(20) | Исходящий трафик в байтах |
| timefrom | date | Дата сохраненного трафика с точностью до месяца: YYYYMM01 |
| amount | double | Суммарные списания в р.е. по трафику (аналогично полю amount в user*) |
| vg_id | int unsigned | Идентификатор учетной записи (vg_id из vgroups) |
