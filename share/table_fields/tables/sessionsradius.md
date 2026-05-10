# sessionsradius
**Description:** Активные сессии для агентов типа Radius

| Field | Type | Description |
|---|---|---|
| vg_id | int unsigned | Уникальный идентификатор клиента (vg_id из vgroups) |
| assigned_ip | int unsigned | Присвоенный IP адрес |
| session_id | varchar(36) | идентификатор сессии (для RADIUS session_id, для VoIP h323-conf-id) |
| authmoment | datetime | Время (успешной) аутентификации |
| start_time | datetime | Время начала сессии |
| sess_ani | varchar(32) | ANI |
| sess_dnis | varchar(32) | DNIS |
| id | int | Идентификатор агента (id из settings) |
| nas | int unsigned | IP NAS'а, на котором поднята сессия |
| stop_req | tinyint | 1 - запрос на разрыв сессии |
