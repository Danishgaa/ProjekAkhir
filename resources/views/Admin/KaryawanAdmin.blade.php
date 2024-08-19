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
    <link rel="stylesheet" href="{{ url('css/karyawan.css') }}">
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
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="icn ri-dashboard-fill"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{url('reimburse')}}">
                    <i class="icn ri-mail-fill"></i>
                    <span class="text">Reimburse</span>
                </a>
            </li>
            <li>
                <a href="{{ url('datareimburse') }}">
                    <i class="icn ri-file-list-line"></i>
                    <span class="text">Reimburse List</span>
                </a>
            </li>
            <li>
                <a href="{{url('formkaryawan')}}">
					<i class="icn ri-user-fill"></i>
                    <span class="text">Karyawan</span>
                </a>
            </li>
            <li class="active">
				<a href="">
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
                    <span class="text">Setting User</span>
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
            <p class="txt-p">Halo <span class="txt-name">"{{ $karyawan->nama ?? 'Guest' }}"</span> Selamat Datang</p>
            <form action="#">
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <a href="#" class="profile">
                <img src="image/icon.jpg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Karyawan</a></li>
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
                                        <h4 class="ml-lg-2 mb-1">Manage Employee</h4>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover" id="employeeTable">
                                @include('alert.alertkaryawan')
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>nik</th>
                                        <th>personal number</th>
                                        <th>no_telp</th>
                                        <th>email</th>
                                        <th>nama</th>
                                        <th>jabatan</th>
                                        <th>date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = $data->firstItem() @endphp
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->id_karyawan }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->personalnumber }}</td>
                                        <td>{{ $item->no_telpon }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="#" class="edit"
                                                data-id="{{ $item->id }}"
                                                data-nik="{{ $item->nik }}"
                                                data-nama="{{ $item->nama }}"
                                                data-no_telpon="{{ $item->no_telpon }}"
                                                data-id_jabatan="{{ $item->id_jabatan }}"
                                                data-date="{{ $item->date }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeModal">
                                                <i class="bx bxs-edit" data-bs-toggle="tooltip" title="Edit"></i>
                                            </a>
                                            <a href="#" class="delete"
                                                data-id="{{ $item->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteEmployeeModal">
                                                <i class="bx bxs-trash" data-bs-toggle="tooltip" title="Delete"></i>
                                            </a>
                                            <a href="#" class="add" 
                                                data-nik="{{ $item->nik }}" 
                                                data-email="{{ $item->email }}"
                                                data-nama="{{ $item->nama }}"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#addEmployeeModal">
                                                <i class="ri-add-box-fill"></i>
                                            </a>     
                                        </td>
                                    </tr>
                                    @php $i++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            

                            {{-- Add Employee Modal --}}
                            <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addEmployeeModalLabel">Add New User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addEmployeeForm" method="POST" action="{{ route('daftar.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nik">Personal Number</label>
                                                    <input type="text" class="form-control" name="nik" id="nik" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addnama">Name</label>
                                                    <input type="text" class="form-control" name="name" id="addnama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" readonly>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Password:</label>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Password:</label>
                                                    <input type="password" class="form-control" name="password" id="confirm_password" placeholder="Confirm password" required>
                                                    <div>
                                                        <div id="passwordError" class="text-danger mt-2" style="display: none;">
                                                            Passwords do not match. Please try again.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-modal mt-3 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-success me-2">Add User</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Add Employee Modal --}}

                            <!-- Edit Employee Modal -->
                            <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editEmployeeForm" method="POST" action="{{ url('karyawanadmin.update') }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" id="editId">
                                                <div class="form-group">
                                                    <label for="editNik">Personal Number</label>
                                                    <input type="text" class="form-control" name="nik" id="editNik">
                                                </div>
                                                <div class="form-group">
                                                    <label for="editNama">Name</label>
                                                    <input type="text" class="form-control" name="nama" id="editNama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editNoTelpon">No Telepon</label>
                                                    <input type="text" class="form-control" name="no_telpon" id="editNoTelpon" required>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="editJabatan">Jabatan</label>
                                                    <select class="form-control" name="id_jabatan" id="editJabatan" required>
                                                        @foreach($jabatanList as $jabatan)
                                                            <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label for="editDate">Date</label>
                                                    <input type="date" class="form-control" name="date" id="editDate" required>
                                                </div>
                                                <div class="btn-modal mt-3 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-success me-2">Save Changes</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Edit Employee Modal -->

                            <!-- Delete Employee Modal -->
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
                            <!-- End Delete Employee Modal -->
                            {{-- logout --}}
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
                              {{-- end --}}
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- End table content -->

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="js/index.js"></script>

    <script>
        function logoutUser() {
		// Redirect to the logout route
		 window.location.href = "{{ route('logout') }}";
	}   
        $(document).ready(function() {
            $('#employeeTable').DataTable();

            // Set up event listeners for edit and delete buttons
            $('#employeeTable').on('click', '.edit', function() {
                var button = $(this); // Use jQuery to get the button
                var id = button.data('id');
                var nik = button.data('nik');
                var nama = button.data('nama');
                var no_telpon = button.data('no_telpon');
                var jabatan = button.data('id_jabatan');
                var date = button.data('date');

                var form = $('#editEmployeeForm');
                form.attr('action', '/karyawanadmin/' + id); // Update form action with the correct route

                // Set the values in the form fields
                $('#editId').val(id);
                $('#editNik').val(nik);
                $('#editNama').val(nama);
                $('#editNoTelpon').val(no_telpon);
                $('#editJabatan').val(jabatan);
                $('#editDate').val(date);
            });

            // add 
            $('#employeeTable').on('click', '.add', function() {
                $('#nik').val($(this).data('nik'));
                $('#email').val($(this).data('email'));
                $('#addnama').val($(this).data('nama'));
            });

            // Validate passwords before form submission
                document.getElementById('addEmployeeForm').addEventListener('submit', function(event) {
                var password = document.getElementById('password').value;
                var confirmPassword = document.getElementById('confirm_password').value;

                if (password !== confirmPassword) {
                    event.preventDefault(); // Mencegah submit form
                    passwordError.style.display = 'block'; // Tampilkan pesan error
                } else {
                    passwordError.style.display = 'none'; // Sembunyikan pesan error jika cocok
                }
            });
            // end validate

            // Event listener for delete modal
        $('#employeeTable').on('click', '.delete', function() {
            var id = $(this).data('id');
            var form = $('#deleteForm');
            form.attr('action', '/karyawanadmin/' + id);
        });
     });
    </script>
</body>
</html>
