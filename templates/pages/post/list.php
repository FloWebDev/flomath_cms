
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php if (!empty($posts)): ?>
          <?php foreach ($posts as $index => $post): ?>
            <div class="post-preview">
              <a href="post/<?= $post->getId(); ?>/<?= h($post->getSlug()); ?>">
              <!-- Title -->
                <h2 class="post-title">
                  <?= h($post->getTitle()); ?>
                </h2>

                <!-- Description -->
                <?php if (!empty($post->getDescription())): ?>
                <h3 class="post-subtitle mt-4 mb-5">
                  <?= h($post->getDescription()); ?>
                </h3>
                <?php endif; ?>
              </a>

              <!-- Info -->
              <p class="post-meta mb-2"><span class="badge badge-secondary"><?= h($post->getCommentsCount()); ?> 
                <?= handlePluralWithS('commentaire', intval($post->getCommentsCount())); ?></span> Publié par
                <a href="#"><?= h($post->getUser()->getUsername()); ?></a>
                le <?= h($post->getFormattedDate($post->getCreatedAt())); ?>
              </p>

              <!-- Catégories, tags et vues -->
              <?php require __DIR__ . '/partials/_category_tag_view.php' ?>
              

            </div>
            <hr>
            <?php endforeach; ?>
            <!-- Pager -->
            <?= $paginatorTemplate; ?>
        <?php else: ?>
          <div class="post-preview">
            Aucun élément à afficher.
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
