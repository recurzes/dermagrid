<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_name = $_POST['patient_name'] ?? ($_GET['patient'] ?? 'Unknown');
    $doctor = $_POST['doctor'] ?? ($_GET['doctor'] ?? 'Unknown');
    $appointment_date = $_POST['appointment_date'] ?? ($_GET['date'] ?? 'Unknown');

    $rectreatment = $_POST['recommended_treatment'];
    $presgiven = $_POST['prescriptions_given'];
    $chiefcomplaint = $_POST['chief_complaint'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $skintype = $_POST['skin_type'];
    $notes = $_POST['clinical_notes'];
    $instructions = $_POST['instructions'];
    $timestamp = date("Y-m-d H:i:s");

    $contact = $_GET['contact'] ?? 'Unknown';
    $entry = "Patient: $patient_name | Contact: $contact | Doctor: $doctor | Appointment Date: $appointment_date | Recommended Treatment: $rectreatment | Prescriptions Given: $presgiven | Diagnosis: $diagnosis | Treatment: $treatment | Chief Complaint: $chiefcomplaint | Skin Type: $skintype | Clinical Notes: $notes | Instructions: $instructions | Saved On: $timestamp\n";


    // Save to file (append mode)
    file_put_contents("medical_data.txt", $entry, FILE_APPEND);
    $message = "Medical record added successfully.";
}
?>

