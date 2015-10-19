<?php 

	require( __DIR__.'/facebook_start.php' ); 
	$token = $_SESSION['facebook_access_token'];
?>

<?php
function curly($token){

        // create curl resource
    $ch=curl_init();
  /*  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);*/
        // set url
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=".$token);

        //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
    $output = curl_exec($ch);

        // close curl resource to free up system resources
    curl_close($ch); 

    return $output;
  }
?>

<?php 
if(isset($_FILES['userFile']['name'])){
  $info = pathinfo($_FILES['userFile']['name']);
   $ext = $info['extension']; // get the extension of the file

  $output = curly($token);
    //echo $output;
    $r=json_decode($output, true);
    $id= $r['id'];

   $newname = $id+"."+$ext; 

   $target = 'cache/'.$newname;
   move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);

   $_SESSION['path'] = $target;
}
 ?>

<html>

<head>
  <style>
    body { background:url('images/footer_lodyas.png') repeat }
    #bg { width: 640px; height: 640px;   }
    #fg { position: absolute; width: 640px; height: 640px;   }
	#container { width: 640px; height: 640px;   }
  </style>
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>


  <script src="js/draggable_background.js"></script>
  <script src="js/html2canvas.js"></script>
  <script>
    $(function() {
      $('#bg').backgroundDraggable();
    });

    function enableOverlay(){
    	if($('#fg').css('display') == 'none'){
    		$('#fg').css('display','block');
    	}
    	else{
    		$('#fg').css('display','none');
    	}
    }

    function saveAndSend(){
   		$('#fg').css('display','block');

   		html2canvas($('#container'), {
		  onrendered: function(canvas) {
		  	var data = canvas.toDataURL('image/png');
		  	//add to dom
		  	var DOM_img = document.createElement("img");
		  	DOM_img.src = data;
		    document.body.appendChild(DOM_img);

		    console.log(data);

        $("#link").attr("href",data);

		  }
		});

    }
  </script>
</head>
<body>
<div class="container-fluid">

	<button onclick="enableOverlay()">Display Overlay</button>
	<button onclick="saveAndSend()">Save</button>


  <form action='' method='POST' enctype='multipart/form-data'>
  <input type='file' name='userFile'><br>
  
  <button><a id = "link" href="/path/to/image.png" download>Download</a></button>
  <input type='submit' name='upload_btn' value='upload'>
  </form>

	<div id="container">
		<div id="fg" style="background:url('images/temp.png');display: none; z-index: 1"></div>
		<div id="bg" style="background:url('cache/<?php echo $id+'.'+'.png'?>'); background-size: cover; z-index: 0"></div>
	</div>
</div>
</body>
</html>