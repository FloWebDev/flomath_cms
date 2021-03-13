<?php

namespace App\Controller\FrontController;

use DateTime;
use App\Model\Post;
use App\Model\Comment;
use Core\CaptchaService;
use Core\CoreController;

class CommentController extends CoreController
{
    public function create(int $idPost)
    {
        $error = [];

        $post = new Post();
        $post = $post->findById($idPost);

        // Handle form
        $postId = $post ? $post->getId() : null;
        if (is_null($postId)) {
            $error[] = 'Référence manquante ou introuvable';
        }
        $email = !empty(trim($_POST['email'])) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : null;
        if (!$email) {
            $error[] = 'Adresse email manquante ou erronée';
        }
        $username = !empty(trim($_POST['username'])) ? trim($_POST['username']) : null;
        if (!$username || strlen($username) > 40) {
            $error[] = 'Pseudo manquant ou comportant trop de caractères';
        }
        $content = !empty(trim($_POST['content'])) ? trim($_POST['content']) : null;
        if (!$content || strlen($content) > 10000) {
            $error[] = 'Commentaire manquant ou comportant trop de caractères';
        }
        $captcha = !empty($_POST['username']) ? CaptchaService::check(intval($_POST['captcha'])) : false;
        if (!$captcha) {
            $error[] = 'Captcha incorrect';
        }

        if (!empty($error)) {
            self::json400Render($error);
        }

        $comment = new Comment();
        $comment->setEmail($email);
        $comment->setUsername($username);
        $comment->setContent($content);
        $comment->setPostId($postId);
        $comment->save();

        self::json201Render(['code' => 201, 'success' => true, 'message' => 'Commentaire créé avec succès']);
    }
}
