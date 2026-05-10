# serv_func
**Description:** Сервисные функции

| Field | Type | Description |
|---|---|---|
| func_id | Int | Порядковый номер функции/записи |
| agent_id | Int | Привязать к агенту (ID агента) |
| file_size | int_unsigned | Размер файла (байт) |
| origin_file | varchar(64) | Оригинальное имя загруженого файла |
| saved_file | varchar(64) | Файл сохранен под именем |
| Descr | Varchar(255) | Описание функции |
| run_in | Tinyint unsigned | Запустить функцию 0 – вэб скрипт, 1 – консольно на сервере |
