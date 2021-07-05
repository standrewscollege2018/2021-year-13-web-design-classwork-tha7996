
<div class="container-fluid account-navbar">
  <div class="row">
    <a href="index.php?page=home" class='col-1'><h3><</h3></a>
    <h3 class='col'>Account</h3>
    <!-- this centers the middle column -->
    <h3 class='col-1'></h3>
  </div>
</div>

<div class="account-content-container">
  <h4>Welcome, <?php echo $_SESSION['user_name'] ?></h4>
  <img src="images/icons/user.png" alt="User Icon">
  <p>To view or edit your profile details (including your password), please navigate to our website.</p>
  <a href="index.php?page=logout">Logout</a>
</div>
