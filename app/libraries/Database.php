<?php

//PDO Database class:
// connects to db
//prepares statements
//binds values
//returns rows and results
class Database
{
   private $host = DB_HOST;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $dbname = DB_NAME;

   private PDO $dbhandler;
   private PDOStatement $statement;
   private $error;


   public function __construct()
   {

      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      );
      //create PDO instance
      try {
         $this->dbhandler = new PDO($dsn, $this->user, $this->pass, $options);
      } catch (PDOException $e) {
         $this->error = $e->getMessage();
         echo '❌  ' . $this->error . '<br>';
      }
   }

   //prepare statement with query
   public function query($sql)
   {
      $this->statement = $this->dbhandler->prepare($sql);
   }

   //bind values
   public function bind($param, $value, $type = null)
   {
      if (is_null($type)) {
         switch (true) {
            case is_int($value):
               $type = PDO::PARAM_INT;
               break;
            case is_bool($value):
               $type = PDO::PARAM_BOOL;
               break;
            case is_null($value):
               $type = PDO::PARAM_NULL;
               break;
            default:
               $type = PDO::PARAM_STR;
         }
      }
      $this->statement->bindValue($param, $value, $type);
   }

   //execute prepared statement
   public function execute()
   {
      return $this->statement->execute();
   }

   //get result set as array of objects
   public function resultSet()
   {
      $this->execute();
      return $this->statement->fetchAll(PDO::FETCH_OBJ);
   }

   //get single record as object
   public function singleFetch()
   {
      $this->execute();
      return $this->statement->fetch(PDO::FETCH_OBJ);
   }

   //get row count
   public function rowCount()
   {
      return $this->statement->rowCount();
   }
}
