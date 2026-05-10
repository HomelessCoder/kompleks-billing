# radAAAYYYYMMDDani
**Description:** Статистика авторизаций по RADIUS (таблицы ежедневно создаются агентом)

| Field | Type | Description |
|---|---|---|
| item_id | int(11) | не используется |
| vg_id | int(11) | Учетная запись (vg_id из vgroups) 0 – определить vg_id нельзя |
| time | datetime | Время авторизации YYYYMMDDHHMMSS |
| ani | varchar(32) | Calling-Station-Id из RADIUS пакета |
| dnis | varchar(32) | Called-Station-Id из RADIUS пакета |
