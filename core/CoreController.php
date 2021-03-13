<?php
namespace Core;

abstract class CoreController
{
    private array $params = array();

    protected function assign($key, $value)
    {
        $this->params[$key] = $value;
    }
    
    /**
     * Render view template with params
     */
    protected function render(string $namePage)
    {
        foreach ($this->params as $key => $value) {
            $$key = $value;
        }
        require __DIR__ . '/../templates/header.php';
        require __DIR__ . '/../templates/' . $namePage . '.php';
        require __DIR__ . '/../templates/footer.php';
    }

    /**
     * Render 404 view template
     */
    protected static function view404Render()
    {
        header('HTTP/1.0 404 Not Found');
        $string = "<p>Erreur 404 - La ressource demandée n'existe pas ou a été déplacée</p>";
        $string .= "<p><a href=' / '>Retour à la page d'accueil</a></p>";
        echo $string;
        exit;
    }

    /**
     * Render json for HTTP 200 OK
     */
    protected static function json200Render(array $data)
    {
        header('HTTP/1.0 200 OK');
        header('Content-type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Render json for HTTP 201 Created
     */
    protected static function json201Render(array $data)
    {
        header('HTTP/1.0 201 Created');
        header('Content-type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Render json for HTTP 400 Bad Request
     */
    protected static function json400Render(array $data)
    {
        header('HTTP/1.0 400 Bad Request');
        header('Content-type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Render json for HTTP 404 Not Found
     */
    protected static function json404Render(array $data)
    {
        header('HTTP/1.0 400 Not Found');
        header('Content-type: application/json');
        echo json_encode($data);
        exit;
    }
}
