#№ Запуск проекта

## 1. Клонировать репозиторий

git clone https://github.com/AyyyLmeow/blog_project.git
cd blog_project

## 2. Установка зависимостей

composer install

## 3. Подготовка SCSS стилей 

sass assets/scss/main.scss public/css/style.css

## 4. Сборка проекта

docker compose up --build -d

## 5. Перезапуск проекта (опционально)

docker compose down -v
docker compose up --build -d

## 6. Подключение к базе данных (опционально)

docker exec -it blog_mysql mysql -uroot -proot blog

## 7. Автоматическая компиляция SCSS стилей при изменениях (опционально)

sass --watch assets/scss/main.scss:public/css/style.css
