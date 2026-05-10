# year
**Description:** Годовая статистика

| Field | Type | Description |
|---|---|---|
| ip | char(30) | IP адрес клиента |
| cin | bigint(20) | Входящий трафик в байтах |
| cout | bigint(20) | Исходящий трафик в байтах |
| timefrom | timestamp(2) | год, за который выгружена статистика YY |
| mask | char(18) | Маска сети в соответствии с которой учитывается пакет |
| vg_id | int(11) | Учетная запись (vg_id из vgroups) |
