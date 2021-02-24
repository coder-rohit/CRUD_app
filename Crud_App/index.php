
<?php



//   connect to database
$con = mysqli_connect("localhost", "root", "") or die("could not connect to database");
//data base select query
$resdb = mysqli_select_db($con, "crud_app");


if (isset($_POST["insert"])) {

    if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['city']) || empty($_POST['salary']) || empty($_POST['phone']) || empty($_POST['designation']))
    {
        echo "<script>alert ('any field must not be empty')</script>";
    } else{
    
    // creating database
    $i = "create database crud_app";
    $res = mysqli_query($con, $i);
    if ($res) {
        echo "database create";
    }
    // using database

    if ($resdb) {
        echo "";
    }

    // insert table

    $t = "create table emp(id int, name varchar(50), city varchar(50), salary varchar(50), phone varchar(20
), designation varchar(20))";
    $res = mysqli_query($con, $t);
    if ($res) {
        echo "";
    } else {
        echo "";
    }

    // insert values to columns
    
    $v = "INSERT INTO emp VALUES ('$_POST[id]', '$_POST[name]', '$_POST[city]', '$_POST[salary]', '$_POST[phone]', '$_POST[designation]')";
    $res = mysqli_query($con, $v);
    if ($res) {
        echo '<script>alert("added values to columns")</script>';
    } else {
        echo '<script>alert("not added values to columns")</script>';
    }
}
}

if (isset($_POST["delete"])) {

    if ($resdb) {
        echo "";
    }

    $d = "DELETE FROM emp WHERE id = '$_POST[id]' || name = '$_POST[name]' || city = '$_POST[city]' || salary = '$_POST[salary]' || name = '$_POST[designation]'";
    $res = mysqli_query($con, $d);
    if ($res) {
        echo '<script>alert("row deleted")</script>';
    } else {
        echo '<script>alert("not deleted")</script>';
    }
}

if (isset($_POST["update"])) {

    if ($resdb) {
        echo "";
    }

    $u = "update emp set name = '$_POST[name]' where id = $_POST[id]";
    $res = mysqli_query($con, $u);

    if ($res) {
        echo '<script>alert("updated")</script>';;
    } else {
        echo '<script>alert("not updated")</script>';;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
    <style>
        
        *{
            margin: 0px;
            padding: 0px;
        }
        .header {
            background-color: rgb(122, 122, 255);
            height: 40px;
            width: 100%;
            display: flex;
        }
        .header h3 {
            margin-left: 10px;
            display: inline;
        }
        .header p {
            display: inline;
            color: rgb(223, 233, 255);
            margin-left: 10px;
            margin-top: 7px;
        }
        .pa {
            margin-left: auto;
            margin-right: 10px;
            margin-top: 5px;
        }
        .pa p {
            color: white;
        }
        .detailsT tr {
            padding-top: 10px;
            display: inline-block;
            margin-left: 10px;
        }
        .input1 {
            width: 50px;
        }
        input {
            margin-left: 5px;
        }
        .input2 {
            width: 120px;
        }
        .input3 {
            width: 150px;
        }
        .detailsT input {
            border: none;
            border-bottom: 1px black solid;
            outline: none;
            color: rgb(139, 139, 139);
        }
        .btn-div {
            display: flex;
            justify-content: space-around;
        }
        .btn-div button {
            border: none;
            padding: 7px 20px;
            background-color: rgb(112, 112, 255);
            color: white;
        }
        .btn-div button:hover {
            background-color: rgb(56, 56, 255);
        }
        .searchD {
            display: flex;
            justify-content: center;
        }
        .searchD button {
            border: none;
            padding: 3px 15px;
            background-color: rgb(112, 112, 255);
            color: white;
        }
        .searchD button:hover {
            background-color: rgb(56, 56, 255);
        }
        .searchD p {
            font-size: 16px;
            margin-top: 1px;
        }
        .searchD input {
            outline: none;
            padding: 1px 0px;
        }
        .result table,
        th,
        .result td {
            border: 3px dotted rgb(112, 112, 255);
        }
        .result th,
        .result td {
            padding: 10px 14px;
        }
        .result {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3 class="text-white hc">CRUD</h3>
        <p>app</p>
        <div class="pa">
            <a href="index.php">
                <p>Admin</p>
            </a>
        </div>
    </div>

    <form action="index.php" method="post">

        <div class="container mt-5">
            <h2>Enter Details Here...</h2>
            <hr>
            <table class="detailsT">
                <tr>
                    <td>ID</td>
                    <td><input type="number" name="id" class="input1"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" class="input3"></td>
                </tr>
                <tr>
                    <td>Salary</td>
                    <td><input type="text" name="salary" class="input2"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td><input type="text" name="designation"></td>
                </tr>
            </table>

        </div>
        <div class="container mt-4">
            <hr>
            <div class="btn-div mt-4">
                <div>
                    <button type="submit" name="insert">Insert</button>
                </div>
                <div>
                    <button type="submit" name="delete">Delete</button>
                </div>
                <div>
                    <button type="submit" name="update">Update</button>
                </div>
                <div>
                    <button type="submit" name="display">Display</button>
                </div>
                <div>
                    <button type="reset" name="clear">Clear</button>
                </div>
            </div>
        </div>

    </form>

    <div class="container mt-4">
        <hr>
        <div class="searchD mt-4">
            <p>Finder:</p>
            <form action="index.php" method="POST">
                <input type="text" name="search">
                <button type="submit" name="searchb">Search</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["display"])) {
        if ($resdb) {
            echo "";
        }
        $s = "select * from emp";
        $res = mysqli_query($con, $s);
        echo "<div class='container result'>
    <div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Salary</th>
            <th>Phone Number</th>
            <th>Designation</th>
        </tr>";
        while ($row = mysqli_fetch_row($res)) {
            echo "
            <tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
            </tr>
            ";
        }
        echo "</table>
    </div>
    </div>";
    }
    ?>


    <?php
    if (isset($_POST["searchb"])) {
        if ($resdb) {
            echo "";
        }
        
        $search = $_POST['search'];
        
        $s = "select * from emp where name = '$search' || id = '$search' || city = '$search' || salary = '$search' || designation = '$search'";
        $res = mysqli_query($con, $s);
        echo "<div class='container result'>
    <div>
    <table>
    <h4 class='text-center';>Results for '$search' </h4>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Salary</th>
            <th>Phone Number</th>
            <th>Designation</th>
        </tr>";
        while ($row = mysqli_fetch_row($res)) {
            echo "
            <tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
            </tr>
            ";
        }
        echo "</table>
    </div>
    </div>";
    }
    ?>

    <div class="container">
        <hr>
    </div>

</body>
</html>