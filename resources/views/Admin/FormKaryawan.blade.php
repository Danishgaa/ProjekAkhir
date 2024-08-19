<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{url('css/reimburse.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
	<title>BriLogsitik</title>
</head>
<body>
    {{-- sidebar --}}
    <section id="sidebar">
		<a href="#" class="brand">
			<img src="image/bri.png" class='image-logo'></img>
			<img src="image/LogoBri.png" class="text-logo"></img>
		</a>
		<ul class="side-menu top my-3">
			<li>
				<a href="{{url('karyawan')}}">
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
            <li>
                <a href="{{ url('datareimburse') }}">
                    <i class="icn ri-file-list-line"></i>
                    <span class="text">Reimburse List</span>
                </a>
            </li>
			<li class="active">
				<a href="{{url('datakaryawan')}}">
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
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
            <p class="txt-p mt-3">Halo <span class="txt-name">"{{ $karyawan->nama ?? 'Guest' }}"</span> Selamat Datang</p>
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
							<a href="#">Karyawan</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>
		<!--  MAIN  -->
          <div class="container">
            <div class="card">
                <div class="card-header text-white text-center">
                    Form Data Karyawan
                </div>
                <div class="card-body">
					{{-- ngambil dari eksternal dir alert file alert.blade.php --}}
                    @include('alert.alertkaryawan')
                    {{-- end --}}
                    <form action="{{url('datakaryawan')}}" method="post">
						@csrf
                         <div class="mb-3 row">
                            <label for="idreimburse" class="col-sm-2 col-form-label">Personal Number:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="nik" value="{{ old('nik') }}" id="inputid" placeholder="masukan NIK kalian">
                            </div>
                        </div> 
                        <div class="mb-3 row">
                            <label for="idreimburse" class="col-sm-2 col-form-label">Nama:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ old('nama') }}" name="nama" id="inputnama" placeholder="masukan nama kalian">
                            </div>
                        </div> 
                        <div class="mb-3 row">
                            <label for="idreimburse" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputemail" placeholder="masukan email aktif">
                            </div>
                        </div> 
                        <div class="mb-3 row">
                            <label for="idreimburse" class="col-sm-2 col-form-label">No Telp:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="no_telpon" value="{{ old('no_telpon') }}" id="inputnotelpon" placeholder="masukan nomor aktif">
                            </div>
                        </div> 
                        {{-- <div class="mb-3 row">
                            <label for="idkaryawan" class="col-sm-2 col-form-label">Jabatan:</label>
                            <div class="col-sm-10">
								<select class="form-select" name="jabatan" aria-label="Default select example" required>
									<option value="" selected class="placeholder" disabled hidden>-pilih jabatan-</option>
									@foreach($jabatanList as $jabatan)
										<option value="{{ $jabatan->id }}" {{ old('jabatan') == $jabatan->id ? 'selected' : '' }}>{{ $jabatan->jabatan }}</option>
									@endforeach
								</select>
                            </div>
                        </div> --}}
                        <div class="mb-3 row" id="date">
                            <label for="datetime-local" class="col-sm-2 col-form-label">Date:</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="date" class="form-control" id="datetime">
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-success btn-custom">Add</button>
                    </form>
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
                <button type="button" class="btn btn-success" id="confirmLogout" data-logout-url="{{ route('logout') }}" onclick="logoutUser()">yes</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">no</button>
			  </div>
			  </div>
			</div>
		  </div>
			<!-- modal end logout -->
        
        </section>
	<!-- CONTENT  -->
    
    <footer>
        <p class="txt-footer">Copyright &copy; 2014-2019 <a href="#" class="brilogistik">BRILOGISTIK KRAMAT JATI.id</a> All rights reserved.</p>
    </footer>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="js/karyawan.js"></script>
    <script>
        function logoutUser() {
            // Redirect to the logout route
            window.location.href = "{{ route('logout') }}";
        }
    </script>
</body>
</html>