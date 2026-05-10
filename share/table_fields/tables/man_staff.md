# man_staff
**Description:** Принадлежность групп пользователей менеджерам

| Field | Type | Description |
|---|---|---|
| person_id | int(11) | идентификатор менеджера (person_id из managers) |
| ug_id | varchar(32) | идентификатор группы пользователей (group_id из usergroups) |
| rw_flag | int(11) | признак доступности объединения по записи/чтению (0 - чтение, 1-запись) |
