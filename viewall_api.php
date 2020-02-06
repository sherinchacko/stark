
<?php
$Servername="localhost";
$Dbusername="root";
$Dbpassword="";
$Dbname="Mydb";
$connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
$Sql="SELECT  `Name`, `RollNo`, `College` FROM `student`";
$result=$connection->query($Sql);
if($result->num_rows>0)
{
    $r=array();
   while($row=$result->fetch_assoc())
   {
       $r["data"][]=$row;
   }
   echo json_encode($r);
}
?>