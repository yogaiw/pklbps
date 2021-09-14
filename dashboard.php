<?php 

    session_start();
    require "koneksi.php";

    if(!isset($_SESSION["login"])) {
        header("Location:index.php");
        exit();
    }

    $getCurrentUser = $conn->query("SELECT * FROM pegawai WHERE id_pegawai = ".$_SESSION['current_user']);
    $currentUser = $getCurrentUser->fetch_assoc();

    

?>

<!DOCTYPE html>
<html lang="id-id">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BPS Kab. Banyumas</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html"><img src="images/logo-bps.png" width="170px" alt=""></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="" id="admin-link">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                    Admin
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <p><?= $currentUser['nama_pegawai'] ?></p>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Dashboard</h1>
                        
                        <!-- <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-xl-4 col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-input me-1"></i>
                                        Input Izin Baru
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" placeholder="<?= $currentUser['nip'] ?>" disabled>
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control"  placeholder="<?= $currentUser['nama_pegawai'] ?>" disabled>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <input type="text" name="tglKeluar" class="form-control" onfocus="(this.type='date')" onmouseout="(this.type='text')" id="date" placeholder="Tanggal Keluar" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" onfocus="(this.type='date')" onmouseout="(this.type='text')" id="date" placeholder="Tanggal Kembali" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" onfocus="(this.type='time')" onmouseout="(this.type='text')" placeholder="Jam Keluar">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" onfocus="(this.type='time')" onmouseout="(this.type='text')" placeholder="Jam Kembali">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                    <textarea class="form-control"  placeholder="Keperluan" rows="5" required></textarea>
                                            </div>
                                            <a href=""><button type="submit" name="masuk" class="btn btn-primary d-flex">Kirim</button></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Permintaan izin Anda
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Keperluan</th>
                                                    <th>Tanggal keluar</th>
                                                    <th>Tanggal Kembali</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Keperluan</th>
                                                    <th>Tanggal keluar</th>
                                                    <th>Tanggal Kembali</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Rapat koordinasi</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Badan Pusat Statistik Kab. Banyumas</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <?php 
            if($currentUser["isAdmin"] != 2) {
                echo "<script type=\"text/javascript\">
                document.getElementById(\"admin-link\").style.display = \"none\";
                </script>";
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
    </body>
</html>
