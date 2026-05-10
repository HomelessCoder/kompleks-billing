# bills
**Description:** Платежи

| Field | Type | Description |
|---|---|---|
| record_id | int unsgned | Идентификатор записи |
| vg_id | int unsgned | учетная запись (vg_id из vgroups или uid) |
| pay_date | datetime | Дата платежа |
| sum | double | Сумма платежа |
| mod_person | int | Менеджера, модифицировавший запись (person_id из managers) |
| bill_num | varchar(32) | Номер товарной накладной (уникальный идентификатор) |
| bill_descr | varchar(200) | Описание платежа |
| is_order | tinyint | 0 – обычный платеж, 1 – оплата счета |
| remote_date | datetime | Дата платежа по часам внешней платежной системы |
| cancel_date | datetine | Дата аннулирования платежа |
| status | tinyint | Статус платежей, импортированных из внешних систем: 0 - первичный платеж, 1 - подтвержденный (после сверки), 2 - платеж отменен |
| receipt | varchar(32) | уникальный идентификатор платежа во внешней системе |
| order_id | int | идентификатор счета при оплате по счету (замена is_order в 11 сборке) |
