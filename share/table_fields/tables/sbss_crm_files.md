# sbss_crm_files
**Description:** Прикрепленные файлы CRM системы к пользователю

| Field | Type | Description |
|---|---|---|
| id | int | уникальный идентификатор записи |
| client_id | int | идентификатор пользователя из accounts |
| created_on | datetime | дата создания файла |
| author_id | int | идентификатор менеджера создавшего документ в базе |
| edited_on | datetime | время редактирования документа |
| edited_id | int | идентификатор менеджера изменившего документ |
| original_name | varchar | Иригинальное название файла при загрузке на сервер |
| size | int | размер прикрепленного файла в байтах |
| description | varchar | описание файла |
