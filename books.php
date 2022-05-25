<?php


    include 'config.php';
    

// write query for all books
$sql = 'SELECT cover, author, title, published, id FROM books ORDER BY published';

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
            <div class="card " >
            <img src="librarysystem.jpg" alt="Avatar" style="width:100%">
            <div class="container">
             <h4 ><?php echo htmlspecialchars($book['title']);?></h4> 
             <p ><strong><?php echo htmlspecialchars($book['author']);?></strong></p>
            <p >Published: <?php echo htmlspecialchars($book['published']);?></p>
            <a href="bookdetails.php?id=<?php echo $book['id']; ?>">   <button type="button" class="btn btn-primary">More Info</button></a>
         </div>
        </div>
        </div>
                <?php endforeach; ?>

            

       
           

            

            


</div>
</div>

    
</body>
</html>