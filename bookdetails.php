<?php
include 'config.php';
// check GET request id parameter
if(isset($_GET['id'])){

$id = mysqli_real_escape_string($conn, $_GET['id']);

// make sql
$sql = "SELECT * FROM books WHERE id = $id";

// get query result
// $result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);

// fetch result in array format
$book = mysqli_fetch_assoc($result);
// print_r($book);

}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
?>
    <div class="container">
              
        <div class="row" >
        <?php if($book): ?> 
            <div class="col-lg-6 col-md-4">
                <!-- Card section -->
                        <div class="card" >

                        <img src="image/<?php echo $book['cover']; ?>" style="height:65vh;">
                        <div class="container">
                        <h3 ><?php echo htmlspecialchars($book['title']);?></h3> 
                        <p ><strong>By: <?php echo htmlspecialchars($book['author']);?></strong></p>
                        <p >Published: <?php echo htmlspecialchars($book['published']);?></p>
                        <!-- <a href="bookdetails.php?id=<?php echo $book['id']; ?>">   <button type="button" class="btn btn-primary">More Info</button></a> -->
                    </div>
                    </div>

                    
            </div>
            <div class="col-lg-6 col-md-4" style="color:white;">
                        <h2 style="margin-top:15px; color:yellow;">About the Book: <?php echo htmlspecialchars($book['title']);?></h2>
                        <p style="font-size:20px;"><?php echo htmlspecialchars($book['content']);?></p>
                    </div>
            <?php else: ?>
            <?php endif;?>
        </div>
            
    </div>
</body>
</html>