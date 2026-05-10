# cat_we_bonus
**Description:** Скидки выходного дня для каталога

| Field | Type | Description |
|---|---|---|
| cat_id | int(11) | Каталог (cat_id из catalog) |
| cat_idx | int(11) | Категория (cat_idx из таблицы cat_[cat_id]_idx) |
| rate | int(11) | Абсолютный размер скидки (-1 – скидка относительная) |
| discount | double | Относительный размер скидки (-1 – абсолютная скидка) |
| oper_rate | int(11) | Относительный размер скидки для себестоимости |
| oper_discount | double | Абсолютный размер скидки для себестоимости |
