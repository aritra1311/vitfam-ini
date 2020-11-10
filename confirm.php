<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
require_once "pdo.php";
$msg="";
if(isset($_GET['x']))
{
	$sql= "SELECT process FROM temp WHERE BINARY process=:p";
	$stmt= $pdo->prepare($sql);
	$stmt->execute(array(
		':p'=> $_GET['x'],
	));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($row===false)
	{
    $msg="There is no such request <br> <a href='index.php'>Go back to Home</a>";
	}
  else
	{
    $sql= "SELECT email,pass FROM temp WHERE BINARY process=:p";
  	$stmt= $pdo->prepare($sql);
  	$stmt->execute(array(
  		':p'=> $_GET['x'],
  	));
  	$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $email;
    $pass;
    foreach ( $rows as $row ) {
        $email=$row['email'];
        $pass=$row['pass'];
      }
		$sql= "INSERT Into users(email,pass) values(:e,:p)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute(array(
			':e'=> $email,
			':p'=> $pass,
		));
		$msg="Your account has been created. <br> Please <a href='login.php'>Log In</a>";
    $sql="DELETE FROM temp WHERE BINARY process = :p";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
      ':p'=>$_GET['x'],
    ));
	}
}
else
{
  $msg="The request is empty <br> <a href='index.php'>Go back to Home</a>";
}

require_once "head.php";
?>
<div class="container-fluid" style="text-align:center;">
<?php echo($msg); ?>
</div>
<?php require_once "footer.php"; ?>

