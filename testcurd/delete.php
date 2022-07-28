<?php
if(isset($_POST["stuID"]) && !empty($_POST["stuID"])){
    require_once 'config.php';

    //Câu lệnh sql
    $sql = "DELETE FROM student WHERE stuID = ?";

    if ($stmt = mysqli_prepare($nink, $sql)){
//            Truyền vào giá trị của biến id trong câu lệnh truy vấn
        mysqli_stmt_bind_param($stmt, "i", $param_stuID);

        //Set kiểu dữ liệu
        $param_stuID = trim($_POST["stuID"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($nink);
} else{
    if (empty(trim($_GET["stuID"]))){
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
                    <h2>Delete Record</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group <?php echo (!empty($stuName_err)) ? 'has-error' : ''; ?>">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="stuID" value="<?php echo trim($_GET["stuID"]); ?>">
                            <p>Are you sure you want to delete this record?</p></br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-primary">
                                <a href="index.php" class="btn btn-primary">No</a>
                            </p>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>