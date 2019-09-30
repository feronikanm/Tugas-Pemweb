<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $kodematkul = $_POST['kodematkul'];
      $namamatkul = $_POST['namamatkul'];
      $sks = $_POST['sks'];
      $kelas = $_POST['kelas'];
      //query SQL
      $query = "INSERT INTO matkul (kodematkul, namamatkul, sks, kelas) VALUES('$kodematkul','$namamatkul','$sks','$kelas')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">Data Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "indexmatkul.php"; ?>">Data Mata Kuliah</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mata Kuliah berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mata Kuliah gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Mata Kuliah</h2>
          <form action="formmatkul.php" method="POST">
            
            <div class="form-group">
              <label>Kode Mata Kuliah</label>
              <input type="text" class="form-control" placeholder="Kode Mata Kuliah" name="kodematkul" required="required">
            </div>
            <div class="form-group">
              <label>Nama Mata Kuliah</label>
              <input type="text" class="form-control" placeholder="Nama Mata Kuliah" name="namamatkul" required="required">
            </div>
            <div class="form-group">
              <label>SKS</label>
              <select class="custom-select" name="sks" required="required">
                <option value="">Pilih</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <div class="form-group">
            <label>Kelas Mata Kuliah</label>
              <select class="custom-select" name="kelas" required="required">
                <option value="">Pilih</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>