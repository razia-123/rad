<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title">Edit Account Information</h1>
   <?php
   if(isset($_GET['id']))
      {
        $user_id = $_GET['id'];
        $users = "SELECT * FROM users WHERE id='$user_id' ";
        $users_run= mysqli_query($conn, $users );

        if(mysqli_num_rows($users_run) > 0)
        {
           foreach($users_run as $user )
           {
            ?>

          
 <form action="update-button.php" method="POST">
    <label id=usl for="">User Id </label>
    <input type="text" name="user_id" value="<?=$user['id'];?>">
    <div class="row">
        <div class="col-md-8 mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="<?=$user['name']; ?>"class="form-control form-control-lg">
        </div>
        <div class="col-md-8 mb-3">
            <label for="">Email</label>
            <input type="text" name="email" value="<?=$user['email']; ?>" class="form-control form-control-lg">
        </div>
        <!-- <div class="col-md-8 mb-3">
            <label for="">Password</label>
            <input type="text" name="password" requiored placeholder="enter new password" class="form-control form-control-lg">
        </div> -->
        <div class="col-md-8 mb-3">
            <label for="">User Type</label>
            <select name="user_type" required class="form-control form-control-lg">
                <option id=ut>select user type</option>
                <option value="admin" <?=$user['user_type']== 'admin' ? 'selected':''?> >admin</option>
                <option value="user" <?=$user['user_type']== 'user' ? 'selected':''?>>user</option>
            </select>
        </div>
        <div class="col-md-8 mb-3">
        <button type="submit" name="update_user" class="btn btn-secondary">update</button>
        </div>
    </div>
 </form>
 <?php
}
} 
}

else{
 ?>
 <h4>no records found</h4>
 <?php

}

?>
