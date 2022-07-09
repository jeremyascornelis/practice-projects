<html>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
body {
	color: #fff;
	/* background: #EEEEEE; */
	font-family: 'Roboto', sans-serif;
}
.form-control {
	font-size: 15px;
}
.form-control, .form-control:focus, .input-group-text {
	border-color: #e1e1e1;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 400px;
	margin: 0 auto;
	padding: 30px 0;		
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr {
	margin: 0 -30px 20px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 15px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
}	
.signup-form .btn, .signup-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #0C56D0 !important;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #1257C9 !important;
}
.signup-form a {
	color: #fff;	
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #19aa8d;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
}
.signup-form .fa-paper-plane {
	font-size: 18px;
}
.signup-form .fa-check {
	color: #fff;
	left: 17px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}
</style>
</head>
<body>
<div class="signup-form">
    <form action="<?= BASEURL; ?>/register/daftar" method="POST">
		<h2>Registrasi</h2>
		<p>Silahkan isi form ini untuk membuat akun!</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>                    
				</div>
				<input type="text" class="form-control" name="username" placeholder="Username" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-phone"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
		<!-- <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required="required">
			</div>
        </div> -->
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-address-card"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-map"></span>
					</span>                    
				</div>
				<select class="form-control" name="nama_provinsi">
                            
                </select>
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fas fa-city" style="font-size: 20px;"></span>
					</span>                    
				</div>
				<select class="form-control" name="nama_distrik">
                            
                </select>
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-map-pin"></span>
					</span>                    
				</div>
				<select class="form-control" name="kodepos">
                            
                </select>
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<select name="gender" id="gender" class="form-control">
                    <option>Pilih gender</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
			</div>
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Daftar</button>
        </div>
    </form>
	<div class="text-center" style="color: #21313C;">Sudah punya akun? <a href="<?= BASEURL; ?>/login" style="color: #21313C;">Login</a></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'post',
            url: '<?= BASEURL; ?>/register/getDataProvinsi',
            success: function(hasil_provinsi) {
                // console.log(hasil);
                $("select[name=nama_provinsi]").html(hasil_provinsi);
            }
        });

        $("select[name=nama_provinsi]").on("change", function() {
            //get id_provinsi that has been change
            let id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: 'post',
                url: '<?= BASEURL; ?>/register/getDataDistrik',
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_distrik) {
                    // console.log(hasil_distrik);
                    $("select[name=nama_distrik]").html(hasil_distrik);
                }
            });

            $.ajax({
                type: 'post',
                url: '<?= BASEURL; ?>/register/getDataKodePos',
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kodepos) {
                    // console.log(hasil_distrik);
                    $("select[name=kodepos]").html(hasil_kodepos);
                }
            });
        })
    });
</script>

</body>
</html>