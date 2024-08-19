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
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

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
            <li class="active">
                <a href="#">
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
                <a href="{{ url('formkaryawan') }}">
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
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="box-info">
                <li>
                    <i class="icon ri-calendar-check-line"></i>
                    <span class="text">
                        <h4>Rp. 254.300.000,00 </h4>
                        <p>Pengeluaran Tahunan</p>
                    </span>
                </li>
                <li>
                    <i class="icon ri-calendar-fill"></i>
                    <span class="text">
                        <h4>Rp. 25.430.000,00 </h4>
                        <p>Pengeluaran Bulanan</p>
                    </span>
                </li>
                <li>
                    <i class="icon ri-calendar-line"></i>
                    <span class="text">
                        <h4>Rp. 254.300,00</h4>
                        <p>Pengeluaran Harian</p>
                    </span>
                </li>
                <li>
                    <i class="icon ri-user-3-fill"></i>
                    <span class="text">
                        <h4>2</h4>
                        <p>Pengguna Aktif</p>
                    </span>
                </li>
            </ul> 
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

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

    <footer>
        <p class="txt-footer">Copyright &copy; 2014-2019 <a href="#" class="brilogistik">BRILOGISTIK KRAMAT JATI.id</a> All rights reserved.</p>
    </footer>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
    <script>
         function logoutUser() {
            // Redirect to the logout route
            window.location.href = "{{ route('logout') }}";
        }
        document.getElementById('confirmLogout').addEventListener('click', function() {
            document.getElementById('logout-form').submit();
        });
    </script>
</body>
</html>
