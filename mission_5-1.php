<!DOCTYPE html>
<html>
<body>
<?php
$komenntoo=null;
$namaee=null;
$r=null;
ini_set("max_execution_time",0);
ini_set("max_input_time",0);
$dsn='mysql:dbname=データーベース名;host=localhost';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
$sql="CREATE TABLE IF NOT EXISTS f"
."("
."id INT AUTO_INCREMENT PRIMARY KEY,"
."name char(32),"
."comment TEXT, "
."created DATETIME"
.");";
$stmt=$pdo->query($sql);
$sql='SHOW TABLES';
$result=$pdo->query($sql);
foreach($result as $row){
echo$row[0];
echo'<br>';
}
echo"<hr>";
$sql='SHOW CREATE TABLE f';
$result=$pdo->query($sql);
foreach($result as $row){
echo$row[1];
}
echo"<hr>";
$sql=$pdo->prepare("INSERT INTO f (name, comment, created) VALUES(:name, :comment, :created)");
$sql->bindParam(':name',$name,PDO::PARAM_STR);
$sql->bindParam('comment', $comment,PDO::PARAM_STR);
$sql->bindParam('created', $created,PDO::PARAM_STR);

if(!empty($_POST['namae'])){ 
	if($_POST['pass']=="world"){
    if(!empty($_POST['LL']and$_POST['name']and(empty($_POST['num'])))){
$na=$_POST['LL'];
$co=$_POST['name'];
$name=$na;
$comment=$co;
$created=date('Y-m-d H:i:s');
$sql->execute();
}}}

//削除

if(!empty($_POST['sakujo'])){
    	if($_POST['passsakujo']=="world"){
        $sakujooo=$_POST['sakujo']; 
        $id=$sakujooo;
        $sql='delete from f where id=:id';
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        }}

 if(!empty($_POST['henshu'])){
  	if($_POST['passhenshu']=="world"){
       $hennshuu=$_POST['henshu']; 
       $sql='SELECT * FROM f';
       $stmt=$pdo->query($sql);
       $r=$stmt->fetchAll();
    foreach($r as $w){
        if($w['id']==$hennshuu){
   	    $number=$w['id'];
   	    $namaee=$w['name'];
    	$komenntoo=$w['comment'];
    	}
	 	}
	}}
       	if(!empty($_POST['num'])){
if($_POST['pass']=="world"){		
	        $num=$_POST['num'];
   	    $namaeee=$_POST['LL'];
    	$komenntooo=$_POST['name'];
	       $id=$num;
	        $name=$namaeee;
	        $comment=$komenntooo;
	        $created=date('Y-m-d H:i:s');
	        $sql='update f set name=:name,comment=:comment,created=:created where id=:id';
	        $stmt=$pdo->prepare($sql);
	        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	        $stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
	        $stmt->bindParam(':created',$created,PDO::PARAM_STR);
	        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
	        $stmt->execute();
	  }}
	 ?>
<form action="mission_5-1.php" method="post">
<input type="text" name="LL" placeholder="名前" value="<?php if(!empty($hennshuu)){if(!empty($w)){
echo $namaee;}}?>"><br>
<input type="text" name="name" placeholder="コメント" value="<?php if(!empty($hennshuu)){if(!empty($w)){echo $komenntoo;}}?>"><br>
<input type="password" name="pass" placeholder="パスワード">
<input type="submit" name="namae" value="送信">
<input type="hidden" name="num" value="<?php if(!empty($hennshuu)){echo $hennshuu;}?>"><hr>
</form>
<form action=" " method="post">
<input type="text" name="sakujo" placeholder="削除対象番号">
<input type="password" name="passsakujo" placeholder="パスワード"><br>
<input type="submit" name="sakujoo" value="削除"><hr>
</form>
<form action=" " method="post">
<input type="text" name="henshu" placeholder="編集対象番号">
<input type="password" name="passhenshu" placeholder="パスワード" ><br>
<input type="submit" name="henshuu" value="編集"><hr>
</form>
</body>
</html>
<?php
$sql='SELECT * FROM f';
$stmt=$pdo->query($sql);
$results=$stmt->fetchAll();
foreach($results as $row){
echo$row['id'].',';
echo$row['name'].',';
echo$row['comment'].',';
echo$row['created'].'<br>';
echo"<hr>";
}
?>