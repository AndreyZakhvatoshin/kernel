## Routes for News

API Маршруты для новостей

- get 'api/news' - Выводит список всех новостей
- get 'api/news/{id}' - Выводит одну конкретную новость

### Routes for admin

- get 'api/admin/news' - Выводит список всех новостей
- get 'api/admin/news/{id}' - Выводит одну конкретную новость
- post 'api/admin/news' - Добавление новости. Принимает поля title, body
- patch 'api/admin/news/{id}' - Обновление статуса новости. Принимает status

Для развертывания можно использовать Docker, используя команды make файла:
- make docker-build
- make docker-up
- make docker-down
