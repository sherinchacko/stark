<?php
if(isset($_POST["upRoll"]))
{
    $Upname=$_POST["upname"];
    $Upadmno=$_POST["upadmno"];
    $Upcollege=$_POST["upcollege"];
    $Rol=$_POST["upRoll"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="Mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="UPDATE `student` SET `Name`='$Upname',`Admno`=$Upadmno,`College`='$Upcollege' WHERE `RollNo`=$Rol";
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