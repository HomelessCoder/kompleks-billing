# deviceparms
**Description:** Параметры для устройства/группы устройств/порта устройства. Предполагается, что только одно из полей *_id != 0

| Field | Type | Description |
|---|---|---|
| id | int(11) | Идентификатор параметра |
| dev_id | int(11) | = devices.id |
| port_id | int(11) | = deviceports.id |
| grp_id | int(11) | = devicegrps.id |
| name | varchar(64) | Название |
| descr | varchar(255) | описание |
| value | varchar(255) | значение |
