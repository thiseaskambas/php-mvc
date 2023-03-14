<?php
/* 
App Core Class :
* Creates URL & loads main controller
* URL FORMAT : /controller/method/params
*/

class Core
{
   protected $currentController = 'Pages';
   protected $currentMethod = 'index';
   protected $params = [];

   public function __construct()
   {
      // print_r($this->getUrl());
      $url = $this->getUrl();
      //Look into controllers for first value
      if (!empty($url) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
         $this->currentController = ucwords($url[0]);
         unset($url[0]);
      }
      //require controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      //instantiate controller
      $this->currentController = new $this->currentController();
   }

   public function getUrl()
   {
      if (isset($_GET['url'])) {
         $url = rtrim($_GET['url'], '/');
         //The FILTER_SANITIZE_URL filter removes all illegal URL characters from a string.
         $url = filter_var($url, FILTER_SANITIZE_URL);
         $url = explode('/', $url);
         return $url;
      }
   }
}
