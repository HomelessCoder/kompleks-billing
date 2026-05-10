# radius_attrs
**Description:** дополнительные атрибуты RADIUS-пакетов

| Field | Type | Description |
|---|---|---|
| radius_attr_id | int(11) | идентификатор атрибута |
| description | varchar(64) | описание (показывется в списке атрибутов в интерфейсе) |
| group_id | int(11) | объединение (group_id из groups) |
| vg_id | unsigned int | Учетная запись (vg_id из vgroups) 0 – по group_id или shape |
| shape | int unsigned | Привязка к текущей полосе пропускания (>0). |
| radius_code | tinyint unsigned | Код пакета (Accept, Reject) |
| radius_type | tinyint unsigned | тип атрибута (0-255) |
| string_value | tinyblob | значение атрибута (спецсимволы храняться как есть) |
| int_value | int unsigned | числовое значение аттрибута (NULL – значение атрибута в string_value) |
| vsa_type | tinyint unsigned | номер VSA |
