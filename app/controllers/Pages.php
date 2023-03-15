<?php
class Pages extends Controller
{
   public function __construct()
   {
      echo 'pages loaded' . '<br>';
   }
   public function index()
   {
      $this->view('hello');
   }
   public function about($params)
   {
      echo 'this is about ' .  ($params[0] ?? '') . '<br>';
   }
}
