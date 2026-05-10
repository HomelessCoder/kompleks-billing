# config
**Description:** Интерфейсы агента

| Field | Type | Description |
|---|---|---|
| id | int(11) | Идентификатор агента (id из settings) |
| devname | varchar(32) | Имя интерфейса |
| type | int(11) | Тип агента: 1- ethernet, 10 - NetFlow, 0 - внутренний, 1 - внешний |
| ignoremask | int unsigned | Маска сети в соответствии с которой игнорируется трафик на интерфейсе |
