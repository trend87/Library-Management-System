<?php

include 'config.php';

$content = $author = $title = $cover = '';
$errors = array('cover'=>'','author'=>'','title'=> '','content'=> '');

if(isset($_POST['submit'])){
  $cover=$_FILES['cover']['name'];
  $tmp_name = $_FILES['cover']['tmp_name'];
  $destination ="image/".$cover;
  move_uploaded_file($tmp_name, $destination);

  
    // if(empty($_POST['cover'])){
    //     $errors ['cover'] =  "A book cover is required <br>";
    // }else{
    //     $cover = $_POST['cover'];
    //     if(!preg_match('/^[a-zA-Z\s]+$/',$cover)){
    //       $errors ['cover'] = "Cover must be typed in letters only";
    //     }
    // }
    
    // check cover
    if(empty($_POST['author'])){
        $errors ['author'] = "Author name is required <br>";
    }else{
        $author = $_POST['author'];
        // if(!preg_match('/^[a-zA-Z\s]+$/',$author)){
        //     $errors ['author'] = "author name must be typed in letters only";
        // }
    }
    // check cover
    if(empty($_POST['content'])){
      $errors ['content'] = "About book is required <br>";
      }else{
      $content = $_POST['content'];
      // if(!preg_match('/^[a-zA-Z\s]+$/',$content)){
      //     $errors ['content'] = "about book must be typed in letters only";
      // }
  }
    
    // check cover
    if(empty($_POST['title'])){
        $errors ['title'] =  "Book title is required <br>";
    }else{
        $title = $_POST['title'];
        // if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        //     $errors ['title'] = "title must be typed in letters only";
        // }
    }
    if(array_filter($errors)){
        // echo "form is valid";
        } else {
            // echo "errors in the form";
            
            header("Location: books.php");
        }
        $sql = "INSERT INTO books (cover, author, title, content)
        VALUES ('$cover','$author','$title','$content')";
        
        if (!mysqli_query($conn,$sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
        
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Boostrap V4/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-secondary">
<div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark " >
    
          <a class="navbar-brand text-white " href="index.php"><span class="title">Dashboard</span></a>
<!--     
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
            <ul class="navbar-nav ml-auto display-5">
              <li class="nav-item">
                <a class="nav-link text-white links" href="books.php">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white links" href="#resume">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white links" href="#skills">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#contact"> Contact</a>
              </li>
              </ul> -->
    
          </div>
          <div class="form-container">
          <form action="add.php" method="post" enctype="multipart/form-data">
             
             <div class="form-group">
               <label >Book Cover</label>
               <input type="file" class="form-control" name="cover">               
               <div class="text-warning ">
                   <?php
                        echo $errors['cover'];
                    ?>
               </div>
             </div>
             <!--  -->
             <div class="form-group">
               <label >Author</label>
               <input type="text" class="form-control" name="author" value="<?php echo htmlspecialchars ($author)?>"required> 
               <div class="text-warning">
                   <?php
                        echo $errors['author'];
                    ?>
               </div>            
            </div>
            <!--  -->
             <div class="form-group">
               <label >Book Title</label>
               <input type="text" class="form-control" name="title"value="<?php echo htmlspecialchars ($title)?>"required>    
               <div class="text-warning">
                   <?php
                        echo $errors['title'];
                    ?>
               </div>         
            </div>
            <!--  -->
            <div class="form-group">
               <label >About Book</label>
               <!-- <input type="text" class="form-control" name="content"value="<?php //echo htmlspecialchars ($content)?>"required>     -->
               <textarea class="form-control" name="content" rows="4" cols="50"><?php echo htmlspecialchars ($content)?></textarea>
  <br>
               <div class="text-warning">
                   <?php
                        echo $errors['content'];
                    ?>
               </div>         
            </div>
               <input type="submit" name="submit" value="submit" class="btn btn-primary">
           </form>


</div>


        </body>
</html>