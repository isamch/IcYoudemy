
  <!-- ============== alerts : ============== -->
  <?php if(isset($_SESSION['error']['add_post'])): ?>
    <!-- alerts errors -->
    <div class="alerts">
      <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
          <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
          <?php echo 'Error : '. $_SESSION['error']['add_post'] ?>
        </div>
      </div>
    </div>
    <?php unset($_SESSION['error']['add_post']); ?>
  <?php endif; ?>


  <?php if(isset($_SESSION['success']['add_post'])): ?>
    <!-- alerts succes -->
    <div class="alerts">
      <div class="alert alert-success  d-flex align-items-center justify-content-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
          <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
          <?php echo 'success : '. $_SESSION['success']['add_post'] ?>
        </div>
      </div>
    </div>

    <?php unset($_SESSION['success']['add_post']); ?>
  <?php endif; ?>


  <?php if(isset($_SESSION['error']['update_post'])): ?>
    <!-- alerts errors -->
    <div class="alerts">
      <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
          <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
          <?php echo 'Error : '. $_SESSION['error']['update_post'] ?>
        </div>
      </div>
    </div>

    <?php unset($_SESSION['error']['update_post']); ?>
  <?php endif; ?>

  <?php if(isset($_SESSION['success']['update_post'])): ?>
    <!-- alerts succes -->
    <div class="alerts">
      <div class="alert alert-success  d-flex align-items-center justify-content-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
          <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
          <?php echo 'success : '. $_SESSION['success']['update_post'] ?>
        </div>
      </div>
    </div>

    <?php unset($_SESSION['success']['update_post']); ?>
  <?php endif; ?>
