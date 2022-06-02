<?php

include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.php'
    
    ?>


      <?php
  
  $sql = 'SELECT  author, title, id FROM books ORDER BY published';
  $result = mysqli_query($conn, $sql);
  $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // print_r($books);

// if($result){
//   $row=mysqli_fetch_assoc($result);
//   echo row ['title'];
// }

  
  ?>

  
    <div class="container" style="margin-top:30px;">
    <table class="table">
    
    <thead class="thead-dark">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Book Title</th>
      <th scope="col">Author</th>
      <th scope="col">Operation</th>
    </tr>
   </thead>
   <?php foreach($books as $book):  ?>
    <tbody>
    <tr>
      <th scope="row"><?php echo htmlspecialchars($book['id']);?></th>
      <td><?php echo htmlspecialchars($book['title']);?></td>
      <td><?php echo htmlspecialchars($book['author']);?></td>
      <td>
        <button class="btn btn-primary "><a class="text-white" href="update.php?id=<?php echo $book['id']; ?>">Update</a></button>
        <button class="btn btn-danger "><a class="text-white" href="delete.php?id=<?php echo $book['id']; ?>">Delete</a></button>
    </td>
    </tr>
  
   </tbody>
   <?php endforeach; ?>
</table>

</body>
</html>