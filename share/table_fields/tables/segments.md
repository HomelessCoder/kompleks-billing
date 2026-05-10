# segments
**Description:** Сегменты подучетные агенту

| Field | Type | Description |
|---|---|---|
| id | int(11) | Идентификатор агента (id из settings) |
| segment | int unsigned | Адрес сети |
| mask | int unsigned | Маска сети |
| nas_id | int(11) | Привязка сегмента к NAS'у для агента RADIUS DialIn в случае использования пула адресов. 0 - сегмент доступен всем, -1 - сегмент в пуле не используется, >0 - id NAS'а |
