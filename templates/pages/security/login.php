  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Formulaire de connexion</p>
        
        <!-- Flash messages -->
        <?php if (!empty($error)): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $error; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <!-- Login form -->
        <form action="" method="POST">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="username">Identifiant</label>
              <input type="text" class="form-control" placeholder="Identifiant" id="username" name="username">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="password">Mot de passe</label>
              <input type="text" class="form-control" placeholder="Mot de passe" id="password" name="password">
            </div>
          </div>
          <br>
          <div id="success"></div>
          <input type="submit" class="btn btn-primary" value="Valider">
        </form>
      </div>
    </div>
  </div>