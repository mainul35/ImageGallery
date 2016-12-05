<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
</head>
<?php
include_once '../model/user.php';
include_once './header.php';
include_once '../controller/GalleryDAO.php';
session_start();
if (isset($_GET['userId'])) {
    mysqli_select_db($con, 'imagegallery');
    $id = mysqli_real_escape_string($con, $_GET['userId']);
    checkLogin(true, $_SESSION['name']);
    $gallery = new ImageDao($con);
    $pageNo = 0;
    if (isset($_GET['pageNo'])) {
        $pageNo = $_GET['pageNo'];
    }
    ?>
    <div class="container-fluid">
        <h2><?php echo 'Gallery of '.$_SESSION['otherUser'];?></h2>
        <div class="row">
            <script>
                $(document).ready(function () {
                    var phpData = '<?php echo json_encode($gallery->fetchImages(0, $id)); ?>';
                    var parseJSON = jQuery.parseJSON(phpData);
                    var content = "";
                    for (var i = 0; i < parseJSON.length; i++) {
                        var str = (parseJSON[i].imageUploafdTime);
                        var splittedTime = str.split(" ");
                        content += "<div class='imgContainer col-sm-1' style='background-color:lavender;'>";
                        content += "<a href='" + parseJSON[i].imageURL + "'><img class='all-uploads' src='" + parseJSON[i].imageURL + "'/></a><br>";
                        content += "<span class='all-uploads-inf'>" + parseJSON[i].imageName + "</span><br>";
                        content += "<span class='all-uploads-inf'>Uploaded on " + splittedTime[0] + " </span><br><span class='all-uploads-inf'>At " + splittedTime[1] + "</span><br>";
                        content += "<span class='all-uploads-inf'>" + parseJSON[i].imageVotes + " votes</span><span class='divider'>|</span>";
                        content += "<span class='all-uploads-inf divider'><a href='upvote.php?page=otherGallery.php&imageId=" + parseJSON[i].imageId + "'>Upvote</a></span></div>";
                        $("div.row").html(content);
                    }
                });
            </script>
        </div>
    </div><br>
    <ul class="pagination">
        <?php
        for ($i = 1; $i < ceil($gallery->countTotalPages()) + 1; $i++) {
            echo '<li><a id="pagination' . $i . '" href="otherGallery.php?pageNo=' . $i . '">' . $i . '</a></li>';
        }
        ?>
    </ul>
    <?php
} else {
    header("location: ../index.php");
    mysqli_close($con);
}
?>

