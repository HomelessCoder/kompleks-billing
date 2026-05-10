# month_balances
**Description:** Счетчики списаний за месяц (PCDR, PABX, VoIP, IVOX)

| Field | Type | Description |
|---|---|---|
| date | date | месяц в формате YYYYMM01 |
| vg_id | int unsigned | учетная запись (vg_id из vgroups) |
| balance | double | сумма цен (поле price) звонков, для категорий вкл. в a/п (сравнивается с includes из tarifs) |
| amount | double | сумма списаний за звонки, для категорий НЕ вкл. в a/п (сравнивается с amount из discounts) |
