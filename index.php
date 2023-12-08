<?php
 $host = "localhost";
 $user = "root";
 $password = "";
 $db = "akademik";

 $conn = mysqli_connect($host, $user, $password, $db);

 if(!$conn){
    die ("Koneksi gagal:" . mysqli_connect_error());
 }
 $nim = "";
 $username = "";
 $jenis ="";
 $jurusan = "";
 $alamat = "";
 $suksess = "";
 $error = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];  
} else{
    $op = "";
}

if($op == 'delete'){
    $id = $_GET['id'];
    $sql1  = "delete from mahasiswa where id='$id'";
    $q1 = mysqli_query($conn,$sql1);
    if($q1){
        $suksess = "Berhasil hapus data";
    } else{
        $error = "Gagal delete data";
    }
} 

if($op == 'edit'){
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $q1 = mysqli_query($conn,$sql1);
    $r1 = mysqli_fetch_array($q1);
    $nim = $r1['nim'];
    $username = $r1['username'];
    $jenis = $r1['jenis'];
    $jurusan = $r1['jurusan'];
    $alamat = $r1['alamat'];

    if($nim == ''){
        $error = "data tidak ditemukan";
    }

 if(isset($_POST['simpan'])){ //untuk create
    $nim = $_POST['nim'];
    $username = $_POST['username'];
    $jenis = $_POST['jenis'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];

    if ($nim && $username && $jenis && $jurusan && $alamat) {
        if ($op == 'edit') { // untuk update
            $sql1 = "update mahasiswa set nim = '$nim', username ='$username', jenis ='$jenis', jurusan = '$jurusan', alamat = '$alamat' where id = '$id'";
            $q1 = mysqli_query($conn, $sql1);
            if ($q1) {
                $suksess = "Data Berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { // untuk insert
            $sqli = "insert into mahasiswa(nim,username,jenis,jurusan,alamat) values('$nim','$username','$jenis','$jurusan','$alamat')";
            $q1 = mysqli_query($conn, $sqli);
            if ($q1) {
                $suksess = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silahkan isi dengan benar";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <title>Tugas</title>
    <link rel="stylesheet" type="text/css">
    <style>
        .mx-auto {
            width: 800px;
        }
        .card {
            margin-top: 10px;
        }
    </style>
    <script>
        function myfunction() {
            var dropdown = document.getElementById("menudropdown");
        }
    </script>
</head>

<body>
    <header>
        <div class="judul">
            <h1>Sistem informasi akademik</h1>
        </div>
        <div class="dropdown">
            <button onclick="myfunction()" class="dropbtn">Menu</button>
            <div id="menudropdown" class="dropdown-content">
                <a href="#Home">Home</a>
                <a href="#Admin">Admin</a>
                <a href="#Wali Mahasiswa">Wali Mahasiswa</a>
                <a href="#Mahasiswa">Mahasiswa</a>
            </div>
        </div>
    </header>
    <div class="container">
        <section id="Home">
            <h2>Thomas Christian K</h2>
            <p>Disini saya membuat form Mahasiswa.</a></p>
        </section>
        <div class="max-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Formulir Login</h3>
                </div>
                <div class="card-body">
                    <?php
                    if($error){
                    ?>
                       <div class="alert alert-danger" role="alert">
                          <?php echo $error ?>
                          </div>
                    <?php
                    }
                    ?>
                    <?php
                    if($suksess){
                    ?>
                       <div class="alert alert-success" role="alert">
                          <?php echo $suksess ?>
                          </div>
                    <?php
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="form" id="Mahasiswa">
                            <h5>Data Mahasiswa</h5>
                            <div class="row g-3 align-items-center">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="Nim" class="col-form-label">Nim</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="Nim" name="nim" class="form-control" value ="<?php echo $nim ?>">
                                    </div>
                                </div></br>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="Username" class="col-form-label" >Username</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="Usename"  name="username" class="form-control" value ="<?php echo $username ?>">
                                    </div>
                                </div></br>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="Jns_kelamin" class="col-form-label">Jenis Kelamin</label>
                                    </div>
                                   <select class="form-control" id="Jns_Kelamin" name="jenis">
                                    <option value="">-Jenis Kelamin-</option>
                                    <option value="laki_laki"<?php if($jenis == "laki_laki") echo "selected"?>>Laki-Laki</option>
                                    <option value="perempuan"<?php if($jenis == "perempuan") echo "selected"?>>Perempuan</option>
                                 </select>
                               </div>
                               </div></br>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="Jurusan" class="col-form-label">Jurusan</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="Jurusan" name= "jurusan" class="form-control" value ="<?php echo $jurusan ?>">
                                    </div>
                                </div></br>
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="Alamat" class="col-form-label">Alamat</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="Alamat" name="alamat" class="form-control" value ="<?php echo $alamat ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                                </div>                 
                    </form>
                </div>
            </div>
            <div class="card" style="margin-top: 20px;">
                <div class="card-header text-white bg-secondary">
                    <h3>Data diri</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nim</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">ALamat</th>
                                <th scope="col">id_wali</th>
                                <th scope="col">Edit</th>
                            </tr>
                            <tbody>
                                <?php
                                $sql2 = "select * from mahasiswa order by id desc";
                                $q2 = mysqli_query($conn,$sql2);
                                $urut = 1;
                                while($r2 = mysqli_fetch_array($q2)){
                                    $id = $r2['id'];
                                    $nim = $r2['nim'];
                                    $username = $r2['username'];
                                    $jenis = $r2['jenis'];
                                    $jurusan = $r2['jurusan'];
                                    $alamat = $r2['alamat'];

                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++ ?></th>
                                        <td scope="row"><?php echo $nim++ ?></td>
                                        <td scope="row"><?php echo $username++ ?></td>
                                        <td scope="row"><?php echo $jenis++ ?></td>
                                        <td scope="row"><?php echo $jurusan++ ?></td>
                                        <td scope="row"><?php echo $alamat++ ?></td>
                                        <td scope="row"></td>
                                        <td scope="row">
                                        <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                        <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete')"><button type="button" class="btn btn-danger">delete</button></a>
                                        </td>
                                    </tr>
                                    <?php

                                }
                                ?>
                        </tbody>
                        </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <div class="card-footer" id="footer">
        <p>&copy; 2023 Thomas Christian Kuntolukito</p>
    </div>
</footer>

</html>