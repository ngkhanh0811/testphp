<?php

require_once 'config.php';

//Khai báo các biến rỗng
$stuName = $address = $stuDay = $classID = "";
$stuName_err = $address_err = $stuDay_err = $classID_err = "";

// Lấy dữ liệu từ form
if($_SERVER["REQUEST_METHOD"] == "POST") {

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
        $stuDay_err = "Please enter a stuDay.";
    } elseif (!ctype_digit($input_stuDay)) {
        $stuDay_err = 'Please enter a positive integer value';
    } else {
        $stuDay = $input_stuDay;
    }

    //Validate classID
    $input_classID = trim($_POST["classID"]);
    if (empty($input_classID)) {
        $classID_err = "Please enter a classID.";
    }else {
        $classID = $input_classID;
    }

//Kiểm tra lỗi sau khi nhập vào database
    if (empty($stuName_err) && empty($address_err) && empty($stuDay_err) && empty($classID_err)) {
        //Câu lệnh prepare insert
        $sql = "INSERT INTO employees(stuName, address, stuDay, classID) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($nink, $sql)) {
            $param_stuName = $stuName;
            $param_address = $address;
            $param_stuDay = $stuDay;
            $param_classID = $classID;
            mysqli_stmt_bind_param($stmt, "sssi", $param_stuName, $param_address, $param_stuDay, $param_classID);

            //Truyền vào các kiểu dữ liệu


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
                <p>Please fill in this form and submit to add employee record to database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group <?php echo (!empty($stuName_err)) ? 'has-error' : ''; ?>">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $stuName; ?>">
                        <span class="help-block"><?php echo $stuName_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                        <span class="help-block"><?php echo $address_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($stuDay_err)) ? 'has-error' : ''; ?>">
                        <label>BirthDay</label>
                        <input type="text" name="salary" class="form-control" value="<?php echo $stuDay; ?>">
                        <span class="help-block"><?php echo $stuDay_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($classID_err)) ? 'has-error' : ''; ?>">
                        <label>Class</label>
                        <input type="text" name="classID" class="form-control" value="<?php echo $classID; ?>">
                        <span class="help-block"><?php echo $classID_err; ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>