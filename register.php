<?php
$conn = mysqli_connect("localhost", "root", "", "registeruser") or die($conn);

if (isset($_POST['registerBtn'])) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
  echo 'Đăng ký thành công!';
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration PHP và MySQL</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-8 offset-2">
        <div class="header">
          <h2>Đăng ký thành viên</h2>
        </div>

        <form method="POST" action="<?php ($_SERVER['PHP_SELF']) ?>">
          <div class="form-group">
            <label for="username">Tên đăng ký</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter User">
            <small id="username" class="form-text text-muted">Tên đăng nhập của bạn</small>
          </div>

          <div class="form-group">
            <label for="email">Tên đăng ký</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
            <small id="email" class="form-text text-muted">Email của bạn</small>
          </div>

          <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary" name="registerBtn">Đăng ký</button>
        </form>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>