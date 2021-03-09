
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($posts as $index => $post): ?>
        <div class="post-preview">
          <a href="post.html">
          <!-- Title -->
            <h2 class="post-title">
              <?= $post->getTitle(); ?>
            </h2>

            <!-- Description -->
            <?php if (!empty($post->getDescription())): ?>
            <h3 class="post-subtitle">
              <?= $post->getDescription(); ?>
            </h3>
            <?php endif; ?>
          </a>

          <!-- Info -->
          <p class="post-meta">Publié par
            <a href="#"><?= $post->getUser()->getUsername(); ?></a>
            Le <?= $post->getFormatedCreatedAt() ?>
            </p>
        </div>
        <hr>
        <?php endforeach; ?>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
