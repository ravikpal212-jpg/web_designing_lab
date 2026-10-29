<?php
header('Content-Type: application/json');
$headers=getallheaders();$expected=getenv('API_TOKEN')?:'CHANGE_ME';
if(!hash_equals($expected,$headers['Authorization']??'')){http_response_code(401);exit(json_encode(['error'=>'Unauthorized']));}
echo json_encode(['message'=>'Authorized','products'=>[]]);
?>
<!-- JS client:
fetch('Q08_token_api.php',{headers:{Authorization:'YOUR_TOKEN'}})
 .then(r=>r.json()).then(console.log);
-->
