<?php include('./includes/menu.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

<div class="container">
  <div class="row">
    <h1>Users</h1>
  </div>
  <div class="row">
    <div class="col">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="col-auto">#</th>
            <th scope="col" class="col-auto">Name</th>
            <th scope="col" class="col-auto">Password</th>
            <th scope="col" class="col-auto">Email</th>
            <th scope="col" class="col-1"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $key => $user): ?>
            <tr>
              <th scope="row">
                <?php echo $user->id_user ?>
              </th>
              <td>
                <?php echo $user->name_user ?>
              </td>
              <td>
                <?php echo $user->pword_user ?>
              </td>
              <td>
                <?php echo $user->email_user ?>
              </td>
              <td>
                <p class="d-inline-flex gap-1">
                  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Options
                  </a>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body" style="width: auto;">
                    <a href="" class="btn btn-outline-
                    ."><i class="bi bi-pencil"></i></a>
                    <a href="" class="btn btn-outline-
                    ."></a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</html>