<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<?php

// Kết nối CSDL
$conn = mysqli_connect('localhost', 'root', '', 'registeruser') or die('Không thể kết nối tới database');
mysqli_set_charset($conn, 'UTF8');

// Khởi tạo SESSION
session_start();
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}

// Dùng Isset kẻm tra
if (isset($_POST['login'])) {

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    if (!$username || !$password) {
        echo "Nhập đầy đủ thông tin <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Kiểm tra tên đăng nhập có tồn tại không
    $query = "SELECT username, password FROM users WHERE username='$username'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào <b>" . $username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
    $query = "SELECT id, username, email FROM users";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_all($result);
    echo "<div class=\"container mt-5\">
            <div class=\"row\">
                <div class=\"col-8 offset-2\">
                    <table class = \"table\">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach($row as $value) {
                           echo " <tr><td>{$value[0]}</td><td>{$value[1]}</td><td>{$value[2]}</td>\n
                          <td>
                                <form action=\"delete.php?id="; echo "$value[0]
                                \" method='POST'>
                                    <input type=\"hidden\" name=\"id\" value=\""; echo "$value[0] \">
                                    <input class=\"btn btn-sm btn-danger\" type=\"submit\" name=\"submit\" value=\"Delete\">
                                </form>

                                <form class=\"mt-1\" action=\"update.php?id="; echo "$value[0]
                                \" method='POST'>
                                    <input type=\"hidden\" name=\"id\" value=\""; echo "$value[0] \">
                                    <input class=\"btn btn-sm btn-primary\" type=\"submit\" name=\"submit\" value=\"Update\">
                                </form></td>
                            </tr>";
                        };
                    echo "</tbody>
                    </table>
                </div>
            </div>
        </div>";
    die();
    $connect->close();
}

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="header">
                    <h2>Đăng nhập</h2>
                </div>

                <form action='<?php ($_SERVER['PHP_SELF']) ?>' class="dangnhap" method='POST'>
                    <div class="form-group">
                        <label for="username">Tên đăng ký</label>
                        <input type="text" name='username' class="form-control" id="username" placeholder="User Name">
                        <small id="username" class="form-text text-muted">Tên đăng nhập của bạn</small>
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>