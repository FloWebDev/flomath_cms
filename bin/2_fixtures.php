<?php

require __DIR__ . '/1_init_data.php';

// Posts
$sql = "
INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 1, 'Article Exemple 1', 'Voici le contenu du premier article.', 'Description 1', 'slug-article-1', '2021-01-01 12:00:57', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 1);

INSERT INTO post (id, title, content, slug, created_at, is_published, user_id)
SELECT 2, 'Article Exemple 2', 'Voici le contenu du second article.', 'slug-article-2', '2021-01-02 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 2);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 3, 'Article Exemple 3', 'Voici le contenu du troisième article.', 'Description 3', 'slug-article-3', '2021-01-03 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 3);

INSERT INTO post (id, title, content, slug, created_at, is_published, user_id)
SELECT 4, 'Article Exemple 4', 'Voici le contenu du quatrième article.', 'slug-article-4', '2021-01-04 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 4);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 5, 'Article Exemple 5', 'Voici le contenu du cinquième article.', 'Description 5', 'slug-article-5', '2021-01-05 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 5);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 6, 'Article Exemple 6', 'Voici le contenu du sixième article.', 'Description 6', 'slug-article-6', '2021-01-06 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 6);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 7, 'Article Exemple 7', 'Voici le contenu du septième article.', 'Description 7', 'slug-article-7', '2021-01-07 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 7);
";

$pdo->exec($sql);

// Commentaires
$sql = "
INSERT INTO comment (id, username, email, content, created_at, thread, post_id)
SELECT 1, 'Utilisateur 1', 'test@test.com', 'Commentaire 1', '2021-01-01 15:07:00', 1, 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 1);

INSERT INTO comment (id, username, email, content, created_at, thread, post_id)
SELECT 2, 'Utilisateur 2', 'test@test.com', 'Réponse 1 au commentaire 1', '2021-01-02 09:00:01', 1, 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 2);

INSERT INTO comment (id, username, email, content, created_at, thread, post_id)
SELECT 3, 'Utilisateur 1', 'test@test.com', 'Réponse 2 au commentaire 1', '2021-01-02 12:00:17', 1, 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 3);

INSERT INTO comment (id, username, email, content, created_at, thread, post_id)
SELECT 4, 'Utilisateur 1', 'test@test.com', 'Réponse 3 au commentaire 1', '2021-01-03 19:27:37', 1, 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 4);

INSERT INTO comment (id, username, email, content, created_at, thread, post_id)
SELECT 5, 'Utilisateur 1', 'test@test.com', 'Commentaire 2', '2021-01-02 07:00:00', 1, 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 5);
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
SELECT 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 1 AND category_id = 1);

INSERT INTO post_category (post_id, category_id)
SELECT 2, 1
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 2 AND category_id = 1);

INSERT INTO post_category (post_id, category_id)
SELECT 3, 1
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 3 AND category_id = 1);

INSERT INTO post_category (post_id, category_id)
SELECT 4, 1
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 4 AND category_id = 1);

INSERT INTO post_category (post_id, category_id)
SELECT 4, 2
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 4 AND category_id = 2);

INSERT INTO post_category (post_id, category_id)
SELECT 5, 3
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 5 AND category_id = 3);

INSERT INTO post_category (post_id, category_id)
SELECT 6, 1
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 6 AND category_id = 1);

INSERT INTO post_category (post_id, category_id)
SELECT 7, 2
WHERE NOT EXISTS (SELECT 1 FROM post_category WHERE post_id = 7 AND category_id = 2);
";

$pdo->exec($sql);

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
SELECT 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 1 AND tag_id = 1);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 1, 2
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 1 AND tag_id = 2);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 3, 4
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 3 AND tag_id = 4);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 4, 5
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 4 AND tag_id = 5);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 4, 3
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 4 AND tag_id = 3);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 5, 2
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 5 AND tag_id = 2);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 5, 3
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 5 AND tag_id = 3);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 5, 5
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 5 AND tag_id = 5);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 6, 2
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 6 AND tag_id = 2);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 7, 3
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 7 AND tag_id = 3);

INSERT INTO post_tag (post_id, tag_id) 
SELECT 7, 5
WHERE NOT EXISTS (SELECT 1 FROM post_tag WHERE post_id = 7 AND tag_id = 5);
";

$pdo->exec($sql);
