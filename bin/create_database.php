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

";
$pdo->exec($sql);

$sql = "
INSERT INTO app_user (id, login, email, password)
SELECT 1, 'admin', 'admin@admin.com', 'djshjdhfkjqhf'
WHERE NOT EXISTS (SELECT 1 FROM app_user WHERE id = 1);

INSERT INTO app_user (id, login, email, password)
SELECT 2, 'test', 'test@test.com', 'djshjdhfkjqhf'
WHERE NOT EXISTS (SELECT 1 FROM app_user WHERE id = 2);

INSERT INTO post (id, title, content, user_id)
SELECT 1, 'Article Exemple 1', 'Voici le premier article.', 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 1);

INSERT INTO category (id, name)
SELECT 1, 'Développement Web'
WHERE NOT EXISTS (SELECT 1 FROM category WHERE id = 1);

INSERT INTO category (id, name)
SELECT 2, 'PHP'
WHERE NOT EXISTS (SELECT 1 FROM category WHERE id = 2);

INSERT INTO post_category (post_id, category_id)
VALUES (1, 1);
";
$pdo->exec($sql);
