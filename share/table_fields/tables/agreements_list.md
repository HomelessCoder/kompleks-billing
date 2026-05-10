# agreements_list
**Description:** Список договоров пользователя с операторами. Зависит от таблиц accounts и operators

| Field | Type | Description |
|---|---|---|
| uid | Int(11) | Идентификатор пользователя |
| operator | Int(5) | Идентификатор оператора, с которым заключен договор |
| number | Varchar(64) | Номер договора |
| date | date | дата договора |
