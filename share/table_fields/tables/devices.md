# devices
**Description:** Экземпляры устройств

| Field | Type | Description |
|---|---|---|
| id | Int | Идентификатор устройства |
| type_id | int(11) | = devtypes.id |
| owner | int(11) | = devicegrps.id |
| mac | varchar(64) | Уникальный адрес (MAC, IP etc.) |
| name | varchar(64) | Название |
| descr | varchar(255) | описание |
| index | varchar(7) | индекс |
| country | varchar(64) | адрес: страна |
| city | varchar(64) | адрес: город |
| street | varchar(64) | адрес: улица |
| bnum | varchar(10) | адрес: дом |
| bknum | varchar(10) | адрес: корпус |
| apart | varchar(10) | адрес: квартира/офис |
| region | varchar(64) | адрес: регион |
| district | varchar(64) | адрес: район |
| settle | varchar(64) | адрес: населенный пункт |
| addr | varchar(128) | адрес: примечание |
