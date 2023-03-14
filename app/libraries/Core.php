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
      $this->getUrl();
   }

   public function getUrl()
   {
      echo $_GET['url'];
   }
}
