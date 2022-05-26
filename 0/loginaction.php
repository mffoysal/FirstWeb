<?php
    session_start();
    // $con = new mysqli("localhost", "root", "", "foysal");
    include('db.php');
    $table = 'users';

    $msg = "";
    $status="Active now";
    if(isset($_POST['login'])){
        $username = $_POST['phone'];
        $password = $_POST['password'];
        $password = ($password);
        $user_type = $_POST['user_type'];

        $con->query("UPDATE users SET status='$status' WHERE phone='$username'");

        $sql = "SELECT * FROM users WHERE phone=? AND pass=? AND actype=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $username,$password,$user_type);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        session_regenerate_id();
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['role'] = $row['actype'];
        $_SESSION['pass'] = $row['pass'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['id'] = $row['unique_id'];
        session_write_close();

        if($result->num_rows==1 && $_SESSION['role']=="student"){
            header("location:student.php");
        }
        else if($result->num_rows==1 && $_SESSION['role']=="mentor"){
            header("location:teacher.php");
        }
        else if($result->num_rows==1 && $_SESSION['role']=="admin"){
            header("location:admin.php");
        }
        else{
            
            header("location:login.php");
            $_SESSION['msg'] = "Username or Password is Incorrect!";
        }



    }

?>