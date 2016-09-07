<?php
	include_once "menu-lateral.php";
	include_once "header.php";
	include_once "busq.php";
	?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript"  src="js/libro.js"></script>

	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
	<link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<script src="assets/js/chart-master/Chart.js"></script>

    <!-- MENU -->
<body>
			<section id="main-content">
    	<section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>Libros</h3>
        <hr>
				<?php
				if(isset($_REQUEST['busqueda']))
				{
					$busqueda=$_REQUEST['busqueda'];
					$libros= ConsultaSql("SELECT * FROM libros WHERE titulo like '".$busqueda."%' ORDER BY TITULO DESC");
				}
				else
				{
					$sqllibros="select * from libros";
					$libros=ConsultaSql($sqllibros);
				}
          while($l=mysql_fetch_array($libros))
          {
            $sqlCategoria="select * from categorias where id=".$l['id_categoria']."";
            $c=mysql_fetch_assoc(ConsultaSql($sqlCategoria));

            $sqlEditorial="select * from editoriales where id=".$l['id_editorial']."";
            $e=mysql_fetch_assoc(ConsultaSql($sqlEditorial));
						?>
	     <div class="project-wrapper">
		    	<div class="project">
		        	<div id="en-fila" class="photo hovereffect">
		          		<img  id="galeria" src="<?php echo $l.['foto'] ?>" alt="">
		                	<div class="overlay2"><h2> <?php echo $l.['titulo'] ?><br>$<?php echo $l.['precio']?></h2>
           						<a class="info" href="detalle.php?id='<?php $l['id'] ?>">Detalles</a><br>
           					</div>
		            </div>
		        </div>
		    </div>
		<?php } ?>
		</section>
	</section>



	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="dist/js/bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="assets/js/vendor/holder.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

  </body>
