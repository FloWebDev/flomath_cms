<div class="row col-12 category-tag my-1">
    <div class="col-sm-10 p-0">
        <?php if (!empty($post->getCategories())): ?>
            <?php foreach ($post->getCategories() as $category): ?>
            <a href="/category/<?= intval($category->getId()); ?>/<?= h($category->getSlug()); ?>" class="badge badge-dark"><?= h($category->getName()); ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!empty($post->getTags())): ?>
            <?php foreach ($post->getTags() as $tag): ?>
            <a href="/tag/<?= intval($tag->getId()); ?>/<?= h($tag->getSlug()); ?>" class="badge badge-light"><?= h($tag->getName()); ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="col-sm-2 p-0">
        Vues <span class="badge badge-light"><?= intval($post->getNbViews()); ?></span>
    </div>
</div>