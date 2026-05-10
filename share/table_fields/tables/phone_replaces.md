# phone_replaces
**Description:** Замена номеров

| Field | Type | Description |
|---|---|---|
| record_id | int(11) | идентфикатор записи |
| new_number | varchar(32) | Номер, под которым звонок попадает в статистику |
| old_number | varchar(32) | Номер, с которым звонок приходит от станции |
| id | int(11) | агент |
| l_trim | int(11) | длина отрезаемого префикса для групповой замены |
| replace_what | tinyint | какой номер заменять: 0-номер А, 1-номер Б, 2-оба. |
