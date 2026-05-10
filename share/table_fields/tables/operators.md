# operators
**Description:** Операторы

| Field | Type | Description |
|---|---|---|
| oper_id | int(11) | Идентификатор оператора |
| balance | double | Баланс оператора |
| name | varchar(100) | Название организации |
| address1 | varchar(200) | Юридический адрес |
| address2 | varchar(200) | Физический адрес |
| r_s | char(20) | Расчетный счет |
| bank | varchar(200) | Название банка |
| korr_s | char(20) | Корреспондентский счет |
| bik | char(15) | БИК |
| inn | char(15) | ИНН |
| kpp | char(15) | КПП |
| gen_dir | varchar(100) | ФИО Генерального директора |
| buhg_name | varchar(100) | ФИО главного бухгалтера |
| descr | varchar(250) | описание оператора |
| type | tinyint | формат выгрузки (1-Ростелеком) |
| company_id | varchar(32) | идентификатор, присвоенный оператором (для выгрузки) |
| keyword | varchar(32) | ключевое слово (для выгрузки) |
| file_prefix | varchar(255) | префикс файла выгрузки с полным путем (полное имя=префикс+номер выгрузки+_дата) |
| file_number | int unsigned | номер последней выгрузки |
| file_date | datetime | дата последней выгрузки |
