  <?php 
 $dsn = 'mysql:host=;dbname=shop2';
 $user = 'root';
 $pass = '';
 $option =  array(
 	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ,

);

  try {
  	$con = new PDO($dsn, $user, $pass, $option);
  	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	//echo 'yor are connected welcome to database';
  }


  catch(PDOException $e){
  	//echo "failde to connect" . $e->getMessage();
  }