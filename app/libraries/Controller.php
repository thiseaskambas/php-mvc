<?php
//Base controller : loads models and views, all controllers will extend from here

class Controller
{
   //load model
   public function model($model)
   {
      require_once "../app/models/$model.php";

      //instatiate model
      return new $model(); //eg new Post()
   }

   //load view
   public function view($view, $data = [])
   {
      if (file_exists("../app/views/$view.php")) {
         require_once "../app/views/$view.php";
      } else {
         //if view does not exist
         die("❌ View does not exist");
      }
   }
}
