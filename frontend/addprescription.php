<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicineType = $_POST['type'] ?? '';
    $medicineName = $_POST['medicineName'] ?? '';
    $genericName = $_POST['genericName'] ?? '';
    $dailyDosage = $_POST['dailyDosage'] ?? '';
    $unit = $_POST['unit'] ?? '';
    $frequency = $_POST['frequency'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $instructions = $_POST['additionalInstructions'] ?? '';
    $mealTiming = $_POST['mealTiming'] ?? '';
    $durationUnit = $_POST['durationUnit'] ?? '';

    // Get info from GET query string (via URL)
    $contact = $_GET['contact'] ?? 'Unknown';
    $patient = $_GET['patient'] ?? 'Unknown';
    $doctor = $_GET['doctor'] ?? 'Unknown';
    $appointment_date = $_GET['date'] ?? 'Unknown';

    $timestamp = date("Y-m-d H:i:s");

    $entry = "Patient: $patient | Contact: $contact | Doctor: $doctor | Appointment Date: $appointment_date | Medicine Type: $medicineType | Medicine Name: $medicineName | Generic Name: $genericName | Dosage: $dailyDosage $unit | Frequency: $frequency | Meal Timing: $mealTiming | Duration: $duration $durationUnit | Additional Instructions: $instructions | Saved On: $timestamp\n";

    file_put_contents("prescriptions.txt", $entry, FILE_APPEND);
    $message = "Prescription saved successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DermaGrid - Add Prescription</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        textarea::-webkit-scrollbar {
            width: 6px;
        }

        textarea::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
            border-radius: 3px;
        }

        .hover-blue:hover {
            background-color: #0130a7;
            border-color: #0130a7;
            color: white;
        }

        .btn-blue {
            background-color: #4a73df;
            color: white;
            border: 1px solid #4a73df;
        }

        .btn-fade {
            background-color:rgb(153, 182, 255);
            color: white;
            border: 1px solid #4a73df;
        }
    </style>

    <style>
        .btn.active {
            background-color: #0d6efd;
            color: white;
            border-color: #0a58ca;
        }
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center" href="dashboard.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text">DermaGrid</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Project Management
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="appointments.php">
                    <i class="bi bi-person"></i>
                    <span>Appointments</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Staff Management
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="doctors&staff.php">
                    <i class="bi bi-people"></i>
                    <span>Doctors & Staff</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center">
                        <h1 class="h3 mb-0 text-gray-800">Add Prescription</h1>
                    </div>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<!-- code here              <?php echo htmlspecialchars($_SESSION["first_name"]); ?> -->
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col">

                            <main class="bg-white w-100" style="padding: 1.5rem;">
                                <p class="text-muted mb-1" style="font-size: 13px;">Add Medicine</p>
                                <h1 class="fw-bold border-bottom border-dark pb-2 mb-4" style="font-size: 16px;">Medicine Name</h1>

                                <?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>
                                <form class="row g-4" method="post" action="">
                                    <!-- Left side: Basic Instructions -->
                                    <section class="col-md-6 border-bottom border-md-bottom-0 border-md-end pb-4 pb-md-0 pe-md-4">
                                        <h2 class="fw-bold mb-3" style="font-size: 13px;">Basic Instructions</h2>

                                        <div class="mb-3">
                                            <label for="type" class="form-label fw-bold" style="font-size: 11px;">Type</label>
                                            <input id="type" name="type" type="text" placeholder="e.g., Antibiotic" class="form-control form-control-sm bg-light border-0" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="medicineName" class="form-label fw-bold" style="font-size: 11px;">Medicine Name</label>
                                            <input id="medicineName" name="medicineName" type="text" placeholder="e.g., Amoxicillin" class="form-control form-control-sm bg-light border-0" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="genericName" class="form-label fw-bold" style="font-size: 11px;">Generic Name</label>
                                            <input id="genericName" name="genericName" type="text" placeholder="e.g., Penicillin" class="form-control form-control-sm bg-light border-0" />
                                        </div>
                                    </section>

                                    <!-- Right side: Intake Instructions -->
                                    <section class="col-md-6 ps-md-4">
                                        <h2 class="fw-bold mb-3" style="font-size: 13px;">Intake Instructions</h2>

                                        <div class="row g-3 mb-3">
                                            <div class="col-6">
                                                <label for="dailyDosage" class="form-label fw-bold" style="font-size: 11px;">Daily Dosage</label>
                                                <input id="dailyDosage" name="dailyDosage" type="text" placeholder="e.g., 2" class="form-control form-control-sm bg-light border-0" />
                                            </div>
                                            <div class="col-6">
                                                <label for="unit" class="form-label fw-bold" style="font-size: 11px;">Unit</label>
                                                <select id="unit" name="unit" class="form-select form-select-sm bg-light border-0">
                                                    <option>drops(s)</option>
                                                    <option>tab(s)</option>
                                                    <option>puff(s)</option>
                                                    <option>ml</option>
                                                    <option>iu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Frequency -->
                                        <div class="mb-3">
                                            <label for="frequency" class="form-label fw-bold" style="font-size: 11px;">Frequency</label>
                                            <input id="frequency" name="frequency" type="text" placeholder="e.g., every 6 hours" class="form-control form-control-sm bg-light border-0" />
                                        </div>

                                        <!-- Meal Timing Buttons -->
                                        <div class="mb-3">
                                            <input type="hidden" name="mealTiming" id="mealTiming" />
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-primary btn-sm meal-btn">With meal</button>
                                                <button type="button" class="btn btn-outline-primary btn-sm meal-btn">After meal</button>
                                                <button type="button" class="btn btn-outline-primary btn-sm meal-btn">Before meal</button>
                                            </div>
                                        </div>

                                        <!-- Duration with Buttons -->
                                        <div class="row g-2 align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="duration" class="form-label fw-bold" style="font-size: 11px;">Duration</label>
                                            </div>
                                            <div class="col">
                                                <input id="duration" name="duration" type="text" placeholder="e.g., 7" class="form-control form-control-sm bg-light border-0" />
                                            </div>
                                            <div class="col-auto">
                                                <input type="hidden" name="durationUnit" id="durationUnit" />
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-outline-primary btn-sm duration-btn">Days</button>
                                                    <button type="button" class="btn btn-outline-primary btn-sm duration-btn">Weeks</button>
                                                    <button type="button" class="btn btn-outline-primary btn-sm duration-btn">Months</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="additionalInstructions" class="form-label fw-bold" style="font-size: 11px;">Additional Instructions</label>
                                            <input id="additionalInstructions" name="additionalInstructions" type="text" placeholder="Any other notes..." class="form-control form-control-sm bg-light border-0" />
                                        </div>

                                        <button type="submit" class="btn btn-blue text-white hover-blue" style="font-size: 12px;">Save</button>
                                        <a href="javascript:history.go(-2)" class="btn btn-fade text-white hover-blue" style="font-size: 12px;">
                                            <i class="fas fa-arrow-left"></i> Back to Records
                                        </a>
                                    </section>
                                </form>
                            </main>

                        </div>


                    </div>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
        // Handle meal buttons
        document.querySelectorAll('.meal-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('mealTiming').value = this.textContent.trim();
                document.querySelectorAll('.meal-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Handle duration buttons
        document.querySelectorAll('.duration-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('durationUnit').value = this.textContent.trim();
                document.querySelectorAll('.duration-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

</body>

</html>