<?php

namespace App\Controller\FrontController;

use App\Model\Comment;
use Core\CoreController;
use DateTime;

class CommentController extends CoreController
{
    public function create()
    {
        $error = [];
        $email = !empty(trim($_POST['email'])) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : null;
        if (is_null($email)) {
            $error[] = 'Adresse email manquante ou erronée';
        }
        $username = !empty(trim($_POST['username'])) ? trim($_POST['username']) : null;
        if (is_null($username) || strlen($username) > 40) {
            $error[] = 'Pseudo manquant ou comportant trop de caractères';
        }
        $content = !empty(trim($_POST['content'])) ? trim($_POST['content']) : null;
        if (is_null($content) || strlen($content) > 10000) {
            $error[] = 'Commentaire manquant ou comportant trop de caractères';
        }
        $postId = !empty($_POST['postId']) ? intval($_POST['postId']) : null;
        if (is_null($postId)) {
            $error[] = 'Référence au post manquante';
        }

        if (!empty($error)) {
            header("HTTP/1.0 404 Bad Request");
            header('Content-type: application/json');
            echo json_encode($error);
            exit;
        }
        $comment = new Comment();
        $comment->setEmail($email);
        $comment->setUsername($username);
        $comment->setContent($content);
        $comment->setPostId($postId);
        $comment->save();

        header("HTTP/1.0 201 Created");
        header('Content-type: application/json');
        echo json_encode(['code' => 201, 'success' => true, 'message' => 'Commentaire créé avec succès']);
        exit;
    }
}
