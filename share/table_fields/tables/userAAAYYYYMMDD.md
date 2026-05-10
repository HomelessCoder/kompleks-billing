# userAAAYYYYMMDD
**Description:** первичная статистика кабельных агентов (таблицы ежедневно создаются агентом)

| Field | Type | Description |
|---|---|---|
| ip | int unsigned | IP адрес присвоенный клиенту |
| cin | bigint(20) | Входящий трафик в байтах |
| cout | bigint(20) | Исходящий трафик в байтах |
| timefrom | time | Начало пакета "20030212152300" |
| timeto | time | Окончание потока "20030212152339" |
| protnum | smallint unsigned | Протокол: 6 - TCP, 17 - UDP |
| mask | varchar(18) | Маска в соответствии с которой учтен пакет |
| remote | int unsigned | IP адрес назначения |
| ipport | smallint unsigned | Порт источник |
| remport | smallint unsigned | Порт приемник |
| vg_id | int unsigned | Учетная запись (vg_id из vgroups) |
| amount | double | списано денег |
| cat_idx | int unsigned | категория каталога (cat_idx из cat_[cat_used]_idx) |
| cat_used | tinyint unsigned | каталог, 0 – не тарифицировали по каталогу |
| tar_id | int unsigned | тариф в соответствии с которым производилось списание средств (tar_id из tarifs) |
| size_discount | int unsigned | скидка по объему (dis_id из discounts, 0 -нет скидки) |
| time_discount | int unsigned | льготное время (bonus_id из bonuses, 0 - нет скидки) |
| holiday_discount | tinyint unsigned | льгота выходного дня (we_bonus 1 – скидка применяется) |
| rent | tinyint unsigned | 1 - включено в а/п, 0 не включено в а/п – работа по превышению |
| traff_type | tinyint unsigned | направление трафика по которому производится расчет (1-входящий, 2-исходящий, 3-по сумме, 0-не тарифицировался) |
