<html>
<head>
  <style>
    body { background: #000; text-align: center }
    div { width: 320px; height: 240px; display: inline-block; font-family: sans-serif; border: 2px solid #aaa;}
    p { opacity: 0.6; background: #fff; padding: 5px; font-weight: bold;  margin: 0; }
  </style>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="js/draggable_background.js"></script>
  <script>
    $(function() {
      $('#default').backgroundDraggable();

      $('div').each(function() {
        var $this = $(this),
            html = $this.html();
        $this.empty().append($('<p>').html(html))
      });
    });
  </script>
</head>
<body>
  <div id="default" style="background:url('images/a.jpg')">default</div>
</body>
</html>