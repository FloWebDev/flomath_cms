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
     *Render view template with params
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
}
