<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>

<!--    <style>
        .imgContainer{
            width: 235px;
            height: 310px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .row{
            margin-left: 120px;
        }

        .all-uploads{
            width: 165px;
            height: 165px;
            margin-left: 3vh;
            margin-top: 5vh;
            border-radius: 4px;
        }

        .all-uploads-inf{
            line-height: -2px;
            margin-left: 3vh;
        }

        .divider{
            margin-left: 1vh;
        }
    </style>-->

</head>
<?php
include_once '../model/user.php';
include_once './header.php';
include_once '../controller/GalleryDAO.php';

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION['user'];
    $_SESSION['myId'] = $user->getId();
    $name = $user->getFName() . " " . $user->getLName();
    $_SESSION['name'] = $name;
    checkLogin(true, $name);

    $gallery = new ImageDao($con);
    $pageNo = 0;
    if (isset($_GET['pageNo'])) {
        $pageNo = $_GET['pageNo'];
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <script>
                $(document).ready(function () {
                    var phpData = '<?php echo json_encode($gallery->fetchImages($pageNo, "*")); ?>';

                    var parseJSON = jQuery.parseJSON(phpData);
                    var content = "";
                    for (var i = 0; i < parseJSON.length; i++) {
                        //                        alert(parseJSON[i].imageName);
                        var str = (parseJSON[i].imageUploafdTime);
                        var splittedTime = str.split(" ");
                        content += "<div class='imgContainer col-sm-1' style='background-color:lavender;'>";
                        content += "<a href='" + parseJSON[i].imageURL + "'><img class='all-uploads' src='" + parseJSON[i].imageURL + "'/></a><br>";
                        content += "<span class='all-uploads-inf'><a href='./otherGallery.php?id="+parseJSON[i].userId+"&name=" + parseJSON[i].fName + "'>";
                        content += parseJSON[i].fName + "</a></span><br>";
                        content += "<span class='all-uploads-inf'>" + parseJSON[i].imageName + "</span><br>";
                        content += "<span class='all-uploads-inf'>Uploaded on " + splittedTime[0] + " </span><br><span class='all-uploads-inf'>At " + splittedTime[1] + "</span><br>";
                        content += "<span class='all-uploads-inf'>" + parseJSON[i].imageVotes + " votes</span><span class='divider'>|</span>";
                        content += "<span class='all-uploads-inf divider'><a href='upvote.php?name=" + parseJSON[i].fName + "page=home.php&imageId=" + parseJSON[i].imageId + "'>Upvote</a></span></div>";
                        $("div.row").html(content);
                    }
                });
            </script>
        </div>
    </div><br>
    <ul class="pagination">
        <?php
        for ($i = 1; $i < ceil($gallery->countTotalPages()) + 1; $i++) {
            echo '<li><a id="pagination' . $i . '" href="home.php?pageNo=' . $i . '">' . $i . '</a></li>';
        }
        ?>
    </ul>
    <?php
} else {
    header("location: ../index.php");
    mysqli_close($con);
}
?>
