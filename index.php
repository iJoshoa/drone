<?php
#$output = shell_exec('ls -lart');
#echo "<pre>$output</pre>";
#echo $_SERVER['SERVER_ADDR'];echo ":8000";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <!-- Bootstrap CSS -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL='http://<?php echo $_SERVER['SERVER_ADDR'];echo ":8000"; ?>'">
        <title>Mini UAV for Indoor Surveillance</title>

        <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesh$
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/$
        <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Drone mini</title>
  </head>
  <body>
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
<img id="video"></img>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
<script src="client.js" type="text/javascript"></script>
        <script type="text/javascript">

            // Connect a websocket to the server. The port notation is post-
            // processed server-side according to the config
            client.connect(8000);
        function get(){
                return document.getElementById("pic").innerHTML = g_pic;
        }
        </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    -->
  </body>
</html>
