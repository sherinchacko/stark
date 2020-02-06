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
    <center>Welcome To The Erasing section </center>
    <form method="POST">
    <table class="table">
    <tr>
    <td>
    Enter the Addmisson Number:
    </td>
    <td>
    <input type="text" class="form-control" name="getAdmno">
    </td>
    </tr>
    <tr>
    <td>

    </td>
    <td>
    <button type="submit" class="btn btn-success" name="submit">
    Get Details
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
    $Admno=$_POST["getAdmno"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="Mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="SELECT  `Name`, `RollNo`, `College` FROM `student` WHERE `Admno`=$Admno";
    $result=$connection->query($Sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $Name=$row["Name"];
            $Roll=$row["RollNo"];
            $College=$row["College"];
            echo "<form method='POST'><table class='table'> <tr> <td> name </td> <td> $Name </td> </tr>
            <tr> <td> Roll </td> <td> $Roll </td> </tr>
            <tr> <td> college </td> <td> $College </td> </tr>
            <tr> <td> </td> <td> <button type='submit' class='btn btn-danger' name='toDelete'>
            Delete </button> </td> </tr> </form>";
        }

    }
    else {
        echo"invalid";
    }

}
if(isset($_POST["toDelete"]))
{
    
  $Servername="localhost";
  $Dbusername="root";
  $Dbpassword="";
  $Dbname="Mydb";
  $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
  $Sql="DELETE FROM `student` WHERE `Admno`=$Admno";
  $result=$connection->query($Sql);
  if($result===TRUE)
  {
      echo "success";
  }
  else {
      echo "okkunnila";
  }
}
?>