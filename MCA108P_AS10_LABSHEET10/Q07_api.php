<?php
header('Content-Type: application/json');
require_once 'db.php'; // defines $pdo
$method=$_SERVER['REQUEST_METHOD'];$data=json_decode(file_get_contents('php://input'),true)??[];
try {
 if($method==='GET'){$out=$pdo->query('SELECT * FROM products')->fetchAll(PDO::FETCH_ASSOC);}
 elseif($method==='POST'){$s=$pdo->prepare('INSERT INTO products(name,price) VALUES(?,?)');$s->execute([$data['name']??'',(float)($data['price']??0)]);$out=['created'=>true];}
 elseif($method==='PUT'){$s=$pdo->prepare('UPDATE products SET name=?,price=? WHERE id=?');$s->execute([$data['name']??'',(float)($data['price']??0),(int)($data['id']??0)]);$out=['updated'=>true];}
 elseif($method==='DELETE'){$s=$pdo->prepare('DELETE FROM products WHERE id=?');$s->execute([(int)($data['id']??0)]);$out=['deleted'=>true];}
 else{http_response_code(405);$out=['error'=>'Method not allowed'];}
 echo json_encode($out);
} catch(Throwable $e){http_response_code(500);echo json_encode(['error'=>'Request failed']);}
?>
