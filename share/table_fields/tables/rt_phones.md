# rt_phones
**Description:** Выгружаемые данные о телефонных номерах в формате "Ростелеком"

| Field | Type | Description |
|---|---|---|
| uid | int(11) | связка с rt_accounts |
| oper_id | int(11) | оператор, по которому производилась выгрузка |
| phone_number | varchar(32) | номер учетной записи из tel_staff |
| device | tinyint(4) | тип абонентского устройства (0-телефон, 1-МТА) |
| price_plan | tinyint(4) | тип тарифа (служебный, население, хозрасчет, бюджет) |
| ldservice | tinyint(4) | наличие выхода на МГ/МН |
| company_code | varchar(64) | уникальный код операторя для выгрузки |
| vat_free | tinyint(4) | облагается ли номер НДС |
| file_number | int unsigned | номер файла выгрузки |
| creation_date | timestamp | CURRENT_TIMESTAMP |
