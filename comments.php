<?php
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comments</title>
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

        .box {
            overflow: hidden;
            width: 1478px;
            height: 1230px;
            margin: 10px auto;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        .left {
            float: left;
            width: 234px;
            height: 615px;
            background-color: palegreen;
        }

        .left img {
            width: 100%;
            height: 100%;
        }

        .left :hover {
            border: 10px dotted cyan;
        }

        .right {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            width: 1020px;
            /* height: 615px; */
            background-color: #f5f5f5;
        }

        menu {
            list-style-type: none;
            /* 移除列表项的默认标记 */

        }

        .right>div {
           display: flex;
            align-items: center;
            width: 1000px;
            height: 100px;
            background-color: lightgrey;
            margin-left: 14px;
            margin-bottom: 14px;
        }
         .right img{
            width: 150px;
            height: 100px;
            margin-right: 20px;
        }
         .right p{
           text-align: center; /* 文本居中 */
            font-family: Arial, sans-serif; /* 设置字体 */
             font-size: 16px; /* 设置字号 */
             font-weight: bold; /* 设置加粗 */
             color:gray;
        }
        #reviewBox {
            width: 150px;
            height: 100px;
            background-color: lightblue;

        }
         #inputBox {
        width: 420px;
        height: 120px;
        border-radius: 8px; /* 圆角 */
         background-image: linear-gradient(to bottom, #444444, #999999); /* 灰黑渐变底色 */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* 外阴影 */
        }
 
         #comment{
            margin-top: 2px;
            width: 420px;
            height:50px;
        
         }
        #inputBox button {
            float:right;
            border: none; /* 移除边框 */
            border-radius: 4px; /* 圆角 */
            padding: 8px 16px; /* 按钮内边距 */
            background-color: #333333; /* 背景颜色 */
            color:white;
            cursor: pointer; /* 光标样式 */
        }


        
        li:hover {
            box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, .3);
        }

        #bottom {
            width: 100%;
            height: 90px;
            background-color: cadetblue;
            margin: 10px auto;
        }

        #mainmenu {
            grid-area: menubar;
            margin-bottom: 0;
            padding: 10px;
        }

        #mainmenu>li {
            background-color: #ffffff;
            display: inline-block;
            padding: 10px;
        }

        #mainmenu>li::before {
            content: " | ";
        }

        #mainmenu>li:first-of-type::before {
            content: "";
        }

        #mainmenu menu {
            display: none;
            background: #eee;
            position: absolute;
        }

        #mainmenu>li:hover menu {
            display: block;
            list-style-type: none;
            padding: 0;
        }

        #mainmenu>li menu li:hover {
            background: #efe;
        }

        #mainmenu>li menu li a {
            display: block;
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
            /* 设置字体颜色为白色 */
        }
    </style>
</head>

<body>
    <div class="top">
        <img src="img\top2.png" alt="">
    </div>
   <menu id="mainmenu">
        <li>
            <a href="pictureBookWebsite.php">Home</a>
        </li>
         <li id = "comments">
             <a href="comment.php">Comments</a>
        </li>
        <li>
            <a href="connectUs.html">Connect Us</a>
        </li>
    </menu>
    <div class="box">
        <div class="left">
            <img src="img\left.jpg" alt="">
        </div>
        
   <div class="right">

<div id="inputBox">
    <!-- <label for="bookname">Choose bookname:</label> -->
    <form method="post" action="">
    <select name="bookList" id="bookList">
<?php
 // 查询数据库获取所有的 pdfname
        $sql = "SELECT pdfname FROM storybook";
        $result = $conn->query($sql);

        // 生成下拉选择框的选项
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['pdfname'] . "'>" . $row['pdfname'] . "</option>";
            }
             } else {
            echo "<option value=''>No books found</option>";
        }
        ?>
    </select>
        <br>
        <textarea name="comment" id="comment" placeholder="Enter your comment"></textarea>
         <br>
        <button type="submit" name="submitReview" id="submitReview">Leave a Review</button>
        </form>
</div> 
<!-- 读取select的名字，将对应的imgname和comment放入数据库储存 -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST['submitReview'])) {
            $selectedBook = $_POST['bookList'];
            $comment = $_POST['comment'];
            // 查询对应的 imgname
            $sqlImgName = "SELECT imgname FROM storybook WHERE pdfname = '$selectedBook'";
            $resultImgName = $conn->query($sqlImgName);

            if ($resultImgName->num_rows > 0) {
                $rowImgName = $resultImgName->fetch_assoc();
                $imgname = $rowImgName['imgname'];
                // 将数据插入到 storybookcommit 数据库中
                $sqlInsert = "INSERT INTO storybookcommit (imgname, commit) VALUES ('$imgname', '$comment')";

                if ($conn->query($sqlInsert) === TRUE) {
                    echo "Review submitted successfully.";
                } else {
                    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                }
           } else {
                echo "No imgname found for selected book.";
            }
        }
    }
?>
<?php
// 显示所有已经储存的评论信息

$sql = "SELECT s.pdfname, s.imgname, sc.commit
        FROM storybook s
        JOIN storybookcommit sc ON s.imgname = sc.imgname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdfname =  $row['pdfname'];
        $imgname = $row['imgname'];
        $comment = $row['commit'];

        echo "<div class='reviewBox'>";
        echo "<img src='img/$imgname.png' alt='Book Cover'>";
        echo "<h4>xxx comment to $pdfname :</h4>";
        echo "<p>$comment</p>";
        echo "</div>";
    }
} else {
    echo "No results found.";
}
$conn->close();
?>

    </div>
    <div class="bottom">
        <ul>
            <li>Made by JiaGuo</li>
            <li>To my son and other kids</li>
        </ul>
    </div>
   
</body>

</html>