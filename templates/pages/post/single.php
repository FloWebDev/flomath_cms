
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <h1 class="section-heading mt-0 mb-5"><?= $post->getTitle(); ?></h1>

          <div class="mb-4"><?= nl2br($post->getContent()); ?></div>

          <hr>

          <!-- Catégories, tags et vues -->
          <?php require __DIR__ . '/partials/_category_tag_view.php' ?>

          <hr>

          <!-- Section auteur -->
          <div class="row" id="bio-author">
            <div class="col-2 align-self-center">
                <?= getGravatar($post->getUser()->getEmail(), 100, 'mp', 'g', true, ['title' => $post->getUser()->getUsername(), 'alt' => 'Avatar de ' . $post->getUser()->getUsername(), 'class' => 'card-img-top avatar']); ?>
            </div>
            <div class="col-10 card-body">
                <h5 class="card-title"><?= $post->getUser()->getUsername(); ?></h5>
                <p class="card-text"><?= $post->getUser()->getBio(); ?></p>
            </div>
        </div>

        <?php if (COMMENT_ACTIVATED): ?>
          <hr>
          <?php require __DIR__ . '/partials/_comment.php' ?>
        <?php endif; ?>

        </div>
      </div>
    </div>
  </article>