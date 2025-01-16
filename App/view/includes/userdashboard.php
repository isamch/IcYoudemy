<?php

dump($users[1]);


?>



<div class="d-flex flex-column align-items-center mt-4">
  <nav class="navbar navbar-light bg-light d-flex justify-content-between w-100">
    <a class="navbar-brand">Users</a>
    <div>
      <input class="form-control  d-inline-block" type="text" placeholder="Search" style="width: 200px;">
    </div>
  </nav>

  <table class="table table-striped text-center">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Created Date</th>
        <th scope="col">connection Status</th>
        <th scope="col">Account Status</th>
        <th scope="col">Delete/Restore</th>
      </tr>
    </thead>
    <tbody>



      <?php foreach ($users as $keyusers => $valueusers): ?>

        <tr style="font-size: 13px;">
          <td><?php echo $valueusers['Id']; ?></td>
          <td><?php echo $valueusers['Name']; ?></td>
          <td><?php echo $valueusers['Email']; ?></td>
          <td><?php echo $valueusers['Role']; ?></td>
          <td><?php echo date("F j, Y, g:i a", strtotime($valueusers['CreatedAt'])); ?></td>
          <td>
            <?php if($valueusers['connectStatus'] == 'offline'): ?>
              <span style="color: red; font-weight: bold;">offline</span>
            <?php else: ?>
              <span style="color: green; font-weight: bold;">online</span>
            <?php endif; ?>

          </td>
          <td><?php echo $valueusers['accStatus']; ?></td>

          <td>
            <?php if ($valueusers['accStatus'] == 'active'): ?>
              <form method="POST">
                <input type="hidden" name="deactivate-user-id" value="<?php echo $valueusers['Id']; ?>">
                <button class="btn btn-danger btn-sm" type="submit" name="deactivate-user">deactivate</button>
              </form>
              
            <?php else: ?>

              <form method="POST">
                <input type="hidden" name="activate-user-id" value="<?php echo $valueusers['Id']; ?>">
                <button class="btn btn-success btn-sm" type="submit" name="activate-user">activate</button>
              </form>
            <?php endif; ?>
          </td>



        </tr>


      <?php endforeach; ?>


    </tbody>
  </table>