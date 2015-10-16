<html>
<head>
  <style>
    body { background:url('images/footer_lodyas.png') repeat }
    #bg { width: 640px; height: 640px;  font-family: sans-serif; }
    #fg { position: absolute; width: 640px; height: 640px;  font-family: sans-serif; }

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
		    document.body.appendChild(data);
		  }
		});

    }
  </script>
</head>
<body>
<div class="container-fluid">
	<button onclick="enableOverlay()">Display Overlay</button>
	<button onclick="saveAndSend()">Save</button>

	<div id="container" class="container">
		<div id="fg" style="background:url('images/temp.png');display: none; z-index: 1"></div>
		<div id="bg" style="background:url('images/a.jpg'); background-size: cover; z-index: 0"></div>
	</div>
</div>
</body>
</html>