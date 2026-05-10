# devtypeparms
**Description:** Параметры для типа устройства/группы портов/порта типа. Предполагается, что только одно из полей *_id != 0

| Field | Type | Description |
|---|---|---|
| id | int(11) | Идентификатор параметра |
| type_id | int(11) | = devtypes.id |
| port_id | int(11) | = devtypeports.id |
| grp_id | int(11) | = devtypegrps.id |
| name | varchar(64) | Название |
| descr | varchar(255) | описание |
| value | varchar(255) | значение |
