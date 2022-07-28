<html>
<head>
    <title>Student | Seach</title>
</head>
<body>
<?php
$stuName = '';
if(!empty($_POST['stuName'])){
    $stuName = $_POST['stuName'];
    echo "Finding record, {$_POST['stuName']}, and Result";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Enter your name: <input type="text" name="stuName"/>
    <input type="submit" value="search"/>
</form>

<?php
$myDB = new mysqli('localhost', 'root', '', 'collegeweb' );
if ($myDB -> connect_error) {
    die('Connect Error (' . $myDB ->connect_error . ')' . $myDB -> connect_error);
}
if ($stuName != ''){
    $sql = "SELECT * FROM Student WHERE classID = 'T2109M' AND stuName LIKE '%{$stuName}%' order by stuName";
} else{
    $sql = "SELECT * FROM Student WHERE classID = 'T2109M' order by stuName";
}
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