<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
$errmsg="";
$blocked=FALSE;
if(isset($_GET['in']) && $_GET['in']==1)
{
  $_GET = array();
  $errmsg="No user exists with this password and user name";
}
if(isset($_POST['email']))
{
  $sql="SELECT email FROM blocked WHERE BINARY email=:e";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':e'=> $_POST['email'],
  ));
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rows!==FALSE)
  {
    $sql="SELECT email,attempts FROM blocked WHERE BINARY email=:e";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':e'=> $_POST['email'],
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row)
    {
      if($row['attempts']>=5)
      {
        $blocked=TRUE;
        $errmsg="The user has been blocked. Reset password to unblock.";
      }
    }
  }
}
if(isset($_POST['email']) && isset($_POST['paswword']) && $blocked==FALSE)
{
  $sql="SELECT email FROM users WHERE BINARY email=:e AND BINARY pass=:p";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
		    ':e'=> $_POST['email'],
        ':p'=> $_POST['paswword'],
	));
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rows===FALSE)
  {
    $sql="SELECT email FROM users WHERE BINARY email=:e";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
  		':e'=> $_POST['email'],
  	));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rows!==FALSE)
    {
      $sql="SELECT email FROM blocked WHERE BINARY email=:e";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
    		':e'=> $_POST['email'],
    	));
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rows!==FALSE)
      {
        $sql="SELECT attempts FROM blocked WHERE BINARY email=:e";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
      		':e'=> $_POST['email'],
      	));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $attempt;
        foreach($rows as $row)
        {
          $attempt=$row['attempts'];
        }
        $sql="UPDATE blocked SET attempts = :a WHERE BINARY email = :e";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(array(
          ':a'=> $attempt+1,
      	  ':e'=> $_POST['email'],
      	));
      }
      if($rows===FALSE)
      {
        $sql="INSERT Into blocked(email,attempts) values(:e,:a)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(array(
          ':e'=> $_POST['email'],
          ':a'=> 1,
      	));
      }

    }
    $_POST = array();
    header("Location: login.php?in=1");
  }
  else
  {
    if($blocked==FALSE)
    {
      $sql="SELECT email FROM blocked WHERE BINARY email=:e";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':e'=> $_POST['email'],
      ));
      $rows = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rows!==FALSE)
      {
        $sql="DELETE FROM blocked WHERE email = :e";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
          ':e'=>$_POST['email'],
        ));
      }
      $sql="SELECT user_id, email, pass FROM users WHERE BINARY email=:e AND BINARY pass=:p";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
    		':e'=> $_POST['email'],
        ':p'=> $_POST['paswword'],
    	));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ( $rows as $row ) {
          $_SESSION['user']=$row['user_id'];
          $_SESSION['email']=$row['email'];
        }
        header("Location: index.php");
    }

  }

}
require_once "head.php";
?>

    </section><div class="login-dark">
    <form method="post">
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <?php if($errmsg!=""){echo("<p>$errmsg</p>");} ?>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" /></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
       
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Login In</button></div></form>
</div>
<?php require_once "footer.php"; ?>