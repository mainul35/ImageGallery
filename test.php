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
mysqli_select_db($con, "garciaplumbing2");

$sql = "SELECT * FROM `fitting`;";
$result = mysqli_query($con, $sql);

//$script = <<<SCRIPT
//
//SCRIPT;
echo 'asdf';
while($rows = mysqli_fetch_assoc($result)){
//echo json_en code($rows);
?>
<div>
    <script type="text/javascript">
//        function fitting() {
//            fittingId:"";
//        }
        var objData = '<?php echo json_encode($rows); ?>';
        var jsonData = jQuery.parseJSON(objData);
//        for (i = 0; i < objData.length; i++) {
            var fittingId = jsonData.fittingId;
            var fittingName = jsonData.fittingName;
            var fittingUnitCost = jsonData.fittingUnitCost;
            var fittingTypeId = jsonData.fittingTypeId;
            document.write(fittingId + "<br>");
            document.write(fittingName + "<br>");
            document.write(fittingTypeId + "<br>");
            document.write(fittingUnitCost + "<br>");
            alert('<?php echo 2; ?>');
//        }
    </script>
</div>
<?php } ?>