<?php
$prefill = [
    'patient_name' => isset($_GET['patient']) ? urldecode($_GET['patient']) : '',
    'doctor' => isset($_GET['doctor']) ? urldecode($_GET['doctor']) : '',
    'appointment_date' => isset($_GET['date']) ? urldecode($_GET['date']) : ''
];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DermaGrid - Add Medical</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="/frontend/css/sb-admin-2.min.css" rel="stylesheet">
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

        .btn-blue1 {
            background-color: #7aa0ff;
            color: white;
            border: 1px solid #7aa0ff;
        }

        .btn-fade {
            background-color: rgb(153, 182, 255);
            color: white;
            border: 1px solid #4a73df;
        }
    </style>

    <style>
        textarea::-webkit-scrollbar {
            width: 6px;
        }

        textarea::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
            border-radius: 3px;
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
                        <h1 class="h3 mb-0 text-gray-800">Add Medical</h1>
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

                            <!-- add medical-->
                            <main class="container-fluid">
                                <p class="text-muted small mb-1">Add New Record</p>
                                <h1 class="h5 fw-bold border-bottom border-dark pb-2 mb-4">Medical Record Name</h1>

                                <?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>
                                <form class="row g-4" method="post" action="">
                                    <!-- Basic Info -->
                                    <div class="col-12 col-md-4">
                                        <h2 class="h6 fw-semibold border-bottom pb-1 mb-3">Basic Info</h2>

                                        <div class="mb-3">
                                            <label for="patientName" class="form-label small fw-semibold">Patient Name</label>
                                            <input type="text" class="form-control form-control-sm bg-light text-muted"
                                                id="patientName"
                                                value="<?php echo isset($prefill['patient_name']) ? htmlspecialchars($prefill['patient_name']) : ''; ?>"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dateVisit" class="form-label small fw-semibold">Date of Visit</label>
                                            <input type="text" class="form-control form-control-sm bg-light text-muted"
                                                id="dateVisit"
                                                value="<?php echo isset($prefill['appointment_date']) ? htmlspecialchars($prefill['appointment_date']) : ''; ?>"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="doctorName" class="form-label small fw-semibold">Doctor/Staff
                                                Name</label>
                                            <input type="text" class="form-control form-control-sm bg-light text-muted"
                                                id="doctorName"
                                                value="<?php echo isset($prefill['doctor']) ? htmlspecialchars($prefill['doctor']) : ''; ?>"
                                                readonly>
                                        </div>
                                        <h2 class="h6 fw-semibold border-bottom pb-1 mb-3">Treatment Plan</h2>
                                        <div class="mb-3">
                                            <label for="recommendedTreatment" class="form-label small fw-semibold">Recommended
                                                Treatment / Procedure</label>
                                            <textarea class="form-control form-control-sm bg-light text-muted" name="recommended_treatment"
                                                id="recommendedTreatment" placeholder="Input Recommended Treatment"
                                                rows="3"></textarea>


                                        </div>
                                        <div class="mb-3">
                                            <label for="prescriptionsGiven" class="form-label small fw-semibold">Prescriptions Given</label>
                                            <input type="text" class="form-control form-control-sm bg-light text-muted" name="prescriptions_given"
                                                id="prescriptionsGiven"
                                                placeholder="Link to select existing prescription or add a new one">
                                        </div>
                                    </div>

                                    <!-- Consultation Details -->
                                    <div class="col-12 col-md-4">
                                        <h2 class="h6 fw-semibold border-bottom pb-1 mb-3">Consultation Details</h2>
                                        <div class="mb-3">
                                            <label for="chiefComplaint" class="form-label small fw-semibold">Chief
                                                Complaint</label>
                                            <input type="text" name="chief_complaint" class="form-control form-control-sm bg-light" id="chiefComplaint"
                                                value="Itchy red rash on forehead">
                                        </div>
                                        <div class="mb-3">
                                            <label for="diagnosis" class="form-label small fw-semibold">Diagnosis</label>
                                            <textarea class="form-control form-control-sm bg-light text-muted mb-3" name="diagnosis" id="diagnosis"
                                                placeholder="Input Diagnosis" rows="3"></textarea>
                                            <textarea class="form-control form-control-sm bg-light text-muted" name="treatment"
                                                id="recommendedTreatment" placeholder="Input Recommended Treatment"
                                                rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="skinType" class="form-label small fw-semibold">Skin Type</label>
                                            <select class="form-select form-select-sm bg-light" name="skin_type" id="skinType">
                                                <option selected>Oily</option>
                                                <option selected>Dry</option>
                                                <option selected>Combination</option>
                                                <option selected>Sensitive</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="clinicalNotes" class="form-label small fw-semibold">Clinical Notes /
                                                Observations</label>
                                            <textarea class="form-control form-control-sm bg-light text-muted" name="clinical_notes"
                                                id="clinicalNotes" placeholder="doctor’s observations, exam findings"
                                                rows="3"></textarea>
                                        </div>
                                        <h2 class="h6 fw-semibold border-bottom pb-1 mb-3">Follow Up Info</h2>
                                        <div class="mb-3">
                                            <label for="instructionsPatient" class="form-label small fw-semibold">Instructions
                                                to Patient</label>
                                            <textarea class="form-control form-control-sm bg-light" name="instructions" id="instructionsPatient"
                                                placeholder="Input Instructions" rows="3"></textarea>
                                        </div>
                                        <!-- <div class="d-flex align-items-center gap-2">
                                            <button type="submit" class="btn btn-sm btn-blue hover-blue fw-semibold" .btn
                                                blue>
                                                Save
                                            </button>
                                            <span class="small text-muted">Optional</span>
                                        </div> -->
                                    </div>

                                    <!-- Upload Images -->
                                    <div class="col-12 col-md-4">
                                        <h2 class="h6 fw-semibold border-bottom pb-1 mb-3">Upload Images</h2>
                                        <div class="mb-2">
                                            <label class="form-label small fw-semibold">Upload</label>
                                        </div>
                                        <div class="border border-secondary border-dashed rounded d-flex flex-column justify-content-center align-items-center text-center p-3"
                                            style="height: 12rem; font-size: 0.6rem;">
                                            <img src="https://storage.googleapis.com/a1aa/image/842b36c6-ae8a-4806-7721-12ea72f59983.jpg"
                                                width="24" height="24" class="mb-1" alt="Cloud upload icon">
                                            <p>
                                                Drag & drop files or <span class="text-primary fw-semibold"
                                                    style="cursor: pointer;">Browse</span>
                                            </p>
                                            <p class="mt-1">Supported formats: JPEG, PNG, GIF, WMV, PDF, PSD, AI, Word, PPT</p>
                                        </div>
                                        <button type="button"
                                            class="btn btn-blue hover-blue btn-sm w-100 mt-3 fw-semibold">UPLOAD FILES</button>
                                        <button type="button"
                                            class="btn btn-blue1 hover-blue btn-sm w-100 mt-2 fw-semibold">DELETE FILE</button>
                                        <div class="d-flex align-items-center mt-2 gap-2">
                                            <button type="submit" class="btn btn-sm btn-blue hover-blue fw-semibold" .btn
                                                blue>
                                                Save
                                            </button>
                                            <a href="javascript:history.go(-2)" class="btn btn-fade text-white hover-blue" style="font-size: 12px;">
                                                <i class="fas fa-arrow-left"></i> Back to Records
                                            </a>
                                            <!-- <span class="small text-muted">Optional</span> -->
                                        </div>
                                    </div>
                                </form>
                            </main>

                            <script
                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
                            </script>

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

</body>

</html>