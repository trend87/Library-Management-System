<?php

include 'config.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    // $sql='DELETE id FROM books';
    $sql = "DELETE FROM books WHERE id='$id'";
    // $sql = "DELETE FROM books WHERE `books`.`id` = ";

    $result = mysqli_query($conn, $sql);

    if($result){
        // echo 'Successfully deleted';
        header('location:dashboard.php');
    }else{
        die(mysqli_error($conn));
    }


}
   

   
   
?>