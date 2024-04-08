<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập bằng session
if(isset($_SESSION['user']) && $_SESSION['user'] === 'admin') {
    echo "Bạn đã đăng nhập với tư cách là Admin!";
} elseif(isset($_COOKIE['user']) && $_COOKIE['user'] === 'user') {
    echo "Bạn đã đăng nhập với tư cách là Người dùng!";
} else {
    echo "Bạn chưa đăng nhập!";
}

// Nếu người dùng là admin, lưu thông tin đăng nhập vào session và thiết lập thời gian hết hạn cho session
if(isset($_GET['login']) && $_GET['login'] === 'admin') {
    $_SESSION['user'] = 'admin';
    $_SESSION['expire'] = time() + 86400; // 86400 giây = 1 ngày
    echo "Bạn đã đăng nhập với tư cách là Admin!";
}

// Nếu người dùng là user, lưu thông tin đăng nhập vào cookie và thiết lập thời gian hết hạn cho cookie
if(isset($_GET['login']) && $_GET['login'] === 'user') {
    setcookie('user', 'user', time() + 1296000); // 1296000 giây = 15 ngày
    echo "Bạn đã đăng nhập với tư cách là Người dùng!";
}

// Xóa session và cookie khi người dùng đăng xuất
if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    setcookie('user', '', time() - 3600); // Hủy cookie bằng cách đặt thời gian hết hạn trong quá khứ
    echo "Bạn đã đăng xuất!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<form action="action_page.php" method="post">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <button type="submit">Login</button>
    <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
</form>

<body>

</body>

</html>