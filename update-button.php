<?php
@include 'config.php';

if(isset($_POST['update_user']))
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
// password=$password,
        $query = "UPDATE users SET name='$name', email='$email',  user_type='$user_type'
                    WHERE id='$user_id'";
 $query_run = mysqli_query($conn, $query);

 
 if($query_run)
 {
     session_start();
     $_SESSION['message'] = "Updated Successfully";
     header('Location: admin_users.php');
     exit(0);
 }
}
?>