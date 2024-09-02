<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <title>Test</title>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
</head>
<body>
   <form action="registarGestorBD.php" method="post" enctype="multipart/form-data">
       Distrito: <select name="distrito" id="distrito">
            <option value="dfd">dfd</option>
            <option value="dfdcc">dfdcc</option>
        </select> <br> <br>
       Localidade: <select name="localidade" id="localidade">

        </select> <br> <br>
       <input  type="submit" name="button1" id="button1" value="Guardar">
   </form>
  <script type="text/javascript">
       $(document).on('change','#distrito',function(){
             var val = $(this).val();
             $.ajax({
                   url: 'listarLocalidades.php',
                   data: {distrito:val},
                   type: 'GET',
                   dataType: 'html',
                   success: function(result){
                        $('#localidade').html();  
                        $('#localidade').html(result); 
                   }
              });
       });
  </script>
</body>
</html>