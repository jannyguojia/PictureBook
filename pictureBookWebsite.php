<?php
session_start();
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
    <title>Picture Book website</title>
    <link rel="stylesheet" type="text/css" href="bookstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>


<body>
    <div class="top">
        <img src="img\top2.png" alt="">
    </div>
    <menu id="mainmenu">
        <li>
            <a href="pictureBookWebsite.php">Home</a>
        </li>
        <li id="year1_2">
            Year1-2
            <menu>
                <li class = "year12pic">Picture Book</a></li>
                <li class = "year12act">Activity Book</a></li>
            </menu>
        </li>
        <li id="year2_3">
            Year2-3
            <menu>
                <li class = "year23pic">Picture Book</a></li>
                <li class = "year23act">Activity Book</a></li>
            </menu>
        </li>

        <li id="year3_4">
            Year3-4
            <menu>
               <li class = "year34pic">Picture Book</a></li>
                <li class = "year34act">Activity Book</a></li>
            </menu>
        </li>
         <li id = "comments">
             <a href="comments.php">Comments</a>
        </li>
        <li>
            <a href="connectUs.html">Connect Us</a>
        </li>
    </menu>
    <h2><?php print "Hello, {$_SESSION['firstname']}!"; ?></h2>
    
    <div class="box"> 
        <div class="left">
            <a href="news.html"><img src="img\left.jpg" alt=""></a>
        </div>
        <div class="right" id ="right">

<?php
// Generate corresponding information for each box traversal
$sql = "SELECT s.imgname, s.pdfname, s.price, sc.commit
        FROM storybook s
        LEFT JOIN storybookcommit sc ON s.imgname = sc.imgname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
    
    $imgname = $row['imgname'];
    $pdfname = $row['pdfname'];
    $price = $row['price'];
    $comment = $row['commit'];
// 输出 HTML 结构

    echo "<div data-type='picture' data-title='$pdfname'>";
    echo "<a href='img/$pdfname.pdf'><img src='img/$imgname.png' alt='Book Cover'></a>";
    echo "<p class='review'><a href='img/$pdfname.pdf'>$pdfname</a></p>";
    echo "<div class='appraise'><a href='comments.php'>Show 112467 User Comments</a></div>";
    echo "<div class='info'>";
    echo "<h4><a href='img/$pdfname.pdf' >Read&Download</a></h4>";
    echo "<em>| </em>";                       
    echo "<span>Price: $price </span>";
    echo "</div>";
    echo "</div>";
 }
} else {
    echo "no matching record";
}
    ?>
     </div><!-- the end of right box -->
<div id="pictureBook12" style="display: none">
       <!-- Click menu1-2year picturebook to switch the displayed box -->
    <?php
 $sql = "SELECT pdfname, imgname FROM storybook WHERE imgname IN (SELECT imgname FROM picturebook WHERE `year` = '1-2')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        $pdfName = $row["pdfname"];
        $imgName = $row["imgname"];
        echo '<div>';
        echo "<a href='img/$pdfName.pdf'><img src='img/$imgName.png' alt=''></a>";
        echo "<p class='review'>";
        echo "<a href='img/$pdfName.pdf'>$pdfName</a>";
        echo '</p>';
        echo '<p>';
        echo '<a href="http://localhost/comments.php">Received 543829 comments</a>';
        echo '</p>';
        echo '<div class="info">';
        echo "<h4><a href='img/$pdfName.pdf'>Download PDF</a></h4>";
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "no matching record";
}

?>
 </div>

       <!-- Click menu2-3year activitypicturebook to switch the displayed box -->
        <div id="activityBook23" style="display: none">
    <?php
