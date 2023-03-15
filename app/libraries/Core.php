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
      $this->currentController = new $this->currentController(); //eg new Pages()



      //check for second part of url
      if (isset($url[1])) {
         //check if method exists in controller
         if (method_exists($this->currentController, $url[1])) { //eg Pages -> about()
            $this->currentMethod = $url[1];
            unset($url[1]);
         }
      }
      //get parameters
      $this->params = $url ? array_values($url) : [];

      //call a callback with array of params

      call_user_func([$this->currentController, $this->currentMethod], $this->params); //eg Pages->about($params)
      //NOTE: basically same as ---> $this->currentController->{$this->currentMethod}($this->params);
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
