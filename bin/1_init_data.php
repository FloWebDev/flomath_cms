<?php
/**
 * @link https://www.sqlitetutorial.net/sqlite-create-table/
 */
if (file_exists(__DIR__ . '/../config.php')) {
    require __DIR__ . '/../config.php';
} else {
    require __DIR__ . '/../config-sample.php';
}
require __DIR__ . '/../core/SPDO.php';
$pdo = \Core\SPDO::getPDO();
$sql = "
CREATE TABLE IF NOT EXISTS role (
	id INTEGER PRIMARY KEY,
	code TEXT NOT NULL UNIQUE,
	name TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS app_user (
	id INTEGER PRIMARY KEY,
	username TEXT NOT NULL UNIQUE,
	email TEXT NOT NULL UNIQUE,
   password TEXT NOT NULL,
   bio TEXT,
   role_id INTEGER,
   FOREIGN KEY (role_id) 
         REFERENCES role (id) 
         ON DELETE RESTRICT 
         ON UPDATE RESTRICT
);

CREATE TABLE IF NOT EXISTS post (
	id INTEGER PRIMARY KEY,
	title TEXT NOT NULL,
   content TEXT NOT NULL,
   description TEXT,
   slug TEXT NOT NULL,
   meta_description TEXT,
   meta_keywords TEXT,
   created_at TEXT NOT NULL,
   is_published INTEGER DEFAULT 0,
   nb_views INTEGER DEFAULT 0,
   user_id INTEGER,
   FOREIGN KEY (user_id) 
        REFERENCES app_user (id) 
        ON DELETE RESTRICT 
        ON UPDATE RESTRICT
);

CREATE TABLE IF NOT EXISTS comment (
	id INTEGER PRIMARY KEY,
   username TEXT NOT NULL,
   email TEXT,
   content TEXT NOT NULL,
   created_at TEXT,
   post_id INTEGER,
   FOREIGN KEY (post_id) 
        REFERENCES post (id) 
        ON DELETE RESTRICT 
        ON UPDATE RESTRICT
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
          ON DELETE RESTRICT 
          ON UPDATE RESTRICT,
    FOREIGN KEY (category_id) 
       REFERENCES category (id) 
          ON DELETE RESTRICT 
          ON UPDATE RESTRICT
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
          ON DELETE RESTRICT 
          ON UPDATE RESTRICT,
    FOREIGN KEY (tag_id) 
       REFERENCES tag (id) 
          ON DELETE RESTRICT 
          ON UPDATE RESTRICT
);

";
$pdo->exec($sql);

// Users et Rôles
$bio = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quisquam laboriosam repellat neque quis nam! Itaque quisquam consequatur eveniet minus?";
$sql = "
INSERT INTO role (id, code, name)
SELECT 1, 'ROLE_ADMIN', 'administrateur'
WHERE NOT EXISTS (SELECT 1 FROM role WHERE id = 1);

INSERT INTO role (id, code, name)
SELECT 2, 'ROLE_USER', 'utilisateur'
WHERE NOT EXISTS (SELECT 1 FROM role WHERE id = 2);

INSERT INTO app_user (id, username, email, password, bio, role_id)
SELECT 1, 'admin', 'admin@admin.com', 'djshjdhfkddd12jqhf', '$bio', 1
WHERE NOT EXISTS (SELECT 1 FROM app_user WHERE id = 1);

INSERT INTO app_user (id, username, email, password, bio, role_id)
SELECT 2, 'user', 'user@user.com', 'djsh4643fsddskjqhf', '$bio', 2
WHERE NOT EXISTS (SELECT 1 FROM app_user WHERE id = 2);
";
$pdo->exec($sql);