$sql = "SELECT pdfname, imgname FROM storybook WHERE imgname IN (SELECT imgname FROM activitybook WHERE `year` = '2-3')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdfName = $row["pdfname"];
        $imgName = $row["imgname"];

        // 在HTML中生成相应的结构
 
        echo '<div>';
        echo "<a href='img/$pdfName.pdf'><img src='img/$imgName.png' alt=''></a>";
        echo "<p class='review'>";
        echo "<a href='img/$pdfName.pdf'>$pdfName</a>";
        echo '</p>';
        echo '<p>';
        echo '<a href="http://localhost/comments.php">Received 123 comments</a>';
        echo '</p>';
        echo '<div class="info">';
        echo "<h4><a href='img/$pdfName.pdf'>Download PDF</a></h4>";
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "no matching record";
}

?>
</div>
 <!-- Click menu2-3year picturebook to switch the displayed box -->
    <div id="pictureBook23" style="display: none">
     <!-- Query records that meet conditions in the database -->
    <?php
$sql = "SELECT pdfname, imgname FROM storybook WHERE imgname IN (SELECT imgname FROM picturebook WHERE `year` = '2-3')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        $pdfName = $row["pdfname"];
        $imgName = $row["imgname"];

        // 在HTML中生成相应的结构
 
        echo '<div>';
        echo "<a href='img/$pdfName.pdf'><img src='img/$imgName.png' alt=''></a>";
        echo "<p class='review'>";
        echo "<a href='img/$pdfName.pdf'>$pdfName</a>";
        echo '</p>';
        echo '<p>';
        echo '<a href="http://localhost/comments.php">Received 123 comments</a>';
        echo '</p>';
        echo '<div class="info">';
        echo "<h4><a href='img/$pdfName.pdf'>Download PDF</a></h4>";
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "no matching record";
}
// $conn->close();
?>
</div>
       <!-- Click menu3-4year picturebook to switch the displayed box -->
        <div id="pictureBook34" style="display: none">
     <!-- Query records that meet conditions in the database -->
    <?php
$sql = "SELECT pdfname, imgname FROM storybook WHERE imgname IN (SELECT imgname FROM picturebook WHERE `year` = '3-4')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        $pdfName = $row["pdfname"];
        $imgName = $row["imgname"];
        echo '<div>';
        echo "<a href='img/$pdfName.pdf'><img src='img/$imgName.png' alt=''></a>";
        echo "<p class='review'>";
        echo "<a href='img/$pdfName.pdf'>$pdfName</a>";
        echo '</p>';
        echo '<p>';
        echo '<a href="http://localhost/comments.php">Received 543829 comments</a>';
        echo '</p>';
        echo '<div class="info">';
        echo "<h4><a href='img/$pdfName.pdf'>Download PDF</a></h4>";
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "no matching record";
}
?>
</div>
   <!-- Click menu34year activitybook to switch the displayed box -->
        <div id="activityBook34" style="display: none">
     <!-- Query records that meet conditions in the database -->
    <?php
$sql = "SELECT pdfname, imgname FROM storybook WHERE imgname IN (SELECT imgname FROM activitybook WHERE `year` = '3-4')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        $pdfName = $row["pdfname"];
        $imgName = $row["imgname"];

        // 在HTML中生成相应的结构
 
        echo '<div>';
        echo "<a href='img/$pdfName.pdf'><img src='img/$imgName.png' alt=''></a>";
        echo "<p class='review'>";
        echo "<a href='img/$pdfName.pdf'>$pdfName</a>";
        echo '</p>';
        echo '<p>';
        echo '<a href="http://localhost/comments.php">Received 123 comments</a>';
        echo '</p>';
        echo '<div class="info">';
        echo "<h4><a href='img/$pdfName.pdf'>Download PDF</a></h4>";
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "no matching record";
}
// $conn->close();
?>
</div>


    </div><!-- the end of main box -->

        <div class="bottom">
            <ul>
                <li>Made by JiaGuo</li>
                <li>To my son and other kids</li>
            </ul>
        </div>

        <script>
//show login name in this page
            var firstname = "<?php echo (isset($_SESSION['firstname']) ? $_SESSION['firstname'] : ''); ?>";
            if (firstname !== '') {
                var helloMessage = document.createElement("div");
                // helloMessage.textContent = "Hello, " + firstname + "!";
                document.querySelector("#mainmenu").insertAdjacentElement('afterend', helloMessage);
            }

