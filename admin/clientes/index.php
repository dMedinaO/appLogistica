<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard App Logistica</title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../css/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="../css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="../css/demo/nifty-demo.min.css" rel="stylesheet">



    <!--DataTables [ OPTIONAL ]-->
    <link href="../plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	  <link href="../plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--JSTree [ OPTIONAL ]-->
    <link href="../plugins/jstree/themes/default/style.min.css" rel="stylesheet">

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../plugins/pace/pace.min.js"></script>


    <!--jQuery [ REQUIRED ]-->
    <script src="../js/jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="../js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="../js/nifty.min.js"></script>


    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    <script src="../js/demo/nifty-demo.min.js"></script>

    <!--JSTree [ OPTIONAL ]-->
    <script src="../plugins/jstree/jstree.min.js"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="../plugins/datatables/media/js/jquery.dataTables.js"></script>
	  <script src="../plugins/datatables/media/js/dataTables.bootstrap.js"></script>
	  <script src="../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="../plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="../plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Premium Line Icons [ OPTIONAL ]-->
    <link href="../premium/icon-sets/icons/line-icons/premium-line-icons.min.css" rel="stylesheet">

    <!--js para handler de usuario -->
    <script src="../js/clientes/loadData.js"></script>

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="../" class="navbar-brand">
                        <img src="../img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">App Logística</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-view-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                    <ul class="nav navbar-top-links pull-right">

                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <div class="username hidden-xs">Admin User</div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                    <a href="http://toexpress.cl" class="btn btn-primary">
                                        <i class="demo-pli-unlock"></i> Salir!
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

          <!--CONTENT CONTAINER-->
          <!--===================================================-->
          <div id="content-container">
              <div id="page-head">

                  <!--Page Title-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <div id="page-title">
                      <h1 class="page-header text-overflow">Clientes Disponibles en el Sistema</h1>

                  </div>
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--End page title-->
              </div>


              <!--Page content-->
              <!--===================================================-->
              <div id="page-content">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="panel">
                      <div id="demo-custom-toolbar2" class="table-toolbar-left">
                          <button id="demo-dt-addrow-btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="demo-pli-plus"></i> Agregar cliente</button>
                      </div>

                      <div class="panel-body">
                        <table id="bodegaData" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th class="min-tablet">Rut</th>
                              <th class="min-tablet">Nombre</th>
                              <th class="min-tablet">UserName</th>
                              <th class="min-tablet">Teléfono</th>
                              <th class="min-tablet">E-Mail</th>
                              <th class="min-tablet">Creado</th>
                              <th class="min-tablet">Modificado</th>
                              <th class="min-tablet">Opciones</th>
                              </tr>
                            </thead>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--===================================================-->
              <!--End page content-->

          </div>
          <!--===================================================-->
          <!--END CONTENT CONTAINER-->


            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="../img/profile-photos/11.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name">Administrador</p>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">

                                        <a href="http://toexpress.cl" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Salir
                                        </a>
                                    </div>
                                </div>

                                <ul id="mainnav-menu" class="list-group">

          						            <!--Category name-->
          						            <li class="list-header">Users</li>

																	<li>
          						                <a href="../roles/">
          						                    <i class="fa fa-user-times"></i>
          						                    <span class="menu-title">Roles</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li>
          						                <a href="../users/">
          						                    <i class="fa fa-users"></i>
          						                    <span class="menu-title">Usuarios</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li class="list-header">Bodega y Despacho</li>

                                  <li>
          						                <a href="../bodega/">
          						                    <i class="fa fa-home"></i>
          						                    <span class="menu-title">Bodega</span><i class="arrow"></i>
          						                </a>

          						            </li>

																	<li>
          						                <a href="../bodegueros/">
          						                    <i class="fa fa-users"></i>
          						                    <span class="menu-title">Bodegueros</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li class="list-header">Vehículos</li>

                                  <li>
          						                <a href="../vehiculos/">
          						                    <i class="fa fa-car"></i>
          						                    <span class="menu-title">Vehículos</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li>
          						                <a href="../choferes/">
          						                    <i class="fa fa-user"></i>
          						                    <span class="menu-title">Choferes</span><i class="arrow"></i>
          						                </a>

          						            </li>

                                  <li>
          						                <a href="../vehiculosAsignados/">
          						                    <i class="fa fa-car"></i>
          						                    <span class="menu-title">Vehículos Asignados</span><i class="arrow"></i>
          						                </a>

          						            </li>


                                  <li class="list-header">Clientes</li>

                                  <li>
          						                <a href="../clientes/">
          						                    <i class="fa fa-briefcase"></i>
          						                    <span class="menu-title">Clientes</span><i class="arrow"></i>
          						                </a>

          						            </li>
						            </ul>

                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>






            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2019 David Medina Ortiz, david.medina@cebib.cl</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->

    <!-- modal section -->
    <!-- modal para agregar-->
     <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Cliente</h4>
             </div>
             <div class="modal-body">

             <form id="frmAgregar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese nombre cliente">
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="username" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese nombre de usuario">
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut">Rut <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="rut" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese rut cliente">
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese teléfono">
                 </div>
               </div>

               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-Mail <span class="required">*</span>
                 </label>

                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input type="text" id="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese correo electrónico">
                 </div>
               </div>

               <div class="ln_solid"></div>


             </div>

             <div class="modal-footer">
               <div class="form-group">
                 <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                   <button type="reset" class="btn btn-primary">Resetear</button>
                   <button type="button" id="agregar-bodega" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </form>
     </div>

     <!-- modal para eliminar -->
     <div>
       <form id="frmEliminar" action="" method="POST">
         <input type="hidden" id="iduser" name="iduser" value="">
         <!-- Modal -->
         <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="modalEliminarLabel">Eliminar Cliente</h4>
               </div>
               <div class="modal-body">
                 ¿Está seguro de eliminar el cliente seleccionado?<strong data-name=""></strong>
               </div>
               <div class="modal-footer">
                 <button type="button" id="eliminar-usuario" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               </div>
             </div>
           </div>
         </div>
         <!-- Modal -->
       </form>
     </div>

     <!-- modal para editar un nuevo elemento -->
     <div>
     	<form id="frmEditar" action="" method="POST" data-parsley-validate class="form-horizontal form-label-left">
     		<input type="hidden" id="oldRut" name="oldRut" value="">
     		<div class="modal fade" id="myModalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
     				<div class="modal-dialog">
     					<div class="modal-content">
     						<div class="modal-header">
     							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     							<h4 class="modal-title" id="myModalLabelEdit">Editar Cliente Seleccionado</h4>
     						</div>
     						<div class="modal-body">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese nombre cliente">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rut">Rut <span class="required">*</span>
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="rut" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese rut cliente)">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name <span class="required">*</span>
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="username" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese nombre de usuario">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Teléfono <span class="required">*</span>
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese teléfono">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-Mail <span class="required">*</span>
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Ingrese correo electrónico">
                    </div>
                  </div>

     						  <div class="ln_solid"></div>
     						  <div class="form-group">
       							<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
       								<button type="reset" class="btn btn-primary">Resetear</button>
       								<button type="button" id="editar-usuario" class="btn btn-success" data-dismiss="modal">Editar</button>
       								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
       							</div>
     						  </div>

     						</div>

     					</div>
     				</div>
          </form>
     		</div>
     </div>
  </body>
</html>
