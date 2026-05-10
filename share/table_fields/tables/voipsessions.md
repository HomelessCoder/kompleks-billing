# voipsessions
**Description:** активные сессии для агента типа VoIP Radius

| Field | Type | Description |
|---|---|---|
| session_id | int(11) | идентификатор записи |
| vg_id | int unsigned | идентификатор учетной записи |
| confid | char(36) | идентификатор сессии, передаваемый в атрибуте h323-conf-id (cisco VSA) |
| updatetime | datetime | вермя последнего accounting-update пакета |
| authmoment | datetime | время успешной аутентификации |
| phone | varchar(32) | Номер Б |
| phone_from | varchar(32) | Номер А |
| direction | tinyint | 1 - исходящий |
| id | int(11) | id агента |
| stop_req | tinyint | запрос разрыва соединения |
| nas | int unsigned | IP адрес NAS'a |
