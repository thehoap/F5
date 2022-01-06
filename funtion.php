<? php

mysql_connect("localhost","root","") or die("Not connect");
mysql_select_db("f5_music");

session_start();

function get_user($username, $password){

	$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='password'");
	if(mysql_num_rows($sql) > 0){
		
		$row = mysql_fetch_array($sql);
		$_SESSION['currUser'] = $row['username'];

		if($row['role'] == 1){
			$_SESSION['currAdmin'] = $row['role'];
			header("location:admin.php");
		}else{
			header("location:index.php");
		}

	} else{
		echo "<script> alert('Username or Password incorrect') </script";
	}
}
?>
