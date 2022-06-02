<?php


    include 'config.php';
    

// write query for all books
$sql = 'SELECT cover, author, title, published, content, id FROM books ORDER BY published';

//make query and get results
$result = mysqli_query($conn, $sql);

// fetch the resulting row as an array
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
// mysqli_free_result($conn);

// close connection
// mysqli_close($conn);

// print_r($books);
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.php'
    
    ?>
<div class="container">
<div class="row">
  


    <?php foreach($books as $book):  ?>
        <div class="col-lg-3 col-md-4">
            <div class="card " id="card-box" style="height:55vh; box-sizing:border-box;">
            <img src="image/<?php echo $book['cover']; ?>" style="width:100% ; height:25vh" alt="image" >
            <div class="container">
             <h5 style="height:7vh; box-sizing:border-box;"><?php echo htmlspecialchars($book['title']);?></h5> 
             <p ><strong>By: <?php echo htmlspecialchars($book['author']);?></strong></p>
            <p >Published: <?php echo htmlspecialchars($book['published']);?></p>
            <a href="bookdetails.php?id=<?php echo $book['id']; ?>">   <button type="button" class="btn" style="background-color:#45a049; color:white;">More Info</button></a>
         </div>
        </div>
        </div>
                <?php endforeach; ?>

            

       
           

            

            


</div>
</div>

    
</body>
</html>