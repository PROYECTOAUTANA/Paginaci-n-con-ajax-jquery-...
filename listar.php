<?php
try {
    $conn = new PDO('pgsql:host=localhost;port=5432;dbname=pautana', "yordy","1234" );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}
 
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'pagination.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla
		$sql   = $conn->query("SELECT COUNT(*) FROM usuario");
		$numrows = $sql->fetchColumn();
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = $conn->prepare("SELECT * FROM usuario ORDER BY id LIMIT :per_page OFFSET :offset");
		$query->execute(array(':offset' => $offset, ':per_page' => $per_page));
		if ($numrows > 0){
			?>
		<table class="table table-bordered">
			  <thead>
				<tr>
				  <th>Id</th>
				  <th>Nombre</th>
				  <th>Apellido</th>
				  <th>Cédula</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = $query->fetch(PDO::FETCH_ASSOC)) {
				?>
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['nombre'];?></td>
					<td><?php echo $row['apellido'];?></td>
					<td><?php echo $row['cedula'];?></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<div class="table-pagination pull-right">
			<?php echo paginate($reload, $page, $total_pages, $adjacents);?>
		</div>
 
			<?php
 
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>
