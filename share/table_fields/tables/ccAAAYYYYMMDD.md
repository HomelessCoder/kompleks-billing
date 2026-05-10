# ccAAAYYYYMMDD
**Description:** Таблица со статистикой разовых услуг агента IVOX

| Field | Type | Description |
|---|---|---|
| numfrom | varchar(32) | номер А |
| numto | varchar(32) | номер Б |
| timefrom | datetime | время начала услуги |
| timeto | datetime | время окончания услуги |
| duration | int(11) | Продолжительность звонка в секундах |
| vg_id | int(11) | идентификатор учетной записи |
| direction | int(11) | направление звонка |
| cat_idx | int(11) | номер каталога |
| price | double | Цена звонка |
| amount | double | Списание с баланса (price!=amount – стоимость звонка,включенного в а/п) |
| record_id | int(11) | идентификатор записи |
| type_id | int(11) | класс услуги (1-временные, 2-разовые) |
| cat_number | int(11) | номер каталога |
| descr | Varchar(150) | Описание для разовой услуги |
| mul | double | оказать услугу в количестве... (множитель для стоимости из каталога) |
