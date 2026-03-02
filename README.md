# Основы работы с Docker

### Основная задача
Обернуть приложение в docker-образ и запушить его на Dockerhub
1. Docker
  1.1. Установить Docker себе на локальную машину
  1.2. Описать инфраструктуру в Docker-compose, которая включает в себя
  1.2.1. nginx (обрабатывает статику, пробрасывает выполнение скриптов в fpm)
  1.2.2. php-fpm (соединяется с nginx через tcp-порт)
  1.2.3. redis (соединяется с php по порту)
  1.2.4. memcached (соединяется с php по порту)
  1.2.5. БД соединяется по порту (не забудьте про директории с данными)
  1.3 (Со звездочкой) Можно установить Composer
  1.4 (Со звездочкой) Соединить FPM и Nginx через unix-сокет

------------

### Результат

------------
**Выполнить в терминале следующие команды (под ОС windows)**
 - composer create-project Jony2Good/laravel-docker
 - composer install
 - cp .env.example .env

**Запустить Docker, выполнив команду**
docker compose -f docker-compose.yaml -f docker-compose.dev.yaml up --build -d

**Чтобы направить запрос на endpoint /health:**
- Заходим через терминал в контейнер nginx командой: *docker exec OtusDocker-nginx sh*
- Находясь внутри контейнера, в терминале прописываем и выполняем команду: curl *http://localhost:8080/api/health*

Другой вариант:
- С помощью программ POSTMAN, Hoppscotch и д.р. направить запрос методом GET по маршруту http://127.0.0.1:8080/api/health