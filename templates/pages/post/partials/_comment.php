<div class="container mt-3">
    <div class="d-flex justify-content-center row">
        <div class="col-12">

            <form class="bg-light p-2" id="comment-form">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email <span class="require">*</span></label>
                            <div class="col-sm-9">
                            <input typepost="email" class="form-control" id="email" placeholder="Votre adresse email">
                            <small id="emailHelp" class="form-text text-muted"><?= EMAIL_INFO; ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Pseudo <span class="require">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" placeholder="Votre pseudo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content">Votre commentaire <span class="require">*</span></label>
                            <textarea class="form-control" id="content" rows="3"></textarea>
                        </div>
                        <div class="mt-2 text-right"><input class="btn btn-primary btn-sm shadow-none p-2" type="submit" value="Publier"></div>                
            </form>

            <?php if (!empty($comments)): ?>
                <div class="d-flex flex-column comment-section">
                    <?php foreach ($comments as $comment): ?>
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="50">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold comment-name"><?= $comment->getUsername(); ?></span><span class="comment-date text-black-50">Partagé le <?= $comment->getFormattedDate($comment->getCreatedAt()); ?></span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>