<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ url('css/karyawan.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <title>BriLogsitik</title>
</head>
<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="image/bri.png" class='image-logo' alt="Logo">
            <img src="image/LogoBri.png" class="text-logo" alt="Logo Text">
        </a>
        <ul class="side-menu top my-3">
            <li><a href="{{ url('/admin') }}"><i class="icn ri-dashboard-fill"></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{url('reimburse')}}"><i class="icn ri-mail-fill"></i><span class="text">Reimburse</span></a></li>
            <li><a href="{{ url('datareimburse') }}"><i class="icn ri-file-list-line"></i><span class="text">Reimburse List</span></a></li>
            <li><a href="{{ url('karyawanadmin') }}"><i class="icn ri-user-fill"></i><span class="text">Karyawan</span></a></li>
            <li><a href="{{ url('karyawanadmin') }}"><i class="icn ri-group-fill"></i><span class="text">Karyawan List</span></a></li>
            <li><a href="{{ url('kategori') }}"><i class='icn bx bx-category'></i><span class="text">Kategori</span></a></li>
            <li><a href="{{ url('jabatan') }}"><i class='icn bx bxs-briefcase-alt-2'></i><span class="text">Jabatan</span></a></li>
            <li class="active"><a href="{{ url('settinguser') }}"><i class="icn bx bxs-cog"></i><span class="text">Settings User</span></a></li>
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
			<i class='bx bx-menu' ></i>
            <p class="txt-p">Halo <span class="txt-name">"{{ $karyawan->nama ?? 'Guest' }}"</span> Selamat Datang</p>
			<form action="#">
			</form>
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
                        <li><a href="#">Setting User</a></li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li><a class="active" href="#">Home</a></li>
                    </ul>
                </div>
            </div>

            <!-- Table Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                                    <h4 class="ml-lg-2">Manage User</h4>
                                </div>
                                <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
                                    <a href="{{ url('karyawanadmin') }}" class="btn btn-success">
                                        <i class='bx bx-plus-circle'></i><span>Add New Employee</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table id="userTable" class="table table-striped table-hover">
                            @include('alert.alertkaryawan')
                            <div id="alert-placeholder"></div>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Personal Number</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUsers as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nik }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-bs-toggle="modal" 
                                        data-id="{{ $user->id_user }}" 
                                        data-nik="{{ $user->karyawan_id }}" 
                                        data-name="{{ $user->name }}" 
                                        data-role="{{ $user->role }}">
                                            <i class="bx bxs-edit" data-bs-toggle="tooltip" title="edit"></i>
                                        </a>
                                        <a href="#deleteEmployeeModal" class="delete" data-bs-toggle="modal" data-id="{{ $user->id }}">
                                            <i class="bx bxs-trash" data-bs-toggle="tooltip" title="delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editEmployeeModalLabel">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editUserForm">
                                            <input type="hidden" id="editId">
                                            <div class="form-group mb-3">
                                                <label for="editNIK">NIK:</label>
                                                <input type="text" id="editNIK" class="form-control" readonly>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="editUsername">Nama:</label>
                                                <input type="text" id="editUsername" class="form-control" placeholder="masukan nama" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="editPassword">Password:</label>
                                                <input type="password" id="editPassword" class="form-control" placeholder="masukan password baru" required>
                                            </div>
                                            {{-- <div class="form-group mb-3">
                                                <label>Password:</label>
                                                <input type="password" class="form-control" name="password" id="confirm_password" placeholder="Confirm password" required>
                                                <div>
                                                    <div id="passwordError" class="text-danger mt-2" style="display: none;">
                                                        Passwords do not match. Please try again.
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success" id="saveChangesButton">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteEmployeeModalLabel">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this user?</p>
                                        <p class="text-danger"><small>This action cannot be undone.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        </div>
                    </div>
                </div>
                {{-- end --}}
            <!-- Table Content -->

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- JS Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('js/karyawan.js') }}"></script>

    <script>
        // Logout User
    function logoutUser() {
      // Redirect to the logout route
      window.location.href = "{{ route('logout') }}";
    }
        $(document).ready(function () {
            $('#userTable').DataTable();

            // Edit button click event
            $('#userTable').on('click', '.edit', function () {
                const row = $(this).closest('tr');
                const id = $(this).data('id');
                const nik = $(this).data('nik');
                const name = $(this).data('name');
                const role = $(this).data('role');

                $('#editId').val(id);
                $('#editNIK').val(nik);
                $('#editUsername').val(name);
                $('#editRole').val(role);
            });

            // save changes //

            $('#saveChangesButton').click(function() {
            var id = $('#editId').val();
            var name = $('#editUsername').val();
            var password = $('#editPassword').val();

            $.ajax({
                url: 'settinguser/' + id,
                type: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    name: name,
                    password: password
                },
                success: function(result) {
                    // Display success alert
                    var alertHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                    result.success +
                                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>';
                // Insert alert above the table
                $('#alert-placeholder').prepend(alertHtml);

                // Optionally refresh page after a delay
                setTimeout(function() {
                    location.reload();
                }, 1000);

                // Close the modal immediately
                $('#editEmployeeModal').modal('hide');

                // Reload the DataTable after the modal is hidden
                $('#editEmployeeModal').on('hidden.bs.modal', function () {
                    table.ajax.reload(null, false);
                });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while updating the user.');
                }
            });
        });
        // end edit

            // Delete button click event
            $('#userTable').on('click', '.delete', function () {
                const id = $(this).data('id');
                $('#confirmDeleteButton').data('id', id);
            });

            // Confirm delete button click event
            $('#confirmDeleteButton').on('click', function () {
                const id = $(this).data('id');

                $.ajax({
                    url: 'settinguser/' + id,
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        // Display success alert
                        var alertHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                        'User data successfully deleted' +
                                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                        '</div>';

                        // Insert alert above the table
                        $('#alert-placeholder').prepend(alertHtml);

                        // Optionally refresh page after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                        // Close the modal immediately
                        $('#deleteEmployeeModal').modal('hide');

                        // Reload the DataTable after the modal is hidden
                        $('#deleteEmployeeModal').on('hidden.bs.modal', function () {
                            table.ajax.reload(null, false);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while deleting the user.');
                    }
                });
            });
        });
        
    </script>
</body>
</html>
