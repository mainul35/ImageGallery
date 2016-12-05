<script type="text/javascript">
$(document).ready(function (){
    $(".page-options li").click(function (){
        $(".page-options li").addClass(".active");
    });
});
</script>
<?php
function checkLogin($booleanVal, $name) {


    if ($booleanVal) {
        $header = <<<HEADER
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../userpanel/home.php">Hi $name</a>
    </div>
    <ul class="page-options nav navbar-nav">
      <li><a href="../userpanel/home.php">Home</a></li>
      <li><a href="../userpanel/imageUpload.php">Upload image</a></li>
      <li><a href="../userpanel/owngallery.php">View own gallery</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a id="logout" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
HEADER;

        echo $header;
    } else {
        $header = <<<HEADER
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Image Gallery</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#register-Page"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#login-Pane"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
HEADER;
        echo $header;
    }
}

?>