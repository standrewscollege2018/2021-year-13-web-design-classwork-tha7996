<div class="body p-3">

  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">
      Sorry! That tutor code is already used
    </div>
  <?php endif; ?>



  <form class="" action="index.php?page=addtutor" method="post">

    <div class="form-group">
      <label for="1">Enter tutor name:</label>
      <input type="text" class="form-control" id="1" required name="tutorname">
    </div>

    <div class="form-group">
      <label for="2">Enter tutor code:</label>
      <input type="text" class="form-control" id="2" maxlength='3' style="text-transform:uppercase" required name="tutorcode">
    </div>

    <button type="submit" class="btn btn-primary" name="button">Add Tutor</button>

  </form>

</div>
