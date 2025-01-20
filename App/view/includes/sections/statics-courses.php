
<?php 

  // dump($totalCourses);

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<div class="container py-5">
  <div class="row row-cols-1 row-cols-md-2 g-4">
    
    <div class="col">
      <div class="card h-100 text-center shadow">
        <div class="card-body">
          <div class="display-4 text-success mb-2">
            <i class="bi bi-book-half"></i>
          </div>
          <h2 class="card-title mb-3"><?= htmlspecialchars($totalCourses); ?></h2>
          <p class="card-text text-muted">Total Courses</p>
        </div>
      </div>
    </div>
    
    <div class="col">
      <div class="card h-100 text-center shadow">
        <div class="card-body">
          <div class="display-4 text-warning mb-2">
            <i class="bi bi-book-fill text-success"></i>
          </div>
          <h2 class="card-title mb-3"><?= htmlspecialchars($totalCoursesActive); ?></h2>
          <p class="card-text text-muted">Active Courses</p>
        </div>
      </div>
    </div>
   
  </div>
</div>