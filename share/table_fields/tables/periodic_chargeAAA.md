# periodic_chargeAAA
**Description:** Таблица со статистикой периодических услуг агента IVOX

| Field | Type | Description |
|---|---|---|
| record_id | int | Порядковый номер записи |
| vg_id | int | идентификатор учетной записи |
| dateofcharge | datetime | дата тарификации услуги |
| amount | double | величина списаний |
| price | double | стоимость услуги из каталога |
| mul | double | оказать услугу в количестве... (множитель для стоимости из каталога) |
| ch_code2 | tinyint | сценарий списания |
| ch_code3 | tinyint | не используется |
| dateofservice | datetime | период, за который проводилось списание |
| service_id | int unsigned | номер сервиса из каталога |
| cat_id | int | номер каталога |
