<?php
/**
 * @link https://www.sqlitetutorial.net/sqlite-create-table/
 */
require __DIR__ . '/../core/SPDO.php';
$pdo = \Core\SPDO::getPDO();
$sql = "
CREATE TABLE IF NOT EXISTS app_user (
	id INTEGER PRIMARY KEY,
	login TEXT NOT NULL UNIQUE,
	email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS post (
	id INTEGER PRIMARY KEY,
	title TEXT NOT NULL,
   content TEXT NOT NULL,
   description TEXT NOT NULL,
   slug TEXT NOT NULL,
   meta_description TEXT,
   meta_keywords TEXT,
   created_at TEXT NOT NULL,
   updated_at TEXT,
   published_at TEXT,
   user_id INTEGER,
   FOREIGN KEY (user_id) 
        REFERENCES app_user (id) 
        ON DELETE CASCADE 
        ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS category (
	id INTEGER PRIMARY KEY,
	name TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS post_category (
    post_id INTEGER,
    category_id INTEGER,
    PRIMARY KEY (post_id, category_id),
    FOREIGN KEY (post_id) 
       REFERENCES post (id) 
          ON DELETE CASCADE 
          ON UPDATE NO ACTION,
    FOREIGN KEY (category_id) 
       REFERENCES category (id) 
          ON DELETE CASCADE 
          ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS tag (
	id INTEGER PRIMARY KEY,
	name TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS post_tag (
    post_id INTEGER,
    tag_id INTEGER,
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) 
       REFERENCES post (id) 
          ON DELETE CASCADE 
          ON UPDATE NO ACTION,
    FOREIGN KEY (tag_id) 
       REFERENCES tag (id) 
          ON DELETE CASCADE 
          ON UPDATE NO ACTION
);

";
$pdo->exec($sql);

// Users
$sql = "
INSERT INTO app_user (id, login, email, password)
SELECT 1, 'admin', 'admin@admin.com', 'djshjdhfkjqhf'
WHERE NOT EXISTS (SELECT 1 FROM app_user WHERE id = 1);

INSERT INTO app_user (id, login, email, password)
SELECT 2, 'test', 'test@test.com', 'djshjdhfkjqhf'
WHERE NOT EXISTS (SELECT 1 FROM app_user WHERE id = 2);
";
$pdo->exec($sql);

// Posts
$sql = "
INSERT INTO post (id, title, content, description, slug, created_at, user_id)
SELECT 1, 'Article Exemple 1', 'Voici le contenu du premier article.', 'Description 1', 'slug-article-1', '2021-01-01 12:00:57', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 1);

INSERT INTO post (id, title, content, description, slug, created_at, user_id)
SELECT 2, 'Article Exemple 2', 'Voici le contenu du second article.', 'Description 2', 'slug-article-2', '2021-01-02 12:00:17', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 2);

INSERT INTO post (id, title, content, description, slug, created_at, user_id)
SELECT 3, 'Article Exemple 3', 'Voici le contenu du troisième article.', 'Description 3', 'slug-article-3', '2021-01-03 12:00:17', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 3);

INSERT INTO post (id, title, content, description, slug, created_at, user_id)
SELECT 4, 'Article Exemple 4', 'Voici le contenu du quatrième article.', 'Description 4', 'slug-article-4', '2021-01-04 12:00:17', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 4);

INSERT INTO post (id, title, content, description, slug, created_at, user_id)
SELECT 5, 'Article Exemple 5', 'Voici le contenu du cinquième article.', 'Description 5', 'slug-article-5', '2021-01-05 12:00:17', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 5);

INSERT INTO post (id, title, content, description, slug, created_at, user_id)
SELECT 6, 'Article Exemple 6', 'Voici le contenu du sixième article.', 'Description 6', 'slug-article-6', '2021-01-06 12:00:17', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 6);

INSERT INTO post (id, title, content, description, slug, created_at, user_id)
SELECT 7, 'Article Exemple 7', 'Voici le contenu du septième article.', 'Description 7', 'slug-article-7', '2021-01-07 12:00:17', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 7);
";
$pdo->exec($sql);

// Categories
$sql = "
INSERT INTO category (id, name)
SELECT 1, 'Développement Web'
WHERE NOT EXISTS (SELECT 1 FROM category WHERE id = 1);

INSERT INTO category (id, name)
SELECT 2, 'Internet'
WHERE NOT EXISTS (SELECT 1 FROM category WHERE id = 2);

INSERT INTO category (id, name)
SELECT 3, 'Poker'
WHERE NOT EXISTS (SELECT 1 FROM category WHERE id = 3);
";
$pdo->exec($sql);

// Post/Category
$sql = "
INSERT INTO post_category (post_id, category_id)
VALUES (1, 1);

INSERT INTO post_category (post_id, category_id)
VALUES (2, 1);

INSERT INTO post_category (post_id, category_id)
VALUES (3, 1);

INSERT INTO post_category (post_id, category_id)
VALUES (4, 1);

INSERT INTO post_category (post_id, category_id)
VALUES (4, 2);

INSERT INTO post_category (post_id, category_id)
VALUES (5, 3);

INSERT INTO post_category (post_id, category_id)
VALUES (6, 1);

INSERT INTO post_category (post_id, category_id)
VALUES (7, 2);
";

// Tags
$sql = "
INSERT INTO tag (id, name)
SELECT 1, 'HTML'
WHERE NOT EXISTS (SELECT 1 FROM tag WHERE id = 1);

INSERT INTO tag (id, name)
SELECT 2, 'CSS'
WHERE NOT EXISTS (SELECT 1 FROM tag WHERE id = 2);

INSERT INTO tag (id, name)
SELECT 3, 'PHP'
WHERE NOT EXISTS (SELECT 1 FROM tag WHERE id = 3);

INSERT INTO tag (id, name)
SELECT 4, 'JS'
WHERE NOT EXISTS (SELECT 1 FROM tag WHERE id = 4);

INSERT INTO tag (id, name)
SELECT 5, 'SQL'
WHERE NOT EXISTS (SELECT 1 FROM tag WHERE id = 5);
";
$pdo->exec($sql);

// Post/Tag
$sql = "
INSERT INTO post_tag (post_id, tag_id) 
VALUES (1, 1);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (1, 2);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (3, 4);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (4, 5);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (4, 3);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (5, 2);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (5, 3);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (5, 5);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (6, 2);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (7, 3);

INSERT INTO post_tag (post_id, tag_id) 
VALUES (7, 5);
";
$pdo->exec($sql);
