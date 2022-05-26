<?php
    session_start();
    if(isset($_SESSION['role'])){
        $se = $_SESSION['role'];
        if($se == 'student'){
            header('location:student.php');
        }else if($se == 'mentor'){
            header('location:teacher.php');
        }else if($se == 'admin'){
            header('location:admin.php');
        }
        
    }
    
    // $con = new mysqli("localhost", "root", "", "foysal");
    include('db.php');
    // $table = 'users';

    // $msg = "";
    
    // if(isset($_POST['login'])){
    //     $username = $_POST['phone'];
    //     $password = $_POST['password'];
    //     $password = ($password);
    //     $user_type = $_POST['user_type'];

    //     $sql = "SELECT * FROM users WHERE phone=? AND pass=? AND actype=?";
    //     $stmt = $con->prepare($sql);
    //     $stmt->bind_param("sss", $username,$password,$user_type);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $row = $result->fetch_assoc();

    //     session_regenerate_id();
    //     $_SESSION['phone'] = $row['phone'];
    //     $_SESSION['role'] = $row['actype'];
    //     session_write_close();

    //     if($result->num_rows==1 && $_SESSION['role']=="student"){
    //         header("location:student.php");
    //     }
    //     else if($result->num_rows==1 && $_SESSION['role']=="mentor"){
    //         header("location:teacher.php");
    //     }
    //     else if($result->num_rows==1 && $_SESSION['role']=="admin"){
    //         header("location:admin.php");
    //     }
    //     else{
    //         $msg = "Username or Password is Incorrect!";
    //     }

    //  $_SERVER['PHP_SELF']

    // }

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.5.1.min.js"></script>

</head>
<body class="bg-dark">
<?php
include('navbar.php');
include('msg.php');
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h2 class="text-center text-light bg-danger p-3">EdULearn Multi Users</h2>
                <!-- <h3 id="hlw" class="text-danger text-center">555</h3> -->
                <form action="loginaction.php" method="post" class="p-4" autocomplete="off">
                <!-- <form action="" method="post" class="p-4" autocomplete="off"> -->
                    <div class="form-group">
                        <input id="tel2" type="tel" name="phone" onInput="telephone()" class="form-control form-control-lg" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    </div>
                    <div class="form-control lead">
                        <label for="user_type">I'm a :</label>
                        <input type="radio" name="user_type" value="student" class="custom-radio" checked required>&nbsp;Student |
                        <input type="radio" name="user_type" value="mentor" class="custom-radio" required>&nbsp;Teacher |
                        <input type="radio" name="user_type" value="admin" class="custom-radio" required>&nbsp;Admin 
                    </div>
                    <div class="form-group form-control">
                        <input type="submit" name="login" class="btn btn-info form-control">
                    </div>
                    <h5 id="hlw" class="text-danger text-center"></h5>
                </form>
            </div>
        </div>
    </div>
    

    <script>
        function telephone(){

            jQuery.ajax({
                url: "logincheck.php",
                data: 'login=' +$("#tel2").val(),
                type: "POST",
                success: function (data){
                    $("#hlw").html(data);
                },
                error: function (){}
            });
        }
    </script>
</body>
</html>