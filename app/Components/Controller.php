<?php

namespace App\Components;

use App\Components\Templates;

abstract class Controller
{

    public $templates;
    public $model;
    public $data;
    public $acl;

    public function __construct($params)
    {
        $this->templates = new Templates();
        $this->check_Acl($params);
        $model_name = $params['controller'];
        $this->data = $params['data'];
        $this->model = $this->load_model($model_name);
    }

    public function load_model($model_name)
    {
        $path = 'App\Models\\' . ucfirst($model_name);
        if (class_exists($path)) {

            return new $path;
        }
    }

    public function check_Acl($params)
    {

        $this->acl = require 'app/acl/' . $params['controller'] . '.php';
        if ($this->is_Acl('all', $params)) {
            return true;
        } elseif (isset($_SESSION['admin']) and $this->is_Acl('admin', $params)) {
            return true;
        }
        else{
            $this->templates->redirect('');
        }
        return false;
    }

    public function is_Acl($key, $params)
    {
        return in_array($params['action'], $this->acl[$key]);
    }
}
