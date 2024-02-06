<?php
$conn = new mysqli("localhost", "root", "", "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .top .bottom {
            height: 150px;
            background-color: bisque;
        }

        .top img {
            width: 100%;
            height: 150px;
        }

        .bottom {
            background-color: rgb(137, 137, 213);
            width: 100%;
            height: 150px;
        }

        .bottom ul {
            margin-top: 20px;
            padding-top: 20px;
            text-align: center;
            /* 文本居中 */
            font-family: Arial, sans-serif;
            /* 设置字体 */
            font-size: 22px;
            /* 设置字号 */
            font-weight: bold;
            /* 设置加粗 */
            color: white;
        }

        body {
            background-image: url("img/registerbgc.jpg");
            background-repeat: no-repeat;
            background-position: center;
        }

        .box {

            display: flex;
            justify-content: center;
            /* 在主轴上居中 */
            align-items: center;
            /* 在交叉轴上居中 */
            height: 100vh;
            /* 用于垂直居中 */
        }

        .boxed {
            background-image: url("img/registerbgc.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            border: 21px solid rgb(104, 119, 126);
            width: 500px;
            height: 300px;
            top: 150px;
            left: 580px;
        }

        .boxed label,
        .boxed p,
        .boxed input[type="text"], 
        .boxed input[type="password"],
        .boxed textarea {
            font-family: Arial, sans-serif;
            font-size: 26px;
        }

        .boxed input[type="submit"] {
            width: 120px;
            height: 40px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #b7c9d7;
        }

        .boxed input[type="submit"] :hover {
            background-color: #59656e;
            /* 设置鼠标悬停时的背景颜色 */
        }
    </style>
</head>

<body>
    <div class="top">
        <img src="img\top2.png" alt="">
    </div>
    <div class="box">
        <div class="boxed" align="center">
                 <h1>Sign in</h1>
            <form method="POST" action="">
                <label>Firstname</label><br>
                <input type="text" name="firstname">
                <br>
                <label>email</label><br>
                <input type="text" name="email">
                <br>
                <label>Password</label><br>
                <input type="password" name="password">
                <br><br>
                <input type="submit" name="LOGIN">
                <br><a href="register.php" target="_blank">New User? </a>
            </form>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // 防止 SQL 注入，建议使用预处理语句
    $stmt = $conn->prepare("SELECT firstname,email,password FROM user_login WHERE firstname = ? AND email = ? AND password = ?");
    $stmt->bind_param("sss", $firstname, $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
// var_dump($result->num_row);die;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password==$row['password']) {
			 // 存储用户名到会话
        $_SESSION['firstname'] = $row['firstname'];
            // 登录成功后重定向到 storyBookWebsite.html 页面
            header("Location: pictureBookWebsite.php");
            exit();
        } else {
            echo "Password incorrect";
        }
    } else {
        echo "User not found";
    } 
}
?>

        </div>
    </div>
    <div class="bottom">
        <ul>
            <li>Made by JiaGuo</li>
            <li>To my son and other kids</li>
        </ul>
    </div>
</body>

</html>
