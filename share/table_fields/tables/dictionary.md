# dictionary
**Description:** Словарь RADIUS атрибутов

| Field | Type | Description |
|---|---|---|
| record_id | int(11) | Уникальный идентификатор записи. |
| id | int(11) | идентификатор агента |
| nas_id | int(11) | идентификатор NAS'а |
| name | varchar(32) | название атрибута |
| radius_type | tinyint unsigned | номер атрибута |
| vsa_type | tinyint unsigned | номер VSA |
| vendor | int unsigned | номер вендора (для VSA) |
| value_type | tinyint | тип атрибута (0-int,1-string,2-avpair,3-ipaddr,5-url,6-octets,7-sublist) |
| avpair | Varchar(32) | Имя (префикс) avpair атрибута — используется в основном для CISCO VSA 1 (атрибут общего назначения). |
