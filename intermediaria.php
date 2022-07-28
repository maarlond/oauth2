<?php
	session_start();
	if(!isset($_SESSION) && empty($_SESSION) && empty($_SESSION['sessaoauth']['name'])){
		header("Location:../oauth2/intermediaria.php");
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Sistemas</title>
		<!-- Custom fonts for this template-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<!-- Custom styles for this template-->
		<link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
	</head>
	<body id="page-top">

		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">

				<div class="topbar-divider d-none d-sm-block"></div>
				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['sessaoauth']['name'];?></span>
						<img class="img-profile rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>

		<div class="container-fluid">
			<h1>Sistemas</h1>
		</div>
		<form action="../../reservas/dist/index.php" method="POST">
		<input type="hidden" id="userSistemas" name="userSistemas" value="<?=$_SESSION['sessaoauth']['name']; ?>">
		<input type="hidden" id="sistemasUserID" name="sistemasUserID" value="<?=$_SESSION['sessaoauth']['soe:matricula'] ?>">
		<input type="hidden" id="datahora" name="datahora" value="<?=date('Y-m-d H:i:s:u'); ?>">
		<div class="container-fluid">
			<div class="row">

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reserva de Espaços
									</div>
									<div class="row no-gutters align-items-center">
										<div class="col-auto">
											<a href="../reservas/">Reservas</a><br>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									ADI</div>
										<a href="../adi/">ADI</a><br>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		</form>
	</body>
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto pra sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" para sair da sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="destruirSession.php">Sair</a>
                </div>
            </div>
        </div>
    </div>
	<script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js"></script>
	<script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
