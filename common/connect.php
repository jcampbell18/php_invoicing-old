<?
  define("DBName","jcrewsite");
  define("HostName","localhost");
//  define("HostName","mysql-db.jasonlcampbell.com");
  define("UserName","jcrewsite");
  define("Password","&viK1fo4L8t#sGeksNO9dC");

  $connection = mysqli_connect(HostName,UserName,Password, DBName);

  if (!$connection) {
      echo("Can not connect database ".DBName."!<BR>");
      echo(mysqli_error());
      exit;
  }

//  mysqli_select_db(DBName,$connection);
?>