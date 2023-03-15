# php-mvc

A PHP MVC framework

##Details :

### app/config.php

Adjust constants with your info.

### public/.htaccess

The .htaccess file with the mod_rewrite rule is responsible for redirecting all requests to the index.php file, which then initializes the Core object and handles the request based on the URL parameters passed in the url query string parameter.

This allows the Core object to handle all requests, not just one, and dynamically load the appropriate controller and method based on the URL parameters.

🚨 Remember to change RewriteBase /YOUR_PROJECT_FOLDER_NAME/public

### To create a model :

In app/models/Post.php

```

<?php
class Post
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();  // ----> connects to the db
   }
   public function getPosts()
   {
      $this->db->query('SELECT * FROM posts');
      return $this->db->resultSet();
   }
}

```

In your Posts controller in app/controllers/Posts.php

```
<?php
class Posts extends Controller
{
   public $postModel;

   public function __construct()
   {
      $this->postModel = $this->model('Post'); // ---> requires and instatiates the Post model
   }

   public function index()
   {
      $posts = $this->postModel->getPosts();
      $data = [
         'title' => 'Posts',
         'posts' => $posts
      ];

      $this->view("pages/index", $data);
   }

}
```
