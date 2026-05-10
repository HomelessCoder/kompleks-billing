# cat_bonuses
**Description:** Скидки по времени для категорий каталога

| Field | Type | Description |
|---|---|---|
| bonus_id | int unsgned | Идентификатор скидки |
| cat_id | int(11) | Каталог (cat_id из catalog) |
| cat_idx | int(11) | Категория (cat_idx из таблицы cat_[cat_id]_idx) |
| timefrom | time | Время начала действия скидки |
| timeto | time | Время окончания действия скидки |
| discount | double | Относительный размер скидки (-1 – абсолютная скидка) |
| rate | int(11) | Абсолютный размер скидки (-1 – скидка относительная) |
| oper_rate | int(11) | Относительный размер скидки для себестоимости |
| oper_discount | double | Абсолютный размер скидки для себестоимости |
