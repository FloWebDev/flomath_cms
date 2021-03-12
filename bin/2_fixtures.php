<?php

require __DIR__ . '/1_init_data.php';

$contentMock = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, quod. Quibusdam cum, nulla, labore modi enim dolorem odio aliquam illo quaerat blanditiis accusamus tempora soluta magnam maxime culpa quia voluptatum iste optio velit perferendis officiis? Minima nostrum ex non adipisci! Eaque minus architecto perspiciatis porro! In modi deleniti odit, saepe iusto quod dolores asperiores quis assumenda dolorem a architecto accusamus voluptatem cupiditate quasi dolor! Voluptatibus officia fuga aperiam voluptatem mollitia quam rem illo. Placeat aliquid quisquam nobis quo nemo, reiciendis dignissimos debitis neque cumque et sed commodi odio? Ex, aperiam! Quos assumenda id repellat saepe nisi, facilis iste aspernatur tenetur ipsa, quibusdam voluptatibus sint hic rerum, consequuntur tempore mollitia adipisci neque vero magni explicabo provident. Necessitatibus mollitia, cumque quae voluptas optio expedita deleniti consectetur atque eos totam libero maxime ipsam exercitationem quos quasi molestiae sequi ad tempora saepe quod, ullam error. Voluptatem ratione quaerat sed corrupti repellat fuga, delectus pariatur sequi necessitatibus, veniam voluptate vitae! Consequatur alias repellendus illo dolorum nisi iusto. Veniam fugiat sunt atque officia sed minus impedit doloremque, repellat sapiente magnam ut qui? At inventore quibusdam tenetur saepe consectetur, fugit exercitationem expedita eveniet ducimus molestias aspernatur voluptatum quasi eligendi voluptate reprehenderit consequatur beatae culpa velit veniam dolores id. Hic reprehenderit non, tenetur dicta sapiente in! Beatae quia officia cum aliquam! Aliquam, iure? Aut quis quas fugiat a similique amet illo quia sunt odio, reiciendis beatae quisquam neque debitis quam est, obcaecati maxime voluptatum velit praesentium voluptates earum ullam? Debitis reiciendis natus vel explicabo ut iusto nesciunt voluptatum iure ex quia soluta itaque excepturi optio sunt esse quisquam quis voluptates incidunt, a praesentium hic earum doloremque. Praesentium distinctio quis a consectetur aut sint commodi ex fugiat, adipisci ducimus odio odit cumque repellendus eveniet doloremque mollitia error impedit numquam esse officiis eos deserunt recusandae. Cumque ab recusandae soluta accusamus eius hic quasi similique, quidem tempora accusantium nesciunt veritatis blanditiis distinctio explicabo neque cupiditate, repellendus magni deleniti modi consectetur vel iure adipisci autem amet. Illum voluptatibus modi velit eius consequuntur dicta recusandae optio ratione corporis cupiditate quasi unde voluptatem repellat, excepturi, quisquam temporibus nobis facilis magnam? Iste et sequi dolor sapiente itaque, deserunt eum rem facere ipsa, suscipit asperiores quis animi. Doloremque cum iste quo omnis repudiandae asperiores, esse, tenetur officiis culpa ut dolores. Aperiam, ipsum corporis? Eius aut tenetur culpa iusto facere odit voluptatem eaque perferendis. Quo enim ad ipsa expedita nulla. Reprehenderit dolor numquam iure eos corporis illo repellat, ducimus sit enim assumenda laboriosam repellendus delectus facere soluta sint porro itaque earum autem eius impedit saepe, beatae officia architecto provident. Praesentium alias odit ducimus quis veniam, nam ab quae vero maiores, iure magni distinctio omnis reprehenderit minus voluptatum necessitatibus enim numquam blanditiis error quam facere! Fugiat sed ducimus modi voluptas a doloremque mollitia sint alias facilis est expedita, nihil omnis vel ea? Sed ex, labore quos dignissimos numquam recusandae nam beatae iusto sint hic nobis quibusdam quo laborum eaque atque facilis, animi consequuntur cum blanditiis repudiandae. Reiciendis exercitationem deleniti quam, mollitia numquam in. Et eligendi animi libero a!';
$description = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus molestiae a, perspiciatis doloremque debitis veniam corrupti, explicabo, nisi quia quaerat ut ea nesciunt. Illum similique fugit perferendis consequuntur voluptates possimus tempora minima suscipit dolorum. Consequuntur delectus expedita nulla sapiente fugit?';
// Posts
$sql = "
INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 1, 'Article Exemple 1', '$contentMock', '$description', 'slug-article-1', '2021-01-01 12:00:57', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 1);

INSERT INTO post (id, title, content, slug, created_at, is_published, user_id)
SELECT 2, 'Article Exemple 2', '$contentMock', '$description', '2021-01-02 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 2);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 3, 'Article Exemple 3', '$contentMock', '$description', 'slug-article-3', '2021-01-03 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 3);

INSERT INTO post (id, title, content, slug, created_at, is_published, user_id)
SELECT 4, 'Article Exemple 4', '$contentMock', 'slug-article-4', '2021-01-04 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 4);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 5, 'Article Exemple 5', '$contentMock', '$description', 'slug-article-5', '2021-01-05 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 5);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 6, 'Article Exemple 6', '$contentMock', '$description', 'slug-article-6', '2021-01-06 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 6);

INSERT INTO post (id, title, content, description, slug, created_at, is_published, user_id)
SELECT 7, 'Article Exemple 7', '$contentMock', '$description', 'slug-article-7', '2021-01-07 12:00:17', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM post WHERE id = 7);
";

$pdo->exec($sql);

// Commentaires
$comment = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus ut, exercitationem hic ipsa itaque consequuntur sed quod ex veritatis aut quas quo veniam ullam voluptatem.';
$sql     = "
INSERT INTO comment (id, username, email, content, created_at, post_id)
SELECT 1, 'Utilisateur 1', 'test@test.com', '$comment', '2021-01-01 15:07:00', 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 1);

INSERT INTO comment (id, username, email, content, created_at, post_id)
SELECT 2, 'Utilisateur 2', 'test@test.com', '$comment', '2021-01-02 09:00:01', 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 2);

INSERT INTO comment (id, username, email, content, created_at, post_id)
SELECT 3, 'Utilisateur 1', 'test@test.com', '$comment', '2021-01-02 12:00:17', 7
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 3);

INSERT INTO comment (id, username, email, content, created_at, post_id)
SELECT 4, 'Utilisateur 1', 'test@test.com', '$comment', '2021-01-03 19:27:37', 6
WHERE NOT EXISTS (SELECT 1 FROM comment WHERE id = 4);

INSERT INTO comment (id, username, email, content, created_at, post_id)
SELECT 5, 'Utilisateur 1', 'test@test.com', '$comment', '2021-01-02 07:00:00', 5
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
