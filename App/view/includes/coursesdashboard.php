<?php

// dump($title);

// dump($totalPages);
// dump($courses[1]);

// dump($categorys[1]);
// dump($_SESSION['user']);

?>




<div class="d-flex flex-column align-items-center mt-4">
   <nav class="navbar navbar-light bg-light d-flex justify-content-between w-100">
      <a class="navbar-brand">Navbar</a>
      <div>
         <input class="form-control  d-inline-block" type="text" placeholder="Search" style="width: 200px;">
         <button class="btn btn-primary" id="toggleform-course" type="button" data-bs-toggle="modal" data-bs-target="#modalAddCourse">Add Courses</button>
      </div>
   </nav>

   <table class="table table-striped text-center">
      <thead>
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Teacher</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Enrolled</th>
            <th scope="col">Status</th>
            <th scope="col">Delete/Restore</th>
            <th scope="col">Update</th>
         </tr>
      </thead>
      <tbody>



         <?php foreach ($courses as $keycourse => $valuecourses): ?>


            <?php

            if (isset($_GET['updatecourse']) && $valuecourses['CourseID'] == $_GET['updatecourse']) {
               $CourseID = $valuecourses['CourseID'];
               $TeacherName = $valuecourses['TeacherName'];
               $CourseTitle = $valuecourses['CourseTitle'];
               $CourseDescription = $valuecourses['CourseDescription'];
               $CourseDate = $valuecourses['CourseDate'];
               $Category = $valuecourses['Category'];
               $tagsarrays = explode(",", $valuecourses['Tags']);
               $tags = implode(" ", $tagsarrays);
            }

            ?>

            <?php if ($_SESSION['user']['Role'] == 'admin' || $_SESSION['user']['Name'] == $valuecourses['TeacherName']): ?>


               <tr style="font-size: 13px;">
                  <td><?php echo $valuecourses['CourseID']; ?></td>
                  <td><?php echo $valuecourses['TeacherName']; ?></td>
                  <td><?php echo $valuecourses['CourseTitle']; ?></td>
                  <td><?php echo $valuecourses['CourseDescription']; ?></td>
                  <td><?php echo date("F j, Y, g:i a", strtotime($valuecourses['CourseDate'])); ?></td>
                  <td><?php echo $valuecourses['Category']; ?></td>
                  <td><?php echo $valuecourses['Tags']; ?></td>


                  <td>
                     <select
                        class="form-select text-center shadow rounded border"
                        style="width: 80px;"
                        onfocus="this.classList.add('w-auto');"
                        onblur="this.classList.remove('w-auto');">
                        <option class="text-center " selected>
                           <?php echo $valuecourses['StudentCount']; ?>
                        </option>
                        <?php foreach (explode(",", $valuecourses['StudentNames']) as $studentName): ?>
                           <option class="text-center" disabled>
                              <?php echo $studentName; ?>
                           </option>
                        <?php endforeach; ?>
                     </select>
                  </td>

                  <td><?php echo $valuecourses['StatusDisplay']; ?></td>

                  <td>
                     <?php if ($valuecourses['StatusDisplay'] == 'active'): ?>
                        <form method="POST">
                           <input type="hidden" name="delete-course-id" value="<?php echo $valuecourses['CourseID']; ?>">
                           <button class="btn btn-danger btn-sm" type="submit" name="delete-course">Delete</button>
                        </form>
                     <?php else: ?>

                        <form method="POST">
                           <input type="hidden" name="restore-course-id" value="<?php echo $valuecourses['CourseID']; ?>">
                           <button class="btn btn-success btn-sm" type="submit" name="restore-course">Restore</button>
                        </form>
                     <?php endif; ?>
                  </td>

                  <?php if ($_SESSION['user']['Role'] == 'admin'): ?>
                     <td>
                        <a href="/Youdemy/public/index.php/dashboard?<?php echo isset($_GET['page-nbr']) ? "page-nbr=" . $_GET['page-nbr'] . "&" : ''; ?>updatecourse=<?php echo $valuecourses['CourseID']; ?>"
                           class="btn btn-primary btn-sm">
                           Update
                        </a>
                     </td>
                  <?php endif; ?>


               </tr>

            <?php endif; ?>

         <?php endforeach; ?>


      </tbody>
   </table>



   <nav aria-label="Page navigation example">
      <ul class="pagination">


         <li class="page-item">
            <?php if (isset($_GET['page-nbr']) && $_GET['page-nbr'] > 1): ?>
               <a href="/Youdemy/public/index.php/dashboard?page-nbr=<?= htmlentities($_GET['page-nbr'] - 1) ?>" class="page-link  text-black" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
               </a>
            <?php else: ?>
               <a class="page-link  text-black" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
               </a>
            <?php endif; ?>
         </li>



         <?php for ($count = 1; $count <= $totalPages; $count++): ?>

            <li class="page-item">
               <a class="page-link text-black" href="/Youdemy/public/index.php/dashboard?page-nbr=<?= htmlentities($count) ?>""><?= htmlentities($count) ?></a>
            </li>

         <?php endfor; ?>



         <li class=" page-item">
                  <?php if (isset($_GET['page-nbr']) && $_GET['page-nbr'] >= $totalPages): ?>


                     <a class="page-link  text-black" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                     </a>

                  <?php else: ?>
                     <a href="/Youdemy/public/index.php/dashboard?page-nbr=<?= htmlentities(isset($_GET['page-nbr']) ? $_GET['page-nbr'] + 1 : 2) ?>" class="page-link  text-black" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                     </a>

                  <?php endif; ?>


            </li>

      </ul>
   </nav>