//Through the menu tag, switch the div box to display different content
       document.addEventListener("DOMContentLoaded", function () {
        // 获取要添加点击事件的<li>元素
        var year1_2 = document.getElementById('year1_2');

    //    Add click event listener
        year1_2.addEventListener('click', function (event) {
            // Checks whether the clicked element is <li> itself or its child element
            var target = event.target;
            if (target.matches('.year12pic')) {
                document.getElementById('pictureBook12').style.display = 'block';
                document.getElementById('activityBook12').style.display = 'none';
                document.getElementById('right').style.display = 'none';
                document.getElementById('pictureBook34').style.display = 'none';
                document.getElementById('activityBook34').style.display = 'none';
                document.getElementById('activityBook23').style.display = 'none';
                 document.getElementById('pictureBook23').style.display = 'none';

            } else if (target.matches('.year12act')) {
                 document.getElementById('activityBook12').style.display = 'block';
                 document.getElementById('pictureBook12').style.display = 'none';
                document.getElementById('right').style.display = 'none';
                      document.getElementById('pictureBook34').style.display = 'none';
                document.getElementById('activityBook34').style.display = 'none';
                document.getElementById('activityBook23').style.display = 'none';
                 document.getElementById('pictureBook23').style.display = 'none';

            
            }else {
                document.getElementById('pictureBook12').style.display = 'block';
                      document.getElementById('activityBook12').style.display = 'block';
            }
        });
         });
        
         document.addEventListener("DOMContentLoaded", function () {
     var year2_3 = document.getElementById('year2_3');
     year2_3.addEventListener('click', function (event) {
            // Checks whether the clicked element is <li> itself or its child element
            var target = event.target;
            if (target.matches('.year23pic')) {
                document.getElementById('pictureBook23').style.display = 'block';
                document.getElementById('activityBook23').style.display = 'none';
                document.getElementById('right').style.display = 'none';
                document.getElementById('pictureBook34').style.display = 'none';
                document.getElementById('activityBook34').style.display = 'none';
                document.getElementById('activityBook12').style.display = 'none';
                 document.getElementById('pictureBook12').style.display = 'none';

            } else if (target.matches('.year23act')) {
                 document.getElementById('activityBook23').style.display = 'block';
                 document.getElementById('pictureBook23').style.display = 'none';
                 document.getElementById('right').style.display = 'none';
                  document.getElementById('pictureBook34').style.display = 'none';
                document.getElementById('activityBook34').style.display = 'none';
                document.getElementById('activityBook12').style.display = 'none';
                 document.getElementById('pictureBook12').style.display = 'none';

            }else {
                document.getElementById('pictureBook23').style.display = 'block';
            }
        });
    });
     document.addEventListener("DOMContentLoaded", function () {
     var year3_4 = document.getElementById('year3_4');
     year3_4.addEventListener('click', function (event) {
            // Checks whether the clicked element is <li> itself or its child element
            var target = event.target;
            if (target.matches('.year34pic')) {
                document.getElementById('pictureBook34').style.display = 'block';
                document.getElementById('activityBook34').style.display = 'none';
                document.getElementById('right').style.display = 'none';
                document.getElementById('pictureBook23').style.display = 'none';
                document.getElementById('activityBook23').style.display = 'none';
                document.getElementById('activityBook12').style.display = 'none';
                 document.getElementById('pictureBook12').style.display = 'none';

            } else if(target.matches('.year34act')) {
                 document.getElementById('activityBook34').style.display = 'block';
                 document.getElementById('pictureBook34').style.display = 'none';
                 document.getElementById('right').style.display = 'none';
                   document.getElementById('pictureBook23').style.display = 'none';
                document.getElementById('activityBook23').style.display = 'none';
                document.getElementById('activityBook12').style.display = 'none';
                 document.getElementById('pictureBook12').style.display = 'none';

            }else {
                 document.getElementById('pictureBook34').style.display = 'block';
           
            }
        });
    });
   
        </script>
</body>

</html>