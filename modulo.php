<!DOCTYPE html>
<html lang="es">
<head>
    <title>Espe-Cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/jquery.dataTables.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/compiled/datatables.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/pb/pb.css" type="text/css"/>
    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=OpenSans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
</head>
<body>
    <!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">            
            <a class="navbar-brand" href="index.php">
                Web
            </a>
        </div>
        <ul class="nav navbar-nav pull-right hidden-xs">                       
            <li class="notification-dropdown hidden-xs hidden-sm">
                <a href="#" class="trigger">
                    <i class="icon-user"></i>
                </a>
                <div class="pop-dialog">                    
                </div>
            </li>
            <li class="dropdown open">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    Bienvenido                  
                </a>                
            </li>             
            
        </ul>
    </header>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="principal.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
            
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Gestion</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="modulo.php" >Modulo</a></li>                    
                </ul>
                <ul class="submenu">
                    <li><a href="funcionalidades.php" >Funcionalidad</a></li>                    
                </ul>
                <ul class="submenu">
                    <li><a href="porrol.php" >Por Rol</a></li>                    
                </ul>
                <ul class="submenu">
                    <li><a href="derol.php" >De Rol</a></li>                    
                </ul>
            </li> 
        </ul>
    </div>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">

        <!-- end upper main stats -->

        <div id="pad-wrapper" class="form-page">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row form-wrapper">
                <!-- left column -->
                <div id="miPagina" class="col-md-5 column">

                    <form method="POST">


                        <div class="field-box">
                            <label>Codigo:</label>
                            <div class="col-md-7">
                                <input name="cod_modulo" id="cod_modulo" class="form-control" required autofocus type="text">
                            </div>                            
                        </div>
                        <div class="field-box">
                            <label>Nombre:</label>
                            <div class="col-md-7">
                                <input name="nombre" id="nombre" class="form-control" required autofocus type="text">
                            </div>                            
                        </div>
                        <div class="field-box">
                            <label>Estado:</label>
                            <div class="col-md-7">
                                <input name="estado" id="estado" class="form-control" required type="text">
                            </div>                            
                        </div>
                        

                        <div class="action">
                            <input type="submit"  class="btn-flat" id="registrar" value="Registrar" ></input>
                            <input type="button" onclick="listarModulo();"  class="btn-flat" id="mostrar" value="Mostrar" ></input>
                        </div> 
                        
                    </form>

                    <div id="mensaje" class="col-md-6">
                        
                    </div>

                </div>

                <!-- right column -->
                <div id="miTabla" class="col-md-7 column pull-right">
                    <div id="cargando"></div>
                </div>
            </div>
        </div>
    </div>





<?php 
	sleep(1);
	include_once('conexion.php');
	$sql = "SELECT * FROM SEG_MODULO;";
	$res = mysql_query($sql);
	$ide = "";
	echo "<div id='pad-wrapper' class='datatables-page' style='margin-top:0px;'>";            
	echo "           <div class='row'>";
	echo "               <div class='col-md-8'>";
	echo "                    <table id='example' class='table table-hover'>";
	echo "                        <thead>";
	echo "                            <tr>";
	echo "                                <th style = 'display:none;' tabindex='0' rowspan='1' colspan='1'>ID</th>";
	echo "                                <th tabindex='0' rowspan='1' colspan='1'>Nombre</th>";
	echo "                                <th tabindex='0' rowspan='1' colspan='1'>Estado</th>";
	echo "                                <th tabindex='0' rowspan='1' colspan='1'>Editar</th>";
	echo "                                <th tabindex='0' rowspan='1' colspan='1'>Eliminar</th>";
	echo "                            </tr>";
	echo "                        </thead>";
	echo "                        <tbody>";
			while ($modulos = mysql_fetch_array($res)) {
	echo "                            <tr>";
	echo "                                <td style = 'display:none;'>$modulos[0]</td>";
	echo "                                <td>".$modulos[1]."</td>";
	echo "                                <td>".$modulos[2]."</td>";
	
	echo "                                <td class='center'><a onclick='LDE(".$ide=$modulos[0].");' data-toggle='modal' data-target='#myModal-Edit' style='cursor:pointer;'><i class='icon-edit'></i></a></td>";
	echo "                                <td class='center'><a onclick='ME(".$ide=$modulos[0].");' data-toggle='modal' data-target='#myModal-Delete' style='cursor:pointer;'><i class='icon-remove'></i></a></td>";
	echo "                            </tr>";
			}
	echo "                        </tbody>";
	echo "                    </table>";
	echo "                </div>";
	echo "            </div>";
	echo "        </div>";

	/*PARTE DE EDITAR Y ELIMINAR*/
	echo "
	<!-- Modal para Editar-->
	<div class='modal fade' id='myModal-Edit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	  
	</div><!-- /.modal -->";

	echo "
	<!-- Modal para Eliminar-->
	<div class='modal fade' id='myModal-Delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	  
	</div><!-- /.modal -->";

	echo " <script type='text/javascript'>
			$(document).ready(function() {
				$('#example').dataTable({
					'sPaginationType': 'full_numbers',
					'oLanguage':{
						'sProcessing':     'Cargando...',
						'sLengthMenu':     'Mostrar _MENU_ registros',
						'sZeroRecords':    'No se encontraron resultados',
						'sEmptyTable':     'Ning�n dato disponible en esta tabla',
						'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
						'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
						'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
						'sInfoPostFix':    '',
						'sSearch':         'Buscar:',
						'sUrl':            '',
						'sInfoThousands':  '',
						'sLoadingRecords': 'Cargando...',
						'oPaginate': {
							'sFirst':    'Primero',
							'sLast':     'Ultimo',
							'sNext':     'Siguiente',
							'sPrevious': 'Anterior'
						},
						'oAria': {
							'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
							'sSortDescending': ': Activar para ordenar la columna de manera descendente'
						}
					},
					'aaSorting': [[ 0, 'desc' ]],//ordenar
					'iDisplayLength': 5,
					'aLengthMenu': [[5, 10, 20, -1], [5, 10, 20, 'All']]
				});
			});			
			</script>";
 ?>







    <!-- scripts -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.datepicker.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>  
    <script src="js/theme.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/personal.js"></script>
    <script type="text/javascript">
        registrarModulo();
    </script>
</body>
</html>