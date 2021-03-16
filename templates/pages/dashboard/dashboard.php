  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1>Tableau de bord</h1>
        
        <?php if (!empty($posts)): ?>
        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Vues</th>
              <th scope="col">Titre</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($posts as $i => $post): ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td class="text-right"><?= h($post['nb_views']); ?></td>
              <td class="text-left"><a href="/post/<?=h($post['id'])?>/<?=h($post['slug'])?>"><?= h($post['title']); ?></a></td>
              <td class="text-right"><?= h(getFormattedDate($post['created_at'])); ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>

      </div>
    </div>
  </div>