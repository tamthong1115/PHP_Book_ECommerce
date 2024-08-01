<?php
namespace Core;

class Controller
{
    protected $model;

    public function loadModel($model)
    {
        $modelClass = 'Models\\' . $model;
        $this->model = new $modelClass();
    }

    public function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . '/../Views/' . $view . '.php';
    }

    public function redirect($url)
    {
        header('Location: ' . base_url($url));

        exit();
    }
}

