# settings
**Description:** Конфигурацию агента

| Field | Type | Description |
|---|---|---|
| id | int(11) | Идентификатор агента (ключ) |
| type | int(11) | Тип агента: 0-Ethernet, 1-Netflow, 2-RADIUS, 3-PABX, 4 - PCDR, 5 - Sflow, 6 - IVOX, 7 - VoIP |
| mapfile | varchar(32) | Местоположение файла соответствий при маскировании (/proc/net/ip_conntrack - tables, /proc/net/ip_masquerade - chains, NULL) |
| licdev | varchar(8) | Имя интерфейса к которому привязывается лицензия |
| flush | int(11) | Период записи "сырых" данных в БД |
| timer | Int(11) | Период проверки необходимости блокировки/разблокировки. |
| descr | text | Описание агента |
| nfport | int(11) | Порт на который присылается поток NETFLOW или SFLOW |
| na_ip | varchar(20) | IP адрес БД хранения (где находится БД со статистикой агента) |
| lastcontact | datetime | Время последнего контакта со стороны агента |
| grmodified | int(11) | Признак модификации группы (не используется в данный момент) |
| hour | datetime | Час когда последний раз выгружалась часовая статистика |
| tproxy | int(11) | Применяется прозрачный прокси на агенте (0 - нет, 1 – да) |
| adm_notify | int(11) | Осуществлять запуск скрипта по факту отсутствия связи с агентом (0 - нет, 1 - да) |
| rlogverb | int(11) | Уровень детализации лог-файла для RADIUS агента |
| raccport | int(11) | "Accouting" порт для RADIUS |
| rauthport | int(11) | "Autentication" порт для RADIUS |
| na_db | varchar(32) | Имя БД агента |
| na_username | varchar(32) | Имя пользователя для доступа к БД агента |
| na_pass | varchar(32) | Пароль пользователя для доступа к БД агента |
| lbctcd_parity | int(11) | 0-even,1-odd,2-no Четность интерфейса |
| tel_ats | int(11) | 0-LG GHX 616, 1-NEC NEAX 2000, 2-Definity unfromarted CDR,3-Nortel Meridian, 4-Panasonic KXTD/KXTA,5-Merlin, 6-Samsung IDCS 500,7-Bedford 45, 8 – IVOX. |
| lbctcd_com_speed | int(11) | 0-1200,1-9600,2-19200,3-38400,4-57600,5-115200 Скорость интерфейса |
| lbctcd_stop_bits | int(11) | 0-1,1-2 Количество стоповых бит |
| lbctcd_num_data_bits | int(11) | 0-5,1-6,2-7,3-8 Кол-во бит данных в потоке интерфейса |
| lbctcd_com_name | varchar(32) | Название интерфейса |
| lbctcd_data_file | varchar(255) | Имя файла куда выводится CDR (файл дублирования) |
| lbctcd_cr_data_file | varchar(255) | Имя файла куда выводится RAW CDR (файл дублирования, поток полученный от станции через интерфейс) |
| remulate | tinyint | не используется |
| remulate_on_naid | int(11) | идентификатор кабельного агента, с которым работает агент RADIUS в режиме эмуляции (id из другой строки settings) |
| cdr_file_path | varchar(255) | Путь файла CDR |
| conference_file_path | varchar(255) | Путь файла CDR, содержащему информацию о конференциях. |
| create_cdr_file_hh | int(11) | не используется |


## create_cdr_file_mm
**Description:** int(11)

| Field | Type | Description |
|---|---|---|


## create_conf_file_hh
**Description:** int(11)

| Field | Type | Description |
|---|---|---|


## create_conf_file_mm
**Description:** int(11)

| Field | Type | Description |
|---|---|---|
| prefix_1 | char(64) | Префикс таблицы информации об услугах 1-го и 2-го классов |
| prefix_2 | char(64) | Префикс таблицы статистики услуг класса 3 |
| prefix_3 | char(64) | Префикс таблицы с информацией о клиентах биллинга |
| prefix_4 | char(64) | Префикс таблицы экспорта новых клиентов из биллинга в СС |
| prev_month | tinyint(4) | Для кабельных агентов за какой месяц обнулили c_limit и скопировали их в prev_c_limit |
| raddrpool | tinyint(1) | Для Radius выдавать ip адреса из пула |
| ignorelocal | tinyint(1) | Игнорировать локальный трафик (1 - не учитывается, 0 – учитывается) |
| eapcertpassword | varchar(255) | пароль к сертификату сервера для авторизации по RADIUS EAP/TLS |
| service_name | varchar(255) | Услуга предоставляемая агентом (отображается в счетах в 1С) |
| session_lifetime | int(11) | время жизни сессии агента RADIUS в секундах, по истечении сессия без аккаунинга удаляется |
| radius_auth | int(11) | Битовое поле, определяющее включенные протоколы авторизации для RADIUS-агента (по умолчанию 127) |
| eapcertdir | varchar(200) | Директория где хранятся файлы сертификатов для протокола eap/tls |
| p_eapcertdir | varchar(200) | Директория где хранятся файлы сертификатов для протокола peap |
| p_eapcertpassword | varchar(25) | Пароль для доступа к сертификату peap |
| check_user_cert | tinyint(1) | Флаг, проверять или нет сертификат пользователя (0-нет, 1-да) |
| use_mppe | tinyint(2) | Применение mppe (1-нет, 2-возможно, 3-обязательно) |
| recalc_date | date | Дата до которой произвести пересчет статистики (при выполнении отката) |
| recalc_act | tinyint(4) | Признак того, что необходимо произвести пересчет статистики |
| save_stat_addr | tinyint(1) | Флаг, сохранять или нет статически выделенные IP-адреса при выборе выделения адресов из пула (радиус) |
| session_losttime | int(11) | при удалении сессии VoIP агента по timeout'у это время добавляется к продолжительности звонка. |
| local_as_num | Int(11) | номер своей АС |
| acc_only | tinyint | Флаг для VoIP RADIUS'а, указывающий на работу без аутентификации |
| max_radius_timeout | int(11) | Максимальный таймаут, выдаваемый на сессию, в случае отсутсвия прочих ограничений (0 - бесконечность) |
| compatible | tinyint | Флаг для IVOX агента, указывающий на работу в режиме совместимости с версией 1.7 (под наумен) |
| ivox_depth | int(11) | Глубина поиска по таблицам для IVOX агента |
| tel_direction_mode | tinyint | Изменить алгоритм определения направления звонка. 1 - по тел. Номерам, 2 - по тел. Номерам с клонированием записи для локального звонка (между пользователями), по транкам |
| rad_stop_expired | tinyint | 1-запускать script_stop для зависших сессий, 0 - не запускать (просто удаляются из sessionsradius). |
| failed_calls | tinyint | Для агентов телефонии: сохранять в первичных данных CDR по неуспешным звонкам и звонкам с нулевой длит. (1-да, 0-нет). |
