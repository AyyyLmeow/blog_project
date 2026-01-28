SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);


CREATE TABLE posts (
   id INT AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(255) NOT NULL,
   description TEXT,
   content TEXT,
   image VARCHAR(255),
   views INT DEFAULT 0,
   created_at DATETIME
);


CREATE TABLE post_category (
   post_id INT NOT NULL,
   category_id INT NOT NULL,
   PRIMARY KEY (post_id, category_id),
   FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
   FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO categories (name, description) VALUES
   ('PHP', 'Статьи о языке PHP, бэкенд-разработке и серверной логике'),
   ('Backend', 'Архитектура серверных приложений и базы данных'),
   ('Docker', 'Контейнеризация и работа с Docker окружением'),
   ('Frontend', 'Клиентская часть, UI и взаимодействие с пользователем');

INSERT INTO posts (title, description, content, image, views, created_at) VALUES
  ('Getting started with PHP', 'Intro to PHP',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
   'placeholder.jpg', 15, NOW() - INTERVAL 10 DAY),

  ('Understanding Arrays in PHP', 'Working with arrays',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
   'placeholder.jpg', 32, NOW() - INTERVAL 9 DAY),

  ('Building MVC from scratch', 'How MVC works',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure dolor in reprehenderit in voluptate velit esse.',
   'placeholder.jpg', 48, NOW() - INTERVAL 8 DAY),

  ('Docker for beginners', 'How Docker works',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Excepteur sint occaecat cupidatat non proident.',
   'placeholder.jpg', 27, NOW() - INTERVAL 7 DAY),

  ('Docker Compose Deep Dive', 'Multi-container apps',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.',
   'placeholder.jpg', 66, NOW() - INTERVAL 6 DAY),

  ('REST API Best Practices', 'Designing good APIs',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nemo enim ipsam voluptatem quia voluptas sit aspernatur.',
   'placeholder.jpg', 54, NOW() - INTERVAL 5 DAY),

  ('Working with Databases in PHP', 'PDO and MySQL',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.',
   'placeholder.jpg', 21, NOW() - INTERVAL 4 DAY),

  ('Why MVC matters', 'Architecture basics',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse.',
   'placeholder.jpg', 39, NOW() - INTERVAL 3 DAY),

  ('Intro to Frontend Performance', 'Speeding up UI',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. At vero eos et accusamus et iusto odio dignissimos ducimus.',
   'placeholder.jpg', 18, NOW() - INTERVAL 2 DAY),

  ('Using Smarty Templates', 'Separation of logic and view',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Temporibus autem quibusdam et aut officiis debitis aut rerum.',
   'placeholder.jpg', 25, NOW() - INTERVAL 1 DAY),

  ('Deploying PHP with Docker', 'Production setup',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque earum rerum hic tenetur a sapiente delectus.',
   'placeholder.jpg', 72, NOW()),

  ('Scaling Backend Applications', 'Handling high load',
   'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam libero tempore, cum soluta nobis est eligendi optio.',
   'placeholder.jpg', 90, NOW());

INSERT INTO post_category (post_id, category_id) VALUES
(1,1),(2,1),(3,1),(7,1),(10,1),

(3,2),(6,2),(7,2),(8,2),(12,2),

(4,3),(5,3),(11,3),

(9,4),(10,4);