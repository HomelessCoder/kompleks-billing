# sbss_knowledge_posts
**Description:** Сообщения базы знаний

| Field | Type | Description |
|---|---|---|
| id | int | уникальный номер записи |
| knowledge_id | int | идентификатор темы базы знаний, привязан внешним ключом к sbss_knowledge.id |
| author_type | tinyint | тип автора создавшего запрос (0 — менеджер, 1 — клиент) |
| author_id | id | идентификатор автора в зависимости от типа |
| created_on | datetime | дата создания сообщения |
| text | text | текст сообщения |
| spec | tinyint | тип сообщения 0 — общее, 1 — служебное |
