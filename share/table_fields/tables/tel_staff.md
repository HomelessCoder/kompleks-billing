# tel_staff
**Description:** Телефоны, присвоеные учетным записям

| Field | Type | Description |
|---|---|---|
| id | int(11) | Агент (id из settings) |
| vg_id | int(11) | Учетная запись (vg_id из vgroups) |
| phone_number | varchar(32) | Номер телефона, для учетных записей одного агента должен быть уникален. |
| comment | varchar(32) | Комментарий |
| device | tinyint | тип абонентского устройства (0-телефон, 1-МТА) |
| ldservice | tinyint | признак выхода на МГ/МН (1-открыт) |
