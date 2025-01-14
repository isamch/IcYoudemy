<?php

  // dump($postes);

?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">author</th>
      <th scope="col">content</th>
      <th scope="col">category</th>
      <th scope="col">tags</th>
      <th scope="col">url</th>
      <th scope="col">status</th>
      <th scope="col">delete</th>
      <th scope="col">update</th>
    </tr>
  </thead>
  <tbody>

      <tr>
        <td>s</td>
        <td>atd>
        <td>atd>
        <td>atd>
        <td>tags</td>
        <td>tags</td>
        <td>tags</td>

   
        <td>
            <form method='POST' action='/brief10/public/index.php/dashboard?section=postedashboard'>
              <input type='hidden' name='idrestoreposte' value=''>
              <button class="btn btn-success btn-sm" name="restoreposte" type='submit'>restore</button>
            </form>

            <form method='POST' action='/brief10/public/index.php/dashboard?section=postedashboard'>
              <input type='hidden' name='iddeleteposte' value=''>
              <button class="btn btn-danger btn-sm" name="deleteposte" type='submit'>delete</button>
            </form>

        </td>
        <td>

          <a href="/brief10/public/index.php/dashboard?section=postedashboard&updateposte=" class="btn btn-primary btn-sm">update</a>

        </td>


      </tr>


  </tbody>
</table>




<!-- Modal Trigger Button -->
<button id="toggleform" type="button" class="btn btn-primary invisible" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch Modal
</button>


<!-- 
$content = $postvalue['content'];
          $name = $postvalue['name'];
          $tags = $postvalue['tags'];
          $url = $postvalue['url']; -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Use modal-lg for large modals -->
    <div class="modal-content">


      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Courses</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="modalForm" method="POST" action="/brief10/public/index.php/dashboard">
        
          <input type='hidden' name='updateid' value=''>

          <div class="mb-3">
            <label for="field1" class="form-label">content</label>
            <input type="text" class="form-control" id="field1" value="" name="updatecontent">
          </div>

          <div class="mb-3">
            <label for="field1" class="form-label">url</label>
            <input type="text" class="form-control" id="field1" value="" name="updateurl">
          </div>


          <div class="mb-3">
            <label for="field2" class="form-label">Category</label>
            <select class="form-control" id="field2" name="updatecategory">
                <option value="1">1</option>
                <option value="1">1</option>
            </select>
          </div>


          
          <div class="modal-footer">
            <button type="submit" name="updateposte" class="btn btn-primary" form="modalForm">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  @media screen and (min-width: 768px) {
    .show {
      width: 100%;
    }
  }
</style>



<!-- 
  <script>
    setTimeout(() => {
      let btn = document.querySelector('#toggleform');
      btn.click();
    }, 500);
  </script> -->
