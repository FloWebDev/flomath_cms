<div class="container mt-3">
    <div class="d-flex justify-content-center row">
        <div class="col-12">

            <form class="bg-light p-2" id="comment-form" action="/post/<?= $post->getId() ?>/comment-create" method="POST">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email <span class="require">*</span></label>
                            <div class="col-sm-9">
                            <input typepost="email" class="form-control" id="email" placeholder="Votre adresse email" name="email">
                            <small id="emailHelp" class="form-text text-muted"><?= EMAIL_INFO; ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Pseudo <span class="require">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" placeholder="Votre pseudo" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content">Commentaire <span class="require">*</span></label>
                            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="captcha" class="col-sm-3 col-form-label">
                                <img src="data:image/png;base64, <?= $captcha ?>" class="img-fluid" alt="Responsive image">
                            </label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="captcha" name="captcha">
                            </div>
                        </div>
                        <div class="mt-2 text-right">                            
                            <input class="btn btn-primary btn-sm shadow-none p-2" type="submit" value="Publier">
                        </div>                
            </form>

            <div id="container-comment-flash-messages" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <div id="comment-flash-messages">
            </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php if (!empty($comments)): ?>
                <div class="d-flex flex-column comment-section">
                    <?php foreach ($comments as $comment): ?>
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="<?= getGravatar($comment->getEmail()); ?>" width="50">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold comment-name"><?= $comment->getUsername(); ?></span><span class="comment-date text-black-50">Partagé le <?= $comment->getFormattedDate($comment->getCreatedAt()); ?></span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text"><?= nl2br($comment->getContent()); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>