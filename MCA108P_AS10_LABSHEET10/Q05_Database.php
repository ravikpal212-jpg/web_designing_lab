<?php
class Database {
 private static ?PDO $pdo=null;
 public static function conn(): PDO {
  if(self::$pdo===null) self::$pdo=new PDO(
   'mysql:host=localhost;dbname=webapp_db;charset=utf8mb4','appuser','CHANGE_ME',
   [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]
  );
  return self::$pdo;
 }
}
?>
