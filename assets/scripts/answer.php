<?
include 'db.php';


// Собираем коменты
$answer = $db->query('SELECT * FROM comments');
$res_comment = $answer->FETCHALL(PDO::FETCH_ASSOC);

$six_comm = [];
$check = count($res_comment) - 6;
$i=0;

foreach ($res_comment as $res){
  $i++;
    
  if ( $i>$check ){
      
    $six_comm[] = array('name'=>$res['name'], 'email'=>$res['email'], 'comment:' => $res['comment']);
      
}}


echo json_encode($six_comm, JSON_UNESCAPED_UNICODE);
