<html>
<head>
    <title>Insert | Student</title>
</head>
<body>
<?php
$stuID = 0;
$stuName = "";
$address = "";
$stuDay = "";
$classID = "";

if (!empty($_POST['stuID'])){
    $stuID = $_POST['stuID'];
}
if (!empty($_POST['stuName'])){
    $stuName = $_POST['stuName'];
}
if (!empty($_POST['address'])){
    $address = $_POST['address'];
}
if (!empty($_POST['stuDay'])){
    $stuDay = $_POST['stuDay'];
}
if (!empty($_POST['classID'])){
    $classID = $_POST['classID'];
}
echo $stuID;
echo $stuName;
?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    Student ID: <input type="text" name="stuID"/>
    Student Name: <input type="text" name="stuName"/>
    Adress: <input type="text" name="address"/>
    Student Birthday: <input type="text" name="stuDay"/>
    Class ID: <input type="text" name="classID"/>
    <input type="submit" value="Add Student"/>
</form>

<?php
$myDB = new mysqli('localhost', 'root', '', 'collegeweb');

if ($myDB -> connect_error) {
    die('Connect Error (' . $myDB->connect_errno . ')' . $myDB->connect_errno);
}

if($stuID != 0) {
$insert = "INSERT INTO student(stuID, stuName, stuDay, address, classID) VALUES ($stuID, '$stuName', '$stuDay', '$address', '$classID')";
echo $insert;
echo "New record are created successfully!";
$myDB->query($insert);
}

$sql = "SELECT * FROM Student";
$result = $myDB->query($sql);
?>
<table cellpadding=" 2" cellspacing="6" align="center" border="1" >

    <tr>
        <td colspan="4">
            <h3 align="center">Information of Student</h3>
        </td>
    </tr>

    <tr>
        <td align="center">ID</td>
        <td align="center">Name</td>
        <td align="center">Birth Day</td>
        <td align="center">Address</td>
        <td align="center">Class</td>
    </tr>

    <?php
    While ($row = $result-> fetch_assoc()) {
        echo "<tr>";
        echo "<td>";

        echo stripcslashes($row["stuID"]);
        echo "</td><td align='center'>";
        echo $row ["stuName"];
        echo "</td><td>";
        echo $row["stuDay"];
        echo "</td><td>";
        echo $row["address"];
        echo "</td><td>";
        echo $row["classID"];
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
