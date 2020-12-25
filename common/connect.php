<?
 define("DBName","docjas");
 define("HostName","localhost");
 define("UserName","root");
 define("Password","");

  $connection = mysqli_connect(HostName, UserName, Password, DBName);
  
  if (!$connection) {
      echo("Can not connect database ".DBName."!<BR>");
      echo(mysqli_connect_error());
      exit;
  }

?>