<?php foreach ($categorys as $categorykey => $categoryvalue): ?>

<?php

  if (isset($_GET['updatecategory']) && $_GET['updatecategory'] ==  $categoryvalue['Id']) {

    $categoryupdatename =  $categoryvalue['Name'];  
    $categoryupdateid =  $categoryvalue['Id'];  

  }

?> 


<?php endforeach; ?>

<?php 

  // dump($categorys[1]);

  // if (isset($_SESSION['error'])) {
  //   dump($_SESSION['error']);
  //   unset($_SESSION['error']);
  // }

?>


<div class="d-flex justify-content-center align-items-center">
  <form class="d-flex align-items-end justify-content-center" method="post" action="">

    <?php if (isset($_GET['updatecategory'])): ?>
      <div class="form-group me-2 hidden">
        <label for="exampleInputEmail1" class="me-2">Id</label>
        <input type="text" class="form-control" id="exampleInputID1" value="<?php echo $categoryupdateid ?>" name="id-update-category" required>
      </div>
      
      <div class="form-group me-2">
        <label for="exampleInputEmail1" class="me-2">Name</label>
        <input type="text" class="form-control" id="exampleInputID1" value="<?php echo $categoryupdatename ?>" name="name-update-category" pattern="^[a-zA-Z\s]+$" title="Only letters and spaces are allowed" required>
      </div>

    <?php else: ?>
      <div class="form-group me-2">
        <label for="exampleInputEmail1" class="me-2">Name</label>
        <input type="text" class="form-control" id="exampleInputID1" name="name-add-category" pattern="^[a-zA-Z\s]+$" title="Only letters and spaces are allowed" required>
      </div>
    <?php endif ?>

    <button type="submit" name="<?php echo (isset($_GET['updatecategory'])) ? 'updatecategory' : 'addcategory'; ?>" class="btn btn-primary"><?php echo (isset($_GET['updatecategory'])) ? 'update' : 'add'; ?></button>
  </form>
</div>


<hr>

<div class="d-flex justify-content-center align-items-center"> 

  <table class="table table-striped w-75">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">category</th>
        <th scope="col">update</th>
      </tr>
    </thead>
    <tbody>
  
      <?php foreach ($categorys as $categorykey => $categoryvalue): ?>
  
        <tr>
          <td><?php echo $categoryvalue['Id'] ?></td>
          <td><?php echo $categoryvalue['Name'] ?></td>
          <!-- updatecategory -->
          <td>
            <a href="/Youdemy/public/index.php/dashboard?section=categorydashboard&updatecategory=<?php echo $categoryvalue['Id']; ?>" 
            class="btn btn-primary btn-sm">
              update
            </a>
          
          </td>
  
  
        </tr>
      <?php endforeach; ?>
  
    </tbody>
  </table>
</div>