<html>

<head>
  <title>Update User Information</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'registeruser') or die('Không thể kết nối tới database');

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $_POST['id'] . "'");
$row = mysqli_fetch_array($result);
?>


<body>
  <div class="mt-5 container">
    <div class="row">
      <div class="col-8 offset-2">
        <div>
          <h2>Edit User</h2>
        </div>
        <form name="userForm" method='POST' action="save.php?id= <?php echo "$value[0]"; ?>">
          Username: <br>
          <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
          <input type="text" name="username" class="form-control"  value="<?php echo $row['username']; ?>">
          <br>
          Email:<br>
          <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
          <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
          <br>
          Password:<br>
          <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
          <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
          <br>
          <input type="submit" class="form-control btn-success"  name="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>