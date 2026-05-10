# telAAAYYYYMMDD
**Description:** Статистика агента PABX (автоматически генерируются агентом)

| Field | Type | Description |
|---|---|---|
| numfrom | varchar(32) | телефон "локального" абонента (если абонент не найден, то совпадает с original_numfrom) |
| numto | varchar(32) | телефон второго абонента |
| trunk_in | varchar(32) | входящий транк(линия) |
| trunk_out | varchar(32) | исходящий транк |
| timefrom | datetime | Время начала звонка |
| duration | int(11) | Продолжительность звонка в секундах |
| vg_id | int unsgned | Учетная запись (vg_id из vgroups) 0 – телефон абонента не присвоен ни одной уч.записи |
| direction | int(11) | направление: 0-входящий,1-исходящий,2-Transfer call,3-Forward call,4-External,5-Internal,6-Conference user,7-Conference moderator (работает только 0,1) |
| cat_num | int(11) | Каталог, по которому тарифицировался звонок (cat_id из catalog) |
| cat_idx | int(11) | Категория каталога (cat_idx из таблицы cat_[cat_num]_idx) |
| tar_id | int | идентификатор тарифа |
| time_discount | int | идентификатор скидки по времени |
| size_discount | int | идентификатор скидки по объему |
| holiday_discount | tinyint | признак скидки выходного дня |
| price | double | Цена звонка |
| amount | double | Списание с баланса (price!=amount – стоимость звонка включена в а/п) |
| duration_round | int(11) | Округленая продолжительность звонка в секундах |
| oper_id | int(11) | Оператор, по каталогам которого протарифицирован звонок |
| oper_price | double | Себестоимость звонка |
| need_calc | tinyint | необходимость пересчета данной записи |
| session_id | varchar(36) | идентификатор сессии (пока не используется) |
| record_id | int unsigned | идентификатор записи в таблице |
| rent | tinyint | Признак включения в а/п (не используется) |
| original_numfrom | varchar(32) | Номер А из CDR записи |
| original_numto | varchar(32) | Номер Б из CDR записи |
| original_direction | int(11) | направление звонка, определенное на этапе парсинга CDR |
| original_vg_id | int unsigned | vg_id, полученный на этапе аутентификации в VoIP агенте (в остальных случаях 0) |
| cin | bigint(20) | Входящий трафик в байтах для VoIP |
| cout | bigint(20) | Bcходящий трафик в байтах для VoIP |
