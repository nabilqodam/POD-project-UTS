<?php 
    // include database connection
    require_once '../dbkoneksi.php';
?>

<?php 
    // select all data from table "vendor"
    $sql = "SELECT * FROM `order`";
    // execute the query
    $rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/">E-Commerce</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
				    <div id="layoutSidenav_nav">
						    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
						        <div class="sb-sidenav-menu">
						            <div class="nav">
						                <div class="sb-sidenav-menu-heading">Core</div>
						                <a class="nav-link" href="/">
						                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
						                    Dashboard
						                </a>

						                <div class="sb-sidenav-menu-heading">Data</div>
						                <a class="nav-link" href="list_kartu.php">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    Card
						                </a>

						                <a class="nav-link" href="#">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    Costumer
						                </a>

                                        <a class="nav-link" href="#">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    Order
						                </a>

                                        <a class="nav-link" href="#">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    Produk
						                </a>

                                        <a class="nav-link" href="#">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    List Produk
						                </a>

                                        <a class="nav-link" href="#">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    Restock
						                </a>

                                        <a class="nav-link" href="#">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    Supplier
						                </a>

						                <div class="sb-sidenav-menu-heading">Account</div>
						                <a class="nav-link">
						                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						                    Users
						                </a>
						            </div>
						        </div>
						        <div class="sb-sidenav-footer">
						            <div class="small">Logged in as:</div>
						            Nabil Muqodam
						        </div>
						    </nav>
						</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Order</h1>
                        <div class="d-flex justify-content-between mb-4">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Order</li>
                            </ol>
                            <a href="form_product.php">
                                <button class="btn btn-success" type="submit">Create Data</button>
                            </a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               List Order
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Order</th>
                                            <th>Ttgl</th>
                                            <th>Kuantitas </th>
                                            <th>Total </th>
                                            <th>Customer ID</th>
                                            <th>Produk ID</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                             // initialize counter
                                              $id = 1;
                                            // loop through the result set
                                             foreach($rs as $row) {
                                    ?>
                                        <tr>
                                            <td><?=$id?></td>
                                            <td><?=$row['order_number']?></td>
                                            <td><?=$row['date']?></td>
                                            <td></td>
                                            <td><?=$row['qty']?></td>
                                            <td><?=$row['total_price']?></td>
                                            <td><?=$row['customer_id']?></td>
                                            <td><?=$row['product_id']?></td>
                                            
                                            <td>
                                            <a class="btn btn-sm btn-success" href="view_order.php?id=<?=$row['id']?>">View</a>
                                                <a class="btn btn-sm btn-danger " href="delete_order.php?id=<?=$row['id']?>"
                                                  onclick="if(!confirm('Anda Yakin Hapus Data supplier <?=$row['order_number']?>?')) {return false}"
                                                  >Delete</a>
                                            </td>
                                        </tr>
                                        <?php 
                                            // increment counter
                                            $id++;   
                                                    } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>