</div>





<!-- Modal Trigger Button -->
<button id="toggleform" type="button" class="btn btn-primary invisible" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Launch Modal
</button>



<!-- 

$CourseID = $valuecourses['CourseID'];
$TeacherName = $valuecourses['TeacherName'];
$CourseTitle = $valuecourses['CourseTitle'];
$CourseDescription = $valuecourses['CourseDescription'];
$CourseDate = $valuecourses['CourseDate'];
$Category = $valuecourses['Category'];
$tagsarrays = explode(",", $valuecourses['Tags']);
$tags = implode(" ", $tagsarrays); -->


<!-- update-course-id
update-course-title
update-course-description
update-course-tags
update-course-category -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Use modal-lg for large modals -->
      <div class="modal-content">


         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Courses</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <div class="modal-body">
            <form id="modalForm" method="POST">

               <input type='hidden' name='update-course-id' value='<?php echo $CourseID ?>'>

               <div class="mb-3">
                  <label for="field1" class="form-label">Title</label>
                  <input type="text" class="form-control" id="field1" value="<?php echo $CourseTitle ?>" name="update-course-title">
               </div>

               <div class="mb-3">
                  <label for="field1" class="form-label">Description</label>
                  <input type="text" class="form-control" id="field1" value="<?php echo $CourseDescription ?>" name="update-course-description">
               </div>

               <div class="mb-3">
                  <label for="field1" class="form-label">Tags</label>
                  <input type="text" class="form-control" id="field1" value="<?php echo $tags ?>" name="update-course-tags">
               </div>

               <div class="mb-3">
                  <label for="field2" class="form-label">Category</label>
                  <select class="form-control" id="field2" name="update-course-category">

                     <?php foreach ($categorys as $category): ?>
                        <option value="<?php echo $category['Id'] ?>"><?php echo $category['Name'] ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>



               <div class="modal-footer">
                  <button type="submit" name="update-course" class="btn btn-primary" form="modalForm">Update</button>
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
         width: 100% !important;
      }
   }
</style>



<?php if (isset($_GET['updatecourse'])): ?>

   <script>
      setTimeout(() => {
         let btn = document.querySelector('#toggleform');
         btn.click();
      }, 500);
   </script>

<?php endif; ?>




<!-- INSERT INTO Courses (Title, Description, TeacherID, CategoryID) VALUES -->
<!-- ('C Programming Basics', 'Learn the fundamentals of C programming.', 2, 1), -->


<!-- Modal Trigger Button -->
<!-- <button id="toggleform-course" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
   Launch Modal
</button> -->

<!-- Modal Add Courses -->
<div class="modal fade" id="modalAddCourse" tabindex="-1" aria-labelledby="modalAddCourseLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Use modal-lg for large modals -->
      <div class="modal-content">

         <div class="modal-header">
            <h5 class="modal-title" id="modalAddCourseLabel">Add Courses</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <div class="modal-body">
            <form id="formAddCourse" method="POST">

               <div class="mb-3">
                  <label for="courseTitle" class="form-label">Title</label>
                  <input type="text" class="form-control" id="courseTitle" name="add-course-title">
               </div>

               <div class="mb-3">
                  <label for="courseDescription" class="form-label">Description</label>
                  <input type="text" class="form-control" id="courseDescription" name="add-course-description">
               </div>

               <div class="mb-3">
                  <label for="courseTags" class="form-label">Tags</label>
                  <input type="text" class="form-control" id="courseTags" name="add-course-tags">
               </div>

               <div class="mb-3">
                  <label for="courseCategory" class="form-label">Category</label>
                  <select class="form-control" id="courseCategory" name="add-course-category">
                     <?php foreach ($categorys as $category): ?>
                        <option value="<?php echo $category['Id'] ?>"><?php echo $category['Name'] ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

               <div class="modal-footer">
                  <button type="submit" name="add-course" class="btn btn-primary" form="formAddCourse">Update</button>
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
         width: 100% !important;
      }
   }
</style>
