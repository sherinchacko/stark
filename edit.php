<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Student Entry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="edit.php">Edit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="delete.php">Delete</a>
            </li>
          </ul>
    </nav>
    <h2>
        Edit
    </h2>
    <form method="POST">
    <table class="table">
        <tr>
            <td>
                Roll no.
            </td>
            <td>
                <input type="text" class="form-control"name="getRoll">
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <button type="submit" class="btn btn-danger"name="submit">
                    Edit
                </button>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
$Roll=$_POST["getRoll"];
$Servername="localhost";
$Dbusername="root";
$Dbpassword="";
$Dbname="Mydb";
$connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
$Sql="SELECT `Name`, `Admno`, `College` FROM `student` WHERE `RollNo`=$Roll";
$result=$connection->query($Sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $Name=$row["Name"];
        $Addmno=$row["Admno"];
        $College=$row["College"];
        
        echo "<form method='POST'> <table class='table'> <tr> <td> name </td> <td> <input type='text' name='upname' value='$Name'/> </td> </tr>
        <tr> <td> Admno </td> <td><input type='text' name='upadmno' value='$Addmno' </td> </tr>
        <tr> <td> college </td> <td> <input type='text' name='upcollege' value='$College' </td> </tr>
        <tr> <td> <button type='submit' value='$Roll' name='upbutton' class='btn btn-success'> Update </button> <br> </td> </tr>
        </form>";
       
    }
}
else{
    echo "invalid";
}
}
if(isset($_POST["upbutton"]))
{
    $Upname=$_POST["upname"];
    $Upadmno=$_POST["upadmno"];
    $Upcollege=$_POST["upcollege"];
    $Rol=$_POST["upbutton"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="Mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="UPDATE `student` SET `Name`='$Upname',`Admno`=$Upadmno,`College`='$Upcollege' WHERE `RollNo`=$Rol";
    $result=$connection->query($Sql);
    if($result===TRUE)
    {
        echo "success";
    }
    else {
        echo"failed";
    }
}

?>