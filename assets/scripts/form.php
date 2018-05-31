<?php
include 'db.php';

$error='';

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comment'])) {
    $name=trim(strip_tags($_POST['name']));
    $email=trim(strip_tags($_POST['email']));
    $comment=trim(strip_tags($_POST['comment']));

    
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

if (mb_strlen($name)<=17 &&  mb_strlen($email)<=17 && mb_strlen($comment)<=50) {
    
    $quest = $db->prepare("INSERT INTO comments (name, email, comment) VALUES (:name, :email, :comment)");
    
    $quest->bindParam(':name', $name);
    $quest->bindParam(':email', $email);
    $quest->bindParam(':comment', $comment);
    $quest->execute();
    
    
    
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

    
}}} else {
    $error = 'Что то не то';
    echo $error;
   
}


   
?>