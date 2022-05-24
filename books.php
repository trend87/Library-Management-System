<?php


    include 'config.php';
    

// write query for all books
$sql = 'SELECT cover, author, title, published FROM books ORDER BY published';

//make query and get results
$result = mysqli_query($conn, $sql);

// fetch the resulting row as an array
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
// mysqli_free_result($conn);

// close connection
// mysqli_close($conn);

print_r($books);
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.php'
    
    ?>
<div class="container">
<div class="row">
        <?php foreach($books as $book):  ?>
            <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($book['title']);?></h5>
                <p class="card-text"><?php echo htmlspecialchars($book['author']);?></p>
                <p class="card-text"><?php echo htmlspecialchars($book['published']);?></p>
                
                <a href="#" class="btn btn-primary">View more</a>
            
                <?php endforeach; ?>
            </div>
            </div>

           
            

            


</div>
</div>

    
</body>
</html>