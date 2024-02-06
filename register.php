<?php
  $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// 获取 POST 请求中的表单数据
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];


$sql = "INSERT INTO user_login (firstname, lastname, email, password, dob, sex)
        VALUES ('$firstname', '$lastname', '$email', '$password', '$dob', '$sex')";


if ($conn->query($sql) === TRUE) {
    // 数据库插入成功后重定向到另一个页面
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .box {

            display: flex;
            justify-content: center;
            /* 在主轴上居中 */
            align-items: center;
            /* 在交叉轴上居中 */
            height: 100vh;
            /* 用于垂直居中 */
        }

        .reg {
            background-image: url("img/registerbgc.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            border: 21px solid rgb(104, 119, 126);
            width: 800px;
            height: 600px;
            top: 150px;
            left: 580px;
        }

        .reg label,
        .reg input[type="text"],
         input[type="reset"],
        input[type="password"],
         input[type="date"],
         input[type="radio"],
         input[type="submit"],
        .reg textarea {
            font-family: Arial, sans-serif;
            font-size: 26px;
        }

        .reg input[type="submit"],input[type="reset"]{
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

        .reg input[type="submit"],
        input[type="reset"]:hover {
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
        <div class="reg" align="center">
            <form name="myform" method="POST" action="">
                <h1>
                    <center>Register Here</center>
                </h1><br /><br><br /><br>
                <label for="firstname">FirstName</label>
                <input type="text" name="firstname" required><br /><br>

                <label for="lastname">LastName</label>
                <input type="text" name="lastname" required><br /><br>

                <label for="email">Email</label>
                <input type="text" name="email" id="txtEmail"><br><br>

                <label for="password">Password</label>
                <input type="password" name="password" id="pass1" required><br><br>

                <label for="password">Confirm Password</label>
                <input type="password" name="cpassword" id="pass2" onkeyup="checkPass(); return false;">
                <span id="confirmMessage" class="confirmMessage"></span><br><br>

                <label for="password">Date of Birth</label>
                <input type="date" name="dob" value="1970-01-01"><br><br>

                <label for="gender">Gender</label>
                <input type="radio" name="sex" value="male"> Male
                <input type="radio" name="sex" value="female"> Female<br><br>

                <input type="submit" value="Register" onclick="checkEmail">
                <input type="reset">
            </form>
        </div>
    </div>

 <div class="bottom">
        <ul>
            <li>Made by JiaGuo</li>
            <li>To my son and other kids</li>
        </ul>
    </div>
    <script type="text/javascript">
        function checkPass() {
            var pass1 = document.getElementById('pass1');
            var pass2 = document.getElementById('pass2');
            var message = document.getElementById('confirmMessage');

            var goodColor = "#66cc66";
            var badColor = "#ff6666";

            if (pass1.value == pass2.value) {

                pass2.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match!"
            } else {

                pass2.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match!"
            }
        }

        function checkEmail() {

            var email = document.getElementById('txtEmail');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email.value)) {
                alert('Please provide a valid email address');
                email.focus;
                return false;
            }
        }

    </script>
</body>

</html>