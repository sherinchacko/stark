<?php
if(isset($_POST["toDelete"]))
{
  $Deladdmno=$_POST["toDelete"];
  $Servername="localhost";
  $Dbusername="root";
  $Dbpassword="";
  $Dbname="Mydb";
  $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
  $Sql="DELETE FROM `student` WHERE `Admno`=$Deladdmno";
  $result=$connection->query($Sql);
  if($result===TRUE)
  {
      $r["status"]="success";
  }
  else {
      $r["status"]="error";
  }
  echo json_encode($r);
}
?>