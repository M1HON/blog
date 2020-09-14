<?php

namespace App\Components;

class Templates
{

  public $layout = 'default';



  public function render($url, array $data = [])
  {

    $path =  VIEWS_URL . $url . '.php';

    if (file_exists($path)) {
      $content = '';
      ob_start();
      require_once $path;
      $content = ob_get_clean();
    }
    require_once VIEWS_URL . 'layouts/' . $this->layout . '.php';
  }
  public function insert($layout, array $data = [])
  {
    require_once(VIEWS_URL . 'inc/' . $layout . '.php');
  }

  public function redirect($url)
  {
    header('location: /' . $url);
    exit;
  }
}
