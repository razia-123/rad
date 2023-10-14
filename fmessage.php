
<?php
if(isset($_SESSION['message']))
{
    ?>
    

  
  
    <h4>Congratulations! User info</h4>  <?=$_SESSION['message'];?>
  

  <?php
    unset($_SESSION['message']);
}
