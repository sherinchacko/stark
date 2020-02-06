<?php
if(isset($_POST["getName"]))
{
    $Name=$_POST["getName"];
    $Roll=$_POST["getRoll"];
    $College=$_POST["getCollege"];
    $Addmn=$_POST["getAddmno"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="Mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="INSERT INTO `student`( `Name`, `RollNo`, `Admno`, `College`) VALUES('$Name',$Roll,$Addmn,'$College')";
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