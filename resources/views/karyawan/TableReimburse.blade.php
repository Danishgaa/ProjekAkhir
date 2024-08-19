<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{url('css/karyawan.css')}}">
    <title>BriLogsitik</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="image/bri.png" class='image-logo'></img>
            <img src="image/LogoBri.png" class="text-logo"></img>
        </a>
        <ul class="side-menu top my-3">
            <li><a href="{{url('karyawan')}}"><i class="icn ri-dashboard-fill"></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ url('reimburseform') }}"><i class="icn ri-mail-fill"></i><span class="text">Reimburse</span></a></li>
            <li class="active"><a href=""><i class="icn ri-file-list-line"></i><span class="text">Reimburse List</span></a></li>
        </ul>
        <ul class="side-menu">
            <li><a href="#" class="logout" data-bs-toggle="modal" data-bs-target="#logoutEmployeeModal"><i class="icn ri-logout-box-line"></i><span class="text">Logout</span></a></li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <p class="txt-p">Halo <span class="txt-name">"{{ $karyawan->nama ?? 'Guest' }}"</span> Selamat Datang</p>
            <form action="#"></form>
            <input type="checkbox" id="switch-mode" hidden>
            <a href="#" class="profile"><img src="image/icon.jpg"></a>
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
                        <div class="col-md-12">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                                        <h4 class="ml-lg-2">List Reimburse</h4>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover" id="employeeTable">
                                <!-- ngambil dari eksternal dir alert file alert.blade.php -->
                                @include('alert.alertkaryawan')
                                <!-- end -->
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
                                            <a href="#" class="edit"
                                                {{-- data-id="{{ $item->id }}"
                                                data-nik="{{ $item->nik }}"
                                                data-nama="{{ $item->nama }}"
                                                data-email="{{ $item->email }}"
                                                data-no_telpon="{{ $item->no_telpon }}"
                                                data-id_jabatan="{{ $item->id_jabatan }}"
                                                data-date="{{ $item->date }}" --}}
                                                data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeModal">
                                                <i class="bx bxs-edit" data-bs-toggle="tooltip" title="Edit"></i>
                                            </a>
                                            <a href="#" class="delete"
                                                {{-- data-id="{{ $item->id }}" --}}
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteEmployeeModal">
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
                                                {{-- <div class="form-group">
                                                    <label for="jabatanInput">Jabatan</label>
                                                    <select class="form-select" name="id_jabatan" id="jabatanInput" aria-label="Default select example">
                                                        <option value="" selected class="placeholder" disabled hidden>-pilih jabatan-</option>
                                                        @foreach($jabatanList as $jabatan)
                                                            <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
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
                                            <form id="deleteForm" method="POST" action="">
                                                @csrf
                                                @method('DELETE')
                                                <p>Are you sure you want to delete this employee?</p>
                                                <div class="d-flex justify-content-end">
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
                              <button type="button" class="btn btn-success" id="confirmLogout" data-logout-url="{{ route('logout') }}" onclick="logoutUser()">yes</button>
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">no</button>
                            </div>
                            </div>
                          </div>
                        </div>
                          <!-- modal end logout -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <!-- Footer -->
    <footer>
        <p class="txt-footer">Copyright &copy; 2024 <a href="#" class="brilogistik">BRILOGISTIK KRAMAT JATI.id</a> All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
    // logout
    function logoutUser() {
	  // Redirect to the logout route
	  window.location.href = "{{ route('logout') }}";
    }   
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize DataTable
        $('#employeeTable').DataTable();
    
        var editEmployeeModal = document.getElementById('editEmployeeModal');
        var deleteEmployeeModal = document.getElementById('deleteEmployeeModal');
    
        // Event listener for edit modal
        editEmployeeModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nik = button.getAttribute('data-nik');
            var nama = button.getAttribute('data-nama');
            var email = button.getAttribute('data-email');
            var no_telpon = button.getAttribute('data-no_telpon');
            var jabatan = button.getAttribute('data-id_jabatan');
            var date = button.getAttribute('data-date');
    
            var form = document.getElementById('editEmployeeForm');
            form.action = '/tablekaryawan/' + id;  // Update form action with the correct route
    
            document.getElementById('idInput').value = id;
            document.getElementById('nikInput').value = nik;
            document.getElementById('namaInput').value = nama;
            document.getElementById('emailInput').value = email;
            document.getElementById('noTelpInput').value = no_telpon;
            document.getElementById('jabatanInput').value = jabatan;
            document.getElementById('dateInput').value = date;
        });
    
        // Event listener for delete modal
        deleteEmployeeModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
    
            var form = document.getElementById('deleteForm');
            form.action = '/tablekaryawan/' + id;
        });
    });
    </script>
</body>
</html>
