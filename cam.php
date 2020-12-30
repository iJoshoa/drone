<?php 
echo $_SERVER['SERVER_ADDR'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mini UAV for Indoor Surveillance</title>

        <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css" />
        <link href="static/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="static/style.css" rel="stylesheet" type="text/css" />
    <style>
	body{
		background-color: #808080;
	}
   </style>
	
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img style="width: 150px;"src="static/img/logo.png">
                </div>
                <div class="col-md-10 d-flex align-items-center flex-column">
                    <br><h1>Mini UAV for Indoor Surveillance</h1>
                    <p>
                       Computer Engineering SSRU.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-8 col-md-8">
                    <img id="video"></img>
                </div>
		<div class="col-4 col-md-4">
			<div class="align-self-center">
			<form action="http://192.168.1.158/b2j.php" method="post">
				<button onclick="get()" type="button" class="btn btn-success">Capture</button>
				<input type="text" id="pic">
				<input onclick="get()" name="sent" type="submit" id="pic_c" class="btn btn-success">
			</form>
			<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="pic"></textarea>
  <label for="floatingTextarea">Comments</label>
</div>
			</div>
		</div>
            </div>
        </div>

        <script src="static/client.js" type="text/javascript"></script>
        <script type="text/javascript">

            // Connect a websocket to the server. The port notation is post-
            // processed server-side according to the config
            client.connect({{port}});
	function get(){
		document.getElementById("pic_c").value = g_pic;
        	return document.getElementById("pic").innerHTML = g_pic;
	}
        </script>
    </body>
</html>
