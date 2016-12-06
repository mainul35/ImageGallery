<head>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
</head>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './db/connection.php';
mysqli_select_db($con, "imagegallery");
?>
<script>
    var fullName = '<?php
$sql = "SELECT `fName`, `lName` FROM `user`, `image` WHERE `user`.`id` = `image`.`userId` ORDER BY `image`.`imageId` DESC";
$result = mysqli_query($con, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $otherUser[$i++] = $row['fName'] . " " . $row['lName'];
}
echo json_encode($otherUser);
?>';
    var parseNames = jQuery.parseJSON(fullName);
    document.write(parseNames);
</script>