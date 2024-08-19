<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
    <link rel="stylesheet" href="{{url('css/category.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
      <li>
				<a href="{{url('karyawanadmin')}}">
					<i class="icn ri-group-fill"></i>
					<span class="text">Karyawan List</span>
				</a>
			</li>
			<li  class="active">
				<a href="">
					<i class='icn bx bx-category'></i>
					<span class="text">Kategori</span>
				</a>
			</li>
			<li>
				<a href="{{url('jabatan')}}">
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
		
		<ul class="side-menu bottom">
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
						<li>
							<a href="#">Kategori</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

   
		<!--  MAIN  -->
          <!-- input category -->
          <div class="container">
            <div class="card rounded-0">
                <div class="card-header text-white rounded-0"><b>Form Kategori</b></div>
                <div class="card-body">
                  {{-- ngambil dari eksternal dir alert file alert.blade.php --}}
                    @include('alert.alert')
                    {{-- end --}}
                    <form action="{{ url('kategori') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="kategoriname" class="col-sm-2 col-form-label">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control rounded-0" name="nama" id="inputkategoriname" placeholder="input nama kategori">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-custom">Add</button>
                    </form>
                </div>
            </div>
        </div>
        
            <!-- end input category -->

             
            <!-- table data -->
            <div class="container">
              <div class="card rounded-0">
                  <div class="card-header text-white bg-dark rounded-0"><b>Data Kategori</b></div>
                  <div class="card-body">
                      <table id="kategoriTable" class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Kategori</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody class="table-group-divider">
                              <?php $i = $data->firstItem(); ?>
                              @if ($data->count())
                                    @foreach ($data as $item)
                                        <tr>
                                            <td scope="row">{{ $i }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <a href="#" class="edit" data-id="{{ $item->id_category }}" data-name="{{ $item->nama }}" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
                                                    <i class="bx bxs-edit" data-bs-toggle="tooltip" title="edit"></i>
                                                </a>
                                                <a href="#" class="delete" data-id="{{ $item->id_category }}" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal">
                                                    <i class="bx bxs-trash" data-bs-toggle="tooltip" title="delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">No results found</td>
                                    </tr>
                                @endif 
                          </tbody>
                      </table>
                     
                  </div>
              </div>
          </div>         

              <!-- edit modal -->
              <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="editForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            {{-- <input type="hidden" name="id" id="hiddenKaetegoriId">
                            <div class="form-group">
                              <label for="kategoriIdInput">Id Kategori:</label>
                              <input type="text" class="form-control" id="kategoriIdInput" name="kategoriId" value="" readonly>
                            </div> --}}
                            <div class="form-group mt-3">
                              <label for="kategoriName">Nama Kategori:</label>
                              <input type="text" class="form-control" id="kategoriName" name="nama" value="">
                            </div>
                            <div class="btn-modal d-flex justify-content-end mt-3">
                              <button type="submit" class="btn btn-success ms-3">Update</button>
                              <button type="submit" class="btn btn-danger ms-2" data-bs-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
              </div>

            <!-- edit modal end -->

            <!-- Delete Modal -->
          <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this record?</p>
                        <p class="text-danger"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
		<!-- modal end logout -->
    
    <!-- <footer>
        <p class="txt-footer">Copyright &copy; 2014-2019 <a href="#" class="brilogistik">BRILOGISTIK KRAMAT JATI.id</a> All rights reserved.</p>
    </footer>     -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
   
    <script>
       // Logout User
    function logoutUser() {
      // Redirect to the logout route
      window.location.href = "{{ route('logout') }}";
    }
      $(document).ready(function() {
    // Initialize DataTables
    $('#kategoriTable').DataTable();
    // Edit
    $('.edit').on('click', function() {
      var id = $(this).data('id');
      var name = $(this).data('name');

      $('#hiddenKategoriId').val(id);
      $('#kategoriIdInput').val(id);
      $('#kategoriName').val(name);

      var formAction = "{{ url('kategori') }}/" + id;
      $('#editForm').attr('action', formAction);
    });

    // Delete
    $('.delete').on('click', function() {
      var id = $(this).data('id');
      var formAction = "{{ url('kategori') }}/" + id;
      $('#deleteForm').attr('action', formAction);
    });
  });
    </script>
</body>
</body>
</html>