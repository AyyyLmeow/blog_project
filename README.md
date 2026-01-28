## Запуск проекта

## 1. Клонировать репозиторий

git clone https://github.com/AyyyLmeow/blog_project.git
cd blog_project

## 2. Установка зависимостей

composer install

## 3. Подготовка SCSS стилей 

sass assets/scss/main.scss public/css/style.css

## 4. Сборка проекта

docker compose up --build -d

## 5. Открытие в браузере

Проект будет доступен по адресу http://localhost:8081/

## 6. Перезапуск проекта (опционально)

docker compose down -v
docker compose up --build -d

## 7. Подключение к базе данных (опционально)

docker exec -it blog_mysql mysql -uroot -proot blog

## 8. Автоматическая компиляция SCSS стилей при изменениях (опционально)

sass --watch assets/scss/main.scss:public/css/style.css
