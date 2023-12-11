
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIG | <?= $judul ?></title>
        
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('sb-admin/') ?>js/scripts.js"></script>
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
        <!-- Datatable-->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('sb-admin/') ?>js/datatables-simple-demo.js"></script>
    
        <link href="<?= base_url('sb-admin/') ?>css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #00486d;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url('Home')?>">Banyumas Hospital</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #00486d;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="<?= base_url('Home')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="<?= base_url('Lokasi/inputLokasi')?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-map-pin"></i></div>
                                Input Lokasi
                            </a>

                            <a class="nav-link" href="<?= base_url('Lokasi/pemetaanLokasi')?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                Pemetaan Lokasi
                            </a>

                            <a class="nav-link" href="<?= base_url('Lokasi')?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-map"></i></div>
                                Data Lokasi
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4"><?= $judul ?></h3>
                        <hr>
                        <?php if ($page) {
                            echo view($page);
                        }?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; H1D021091 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

    </body>
</html>
