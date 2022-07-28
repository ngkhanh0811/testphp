<?php

require_once 'config.php';

//Khai báo các biến rỗng
$stuName = $address = $stuDay = $classID = "";
$stuName_err = $address_err = $stuDay_err = $classID_err = "";

//Xử lí form dữ liệu sau khi đã được nhập vào
if(isset($_POST["stuID"]) && !empty($_POST["stuID"])){
    $stuID = $_POST["stuID"];

//Validate name
    $input_stuName = trim($_POST["stuName"]);
    if (empty($input_stuName)) {
        $stuName_err = "Please enter a name.";
    } elseif (!filter_var(trim($_POST["stuName"]), FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z'-.\s ]+$/")))) {
        $stuName_err = 'Please enter valid name.';
    } else {
        $stuName = $input_stuName;
    }

//Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = 'Please enter a address.';
    } else {
        $address = $input_address;
    }

//Validate stuDay
    $input_stuDay = trim($_POST["stuDay"]);
    if (empty($input_stuDay)) {
        $stuDay_err = "Please enter a salary.";
    } elseif (!ctype_digit($input_stuDay)) {
        $stuDay_err = 'Please enter a positive integer value';
    } else {
        $stuDay = $input_stuDay;
    }

    //Validate classID
    $input_classID = trim($_POST["classID"]);
    if (empty($input_classID)) {
        $classID_err = "Please enter a salary.";
    } elseif (!ctype_digit($input_classID)) {
        $classID_err = 'Please enter a positive integer value';
    } else {
        $classID = $input_classID;
    }

//Kiểm tra lỗi sau khi nhập vào database
    if (empty($stuName_err) && empty($address_err) && empty($stuDay_err) && empty($classID_err)) {
        //Câu lệnh prepare insert
        $sql = "INSERT INTO student(stuName, address, stuDay, classID) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($nink, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssi", $param_stuName, $param_address, $param_stuDay, $param_classID);

            //Truyền vào các kiểu dữ liệu
            $param_stuName = $stuName;
            $param_address = $address;
            $param_stuDay = $stuDay;
            $param_classID = $classID;

            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($nink);
} else{
    //Kiểm tra xem id có tồn tại hay không
    if (isset($_GET["stuID"]) && !empty(trim($_GET["stuID"]))){
        //Lấy đường dẫn của phương thức
        $stuID = trim($_GET["stuID"]);

        //Câu lệnh truy vấn dữ liệu
        $sql = "SELECT * FROM student WHERE stuID = ?";

        if ($stmt = mysqli_prepare($nink, $sql)){
//            Truyền vào giá trị của biến id trong câu lệnh truy vấn
            mysqli_stmt_bind_param($stmt, "i", $param_stuID);

            // Tạo phương thức
            $param_stuID = $stuID;

            if (mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $name = $row["stuName"];
                    $address = $row["address"];
                    $stuDay = $row["stuDay"];
                    $classID = $row["classID"];
                }
                else{
                    header("location: error.php");
                    exit();
                }
            } else{
                echo "Oops! Something went wrong, please try again later!";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($nink);
    }
    else{
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Create Record</h2>
                </div>
                <p>Please edit the input values and submit to update the record.</p>
                <form action="" method="post">
                    <div class="form-group <?php echo (!empty($stuName_err)) ? 'has-error' : ''; ?>">
                        <label>Name</label>
                        <input type="text" name="stuName" class="form-control" value="<?php echo $stuName; ?>">
                        <span class="help-block"><?php echo $stuName_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                        <span class="help-block"><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($stuDay_err)) ? 'has-error' : ''; ?>">
                        <label>Salary</label>
                        <input type="text" name="stuDay" class="form-control" value="<?php echo $stuDay; ?>">
                        <span class="help-block"><?php echo $stuDay_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($classID_err)) ? 'has-error' : ''; ?>">
                        <label>Salary</label>
                        <input type="text" name="classID" class="form-control" value="<?php echo $classID; ?>">
                        <span class="help-block"><?php echo $classID_err; ?></span>
                    </div>
                    <input type="hidden" name="stuID" value="<?php echo $stuID;?>">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>