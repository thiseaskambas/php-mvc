<?php
//NOTE: this is how to create and use models, will not be included in the framework 
class Post
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }
   public function getPosts()
   {
      $this->db->query('SELECT * FROM posts');
      return $this->db->resultSet();
   }
}
