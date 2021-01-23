<?php 
echo $_SERVER['SERVER_ADDR'];
header('Access-Control-Allow-Origin: *');
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <link type="text/css" rel="stylesheet" href="static/style/slider.css">
    </link>
    <link type="text/css" rel="stylesheet" href="static/style/progress-bar.css">
    </link>
    <style>
        body {
            background-color: #808080;
        }

        #slider-value {
            font-family: sans-serif;
            font-weight: bold;
            font-size: 20px;
        }

        #info {
            font-family: sans-serif;
            font-weight: bold;
            font-size: 40px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img style="width: 150px;" src="static/img/logo.png">
            </div>
            <div class="col-md-10 d-flex align-items-center flex-column">
                <br>
                <h1>Mini UAV for Indoor Surveillance</h1>
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
                        <input type="hidden" name="sent" id="pic_c">
                        <input onclick="get()" style="width: 150px;" type="image" src="static/img/icon_p.png"
                            alt="Submit" value="Capture">
                    </form>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="pic"
                            style="display:none;"></textarea>
                        <label for="floatingTextarea" style="display:none;">Comments</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="progress-bar">
  		<div class="result" id ="sensor-data"></div>
  		<div class = "progress-bar-fill" id = "bar-fill"></div>
    </div>

    <div class="slidecontainer" style = "margin-top: 50px;">
  		<input type="range" min="1" max="100" value="50" class="slider" id="myRange">
	</div>
	<div id = "slider-value"></div>
    </div>

    <script src="static/client.js" type="text/javascript"></script> 
    <script src="static/js/progressbar.js" type="text/javascript"></script>

    <script type="text/javascript">
        // Connect a websocket to the server. The port notation is post-
        // processed server-side according to the config
        client.connect({{port}});

        function get() {
            document.getElementById("pic_c").value = g_pic;
            //return document.getElementById("pic").innerHTML = g_pic;
        }

      bar = new ProgressBar(document.querySelector('.progress-bar'), 200);

      var slider = document.getElementById("myRange");
    var output = document.getElementById("slider-value");
    output.innerHTML = "Current threshold value: " + slider.value*4 + "cm"; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = "Current threshold value: " + this.value*4 + "cm";
    } 


      var hostname = document.location.origin;
      var interval = 100;
      var title = document.title;

      

      function get_data() {
          $.ajax({
             // url: hostname+"/static/data.txt",
             url: "http://192.168.1.158/data.txt",
                type: "GET",
                dataType : "text",
                success: function(data){
                    
                    d = document.getElementById('sensor-data');
                    d.innerHTML = data;
                    bar.set_value(data);

                    if (slider.value*4 > data){
                      
                        document.getElementById('bar-fill').style.backgroundColor = "red";
                        
                    } else{
                      
                        document.getElementById('bar-fill').style.backgroundColor = "#4CAF50";
                    }
                    setTimeout(function(){
                        get_data();
                    }, interval);
                }
        });
      }
      setInterval(function(){ 
        get_data();
}, 10000);
      
      
</script>

</body>

</html>
