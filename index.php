<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <title>Paginación con PHP, Mysql, jQuery, Ajax y Bootstrap </title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
  </head>
  <body>
    <div class="container-fluid">
	  <div class="row">
		<div class="col-xs-12">
		<h3> Listado Usuarios </h3>
		<div id="loader" class="text-center"> <img src="loader.gif"></div>
		<div class="outer_div"></div><!-- Datos ajax Final -->
		</div>
	  </div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
	<script>
	$(document).ready(function(){
		load(1);
	});

	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'listar.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	</script>