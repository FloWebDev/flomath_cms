
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <h1 class="section-heading mt-0"><?= $post->getTitle(); ?></h1>

          <p><?= nl2br($post->getContent()); ?></p>

          <hr>

          <?php if (!empty($categories) || !empty($tags)): ?>
          <p class="category-tag my-1"> 
            <?php if (!empty($categories)): ?>
              <?php foreach ($categories as $category): ?>
                <a href="category/<?= $category->getId(); ?>" class="badge badge-dark"><?= $category->getName(); ?></a>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($tags)): ?>
              <?php foreach ($tags as $tag): ?>
                <a href="tag/<?= $tag->getId(); ?>" class="badge badge-light"><?= $tag->getName(); ?></a>
              <?php endforeach; ?>
            <?php endif; ?>
          </p>
          <?php endif; ?>

          <hr>

          <!-- Section auteur -->
          <div class="row">
            <div class="col-3 align-self-center">
                <?= $avatar; ?>
            </div>
            <div class="col-9 card-body">
                <h5 class="card-title"><?= $post->getUser()->getUsername(); ?></h5>
                <p class="card-text"><?= $post->getUser()->getBio(); ?></p>
            </div>
        </div>

        </div>
      </div>
    </div>
  </article>