<?
    include("connect.php");
	session_start() ;

    $sql = "SELECT l.username, l.password, a.name FROM login l, access a WHERE l.username='{$_POST['c_login']}' AND l.password='{$_POST['c_password']}' AND l.access_id=a.id" ;
	$sql = mysqli_query($connection, $sql) ;

	if( $sql and mysqli_num_rows($sql)>0 ){
        list($un_login,$pw_login,$name_access) = mysqli_fetch_row($sql);
    	
        if ($un_login==$_POST['c_login'] and $pw_login==$_POST['c_password']) {
    		$_SESSION['username'] = $un_login ;
    		$_SESSION['username_access'] =  $name_access ;
    		header("Location: ../main.php?page=dashboard") ;
    	} else {
            header("Location: ../index.php") ;
        }
	} else {
		header("Location: ../index.php") ;
	}
?>