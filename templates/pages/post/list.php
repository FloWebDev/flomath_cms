
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach ($posts as $index => $post): ?>
        <div class="post-preview">
          <a href="post/<?= $post->getId(); ?>/<?= $post->getSlug(); ?>">
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
          <p class="post-meta mb-2"><span class="badge badge-secondary"><?= $commentCount[$post->getId()]; ?> 
            <?= handlePluralWithS('commentaire', $commentCount[$post->getId()]); ?></span> Publié par
            <a href="#"><?= $post->getUser()->getUsername(); ?></a>
            Le <?= $post->getFormatedCreatedAt() ?>
          </p>

          <?php if (!empty($categories[$post->getId()]) || !empty($tags[$post->getId()])): ?>
          <p class="category-tag my-1"> 
            <?php if (!empty($categories[$post->getId()])): ?>
              <?php foreach ($categories[$post->getId()] as $category): ?>
                <a href="category/<?= $category->getId(); ?>" class="badge badge-dark"><?= $category->getName(); ?></a>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($tags[$post->getId()])): ?>
              <?php foreach ($tags[$post->getId()] as $tag): ?>
                <a href="tag/<?= $tag->getId(); ?>" class="badge badge-light"><?= $tag->getName(); ?></a>
              <?php endforeach; ?>
            <?php endif; ?>
          </p>
          <?php endif; ?>

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
