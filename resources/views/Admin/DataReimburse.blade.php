<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/karyawan.css">
    <title>BriLogsitik</title>
    <style>
        /* Custom styles if needed */
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="image/bri.png" class='image-logo' alt="Logo BRI">
            <img src="image/LogoBri.png" class="text-logo" alt="BRI Logo Text">
        </a>
        <ul class="side-menu top my-3">
            <li>
                <a href="{{ url('karyawan') }}">
                    <i class="icn ri-dashboard-fill"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{url('reimburse')}}">
					<i class="icn ri-file-list-line"></i>
                    <span class="text">Reimburse</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ url('datareimburse') }}">
                    <i class="icn ri-file-list-line"></i>
                    <span class="text">Reimburse List</span>
                </a>
            </li>
            <li>
                <a href="{{ url('datakaryawan') }}">
                    <i class="icn ri-user-fill"></i>
                    <span class="text">Karyawan</span>
                </a>
            </li>
            <li>
                <a href="{{ url('karyawanadmin') }}">
                    <i class="icn ri-group-fill"></i>
                    <span class="text">Karyawan List</span>
                </a>
            </li>
            <li>
                <a href="{{ url('kategori') }}">
                    <i class='icn bx bx-category'></i>
                    <span class="text">Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ url('jabatan') }}">
                    <i class='icn bx bxs-briefcase-alt-2'></i>
                    <span class="text">Jabatan</span>
                </a>
            </li>
            <li>
                <a href="{{ url('settinguser') }}">
                    <i class="icn bx bxs-cog"></i>
                    <span class="text">Settings User</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout" data-bs-toggle="modal" data-bs-target="#logoutEmployeeModal">
                    <i class="icn ri-logout-box-line"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <p class="txt-p mt-3">Halo <span class="txt-name">{{ $karyawan->nama ?? 'Guest' }}</span> Selamat Datang</p>
            <form action="#"></form>
            <a href="#" class="profile">
                <img src="image/icon.jpg" alt="Profile Icon">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Reimburse List</a></li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li><a class="active" href="#">Home</a></li>
                    </ul>
                </div>
            </div>

            <!-- table content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                                    <h4 class="ml-lg-2">List Reimburse</h4>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover" id="employeeTable">
                            @include('alert.alertkaryawan')
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Date</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Noted</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
                                            <i class="bx bxs-edit" data-bs-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal">
                                            <i class="bx bxs-trash" data-bs-toggle="tooltip" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Edit Modal Start -->
                        <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editEmployeeForm" method="POST" action="">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="idInput">
                                            <div class="form-group">
                                                <label for="nikInput">NIK</label>
                                                <input type="number" class="form-control" name="nik" id="nikInput">
                                            </div>
                                            <div class="form-group">
                                                <label for="namaInput">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="namaInput" placeholder="Masukan nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="emailInput">Email</label>
                                                <input type="email" class="form-control" name="email" id="emailInput" placeholder="Masukan email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="noTelpInput">No. Telepon</label>
                                                <input type="text" class="form-control" name="no_telpon" id="noTelpInput" placeholder="Masukan no. telepon" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="dateInput">Tanggal</label>
                                                <input type="date" class="form-control" name="date" id="dateInput" placeholder="Masukan tanggal" required>
                                            </div>
                                            <div class="btn-modal mt-3 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success me-2">Update</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Modal End -->

                        <!-- Delete Modal Start -->
                        <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteEmployeeModalLabel">Delete Employee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="deleteEmployeeForm" method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" id="deleteIdInput">
                                            <p>Are you sure you want to delete this employee?</p>
                                            <div class="btn-modal mt-3 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-danger me-2">Delete</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal End -->
                        <!-- modal logout -->
                        <div class="modal fade" tabindex="-1" id="logoutEmployeeModal" role="dialog">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">logout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to logout?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="confirmLogout" onclick="logoutUser()">yes</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">no</button>
                            </div>
                            </div>
                            </div>
                        </div>
                    <!-- modal end logout -->
                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->

    </section>
    <!-- CONTENT -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="js/karyawan.js"></script>
    <script>
         function logoutUser() {
            // Redirect to the logout route
            window.location.href = "{{ route('logout') }}";
        }
        $(document).ready(function () {
            $('#employeeTable').DataTable();
        });
    </script>
</body>

</html>
