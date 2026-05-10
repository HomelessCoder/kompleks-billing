# balances
**Description:** Зафиксированные балансы пользователей

| Field | Type | Description |
|---|---|---|
| date | date | дата фиксации баланса |
| balance | double | значение баланса группы (balance из vgroups, на момент фиксации) |
| vg_id | int unsgned | учетная запись (vg_id из vgroups) |
| tar_id | int unsigned | тариф на момент фиксации для неконвергентного режима |
| block_type | tinyint | тип блокировки уч. Записи на момент фиксации для неконвергентного режима |
| uid | Int(11) | пользователь (uid из accounts) |
