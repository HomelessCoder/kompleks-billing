# devtypeports
**Description:** Порты типа устройства

| Field | Type | Description |
|---|---|---|
| id | int(11) | Идетификатор порта |
| type_id | int(11) | = devtypes.id |
| uplink | tinyint(1) | если 0, то доступно для привязки к учеткам |
| name | varchar(64) | Название |
| descr | varchar(255) | описание |
