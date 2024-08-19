<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{url('css/reimburse.css')}}">
	<title>BriLogistik</title>
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
				<a href="{{ url('karyawan') }}">
					<i class="icn ri-dashboard-fill"></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			
			<li class="active">
				<a href="">
					<i class="icn ri-mail-fill"></i>
					<span class="text">Reimburse</span>
				</a>
			</li>
			<li>
				<a href="{{ url('tablereimburse') }}">
					<i class="icn ri-file-list-line"></i>
					<span class="text">Reimburse List</span>
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
			<p class="txt-p mt-3">Halo <span class="txt-name">"{{ $karyawan->nama ?? 'Guest' }}"</span> Selamat Datang</p>
			<form action="#"></form>
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
							<a href="#">Reimburse</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- MAIN -->
			<div class="container">
				<div class="card">
					<div class="card-header text-white text-center">
						Reimburse Data
					</div>
					<div class="card-body">
						<form action="{{url('datakaryawan')}}" method="post" enctype="multipart/form-data">
							@csrf
							{{-- <div class="mb-3 row">
								<label for="idkaryawan" class="col-sm-2 col-form-label">Karyawan</label>
								<div class="col-sm-10">
									<select name="nik" id="nik" class="form-select" required>
										<option value="" disabled selected>- Pilih Karyawan -</option>
										@foreach($karyawanList as $karyawan)
											<option value="{{ $karyawan->nik }}">
												{{ $karyawan->nik }} - {{ $karyawan->nama }} - {{ $karyawan->jabatan->jabatan }}
											</option>
										@endforeach
									</select>
								</div>												
							</div>
							<div class="mb-3 row">
								<label for="idreimburse" class="col-sm-2 col-form-label">Category</label>
								<div class="col-sm-10">
									<select name="category_id" id="category" class="form-select" required>
										<option value="" disabled selected>- Pilih Kategori -</option>
										@foreach($categoryList as $category)
											<option value="{{ $category->id }}">{{ $category->nama }}</option>
										@endforeach
									</select>
								</div>
							</div> --}}
							<div class="mb-3 row" id="date">
								<label for="datetime-local" class="col-sm-2 col-form-label">Date</label>
								<div class="col-sm-10">
									<input type="datetime-local" class="form-control" id="datetime">
								</div>
							</div>
							<div class="mb-3 row" id="date">
								<label for="file" class="col-sm-2 col-form-label">Harga</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="harga" placeholder="masukan harga reimbursement">
								</div>
							</div>
							<div class="mb-3 row" id="date">
								<label for="file" class="col-sm-2 col-form-label">File</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="datetime">
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
					  <button type="button" class="btn btn-success" id="confirmLogout" onclick="logoutUser()">yes</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">no</button>
				  </div>
				  </div>
				</div>
			  </div>
			  <!-- modal end logout -->
		</main>
	</section>
	<!-- CONTENT -->

	<footer>
		<p class="txt-footer">Copyright &copy; 2014-2019 <a href="#" class="brilogistik">BRILOGISTIK KRAMAT JATI.id</a> All rights reserved.</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="js/index.js"></script>
	<script>
		 function logoutUser() {
      // Redirect to the logout route
      window.location.href = "{{ route('logout') }}";
    }
		document.addEventListener('DOMContentLoaded', function() {
			const dateContainer = document.getElementById('date');
			const datetimeInput = dateContainer.querySelector('input[type="datetime-local"]');

			const today = new Date();
			const year = today.getFullYear();
			const month = String(today.getMonth() + 1).padStart(2, '0');
			const day = String(today.getDate()).padStart(2, '0');
			const hours = String(today.getHours()).padStart(2, '0');
			const minutes = String(today.getMinutes()).padStart(2, '0');

			const formattedDate = `${year}-${month}-${day}T${hours}:${minutes}`;

			datetimeInput.min = formattedDate;
			datetimeInput.max = formattedDate;
			datetimeInput.value = formattedDate;

			// Format input to currency
			const hargaInput = document.getElementById('harga');
			hargaInput.addEventListener('input', function(e) {
				let value = e.target.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
				value = parseInt(value, 10).toLocaleString('id-ID'); // Format sebagai angka lokal Indonesia
				e.target.value = value; // Setel nilai input menjadi format angka lokal
			});
		});
	</script>
</body>
</html>
