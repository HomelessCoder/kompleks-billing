# groups
**Description:** Объединения (учетных записей)

| Field | Type | Description |
|---|---|---|
| group_id | int(11) | идентификатор объединения |
| name | varchar(32) | название объединения |
| description | text | описание объединения |
| predstav_id | int(11) | Идентификатор представителя (по умолчанию 0 - заданный в опциях, иначе predstav_id из predstav) |
| tar_id | int unsigned | объединение по тарифу |
| user_type | tinyint | объединение по типу пользователя (физ/юр лица) |
