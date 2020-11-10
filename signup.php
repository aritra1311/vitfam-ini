<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}
require_once "head.php";
$msg="";
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['repass']))
{
	if($_POST['pass']==$_POST['repass'] && strlen($_POST['pass'])>=7)
	{

		$sql= "SELECT email FROM users WHERE BINARY email=:e";
		$stmt= $pdo->prepare($sql);
		$stmt->execute(array(
			':e'=> $_POST['email'],
		));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$hash=hash('md5', microtime());
			$psw=hash('md5',$_POST['pass']);
			$sql= "INSERT Into temp(process,email,pass) values(:pr,:e,:p)";
			$stmt= $pdo->prepare($sql);
			$stmt->execute(array(
				':pr'=> $hash,
				':e'=> $_POST['email'],
				':p'=> $psw,
			));
			$to = $_POST['email'];
			$subject = 'Confirm Account';
			$message = "Click on the link to confirm account ".$site."/confirm.php?x=".$hash;
			if(mail($to, $subject, $message)){
			    $msg= 'An email has been sent to your mail id for account confirmation. It might take upto 10 minutes.';
			} else{
			    $msg= 'Unable to send email to your email address. Please try again.';
			}
		}
		else
		{
			$msg="The email already exists";
		}
	}
	else
	{
		$msg="Passwords dont match";
	}
	if(strlen($_POST['pass'])<7)
	{
		$msg="Password too short";
	}
}
?>

    <div class="login-card" style="background-color:black;"><img class="profile-img-card" src="assets/img/avatar_2x.png" />
    <p class="profile-name-card"></p>
    <form class="form-signin" method="post">
        <?php if($msg!=""){echo("<p>$msg</p>");} ?>
        <span class="reauth-email"></span>
        <input type="email" class="form-control" id="inputEmail" required placeholder="Email address" name="email" autofocus />
        <input type="password" class="form-control" id="inputPassword" name="pass" required placeholder="Password" />
        <input type="password" class="form-control" id="cinputPassword" required name="repass" placeholder="Confirm Password" />
        <br>
        <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign Up</button>
    </form>
</div>
</section>

<?php require_once "footer.php"; ?>