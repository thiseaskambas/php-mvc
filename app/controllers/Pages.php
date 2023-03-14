<?php
class Pages
{
   public function __construct()
   {
      echo 'pages loaded' . '<br>';
   }
   public function index()
   {
   }
   public function about($params)
   {
      echo 'this is about ' .  ($params[0] ?? '') . '<br>';
   }
}
