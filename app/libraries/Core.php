<?php
/*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    //print_r($this->getUrl());

    $url = $this->getUrl();

    // Look in BLL for first value [notice:null!!]
    if (@file_exists('../app/controllers/' . ucwords($url['path'][0]) . '.php')) {
      // If exists, set as controller
      $this->currentController = ucwords($url['path'][0]);
      // Unset 0 Index
      unset($url['path'][0]);
    }

    // Require the controller
    require_once '../app/controllers/' . $this->currentController . '.php';

    // Instantiate controller class
    $this->currentController = new $this->currentController;

    // Check for second part of url
    if (isset($url['path'][1])) {

      // Check to see if method exists in controller
      if (method_exists($this->currentController, $url['path'][1])) {
        $this->currentMethod = $url['path'][1];
        // Unset 1 index
        unset($url['path'][1]);
      }
    }

    // Get params
    $this->params = $url['query'];

    // Call a callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl(): array
  {
    if (isset($_SERVER['REQUEST_URI'])) {
      $url = parse_url($_SERVER['REQUEST_URI']);

      $path = explode('/', $url['path']);

      unset($path[0]);

      parse_str($url['query'], $query);

      return [
        'path' => array_values($path),
        'query' => $query,
      ];
    }
  }
}
