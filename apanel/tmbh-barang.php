<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <link href='../images/small_logo_.png' rel='shortcut icon'>
    <title>PPTPM UKDW</title>
    <meta name="description" content="">
<?php
    require "../connection.php";
    session_start();
    $timeout = 900;

    if(isset($_SESSION['timeout'])) {
        $duration = time() - (int)$_SESSION['timeout'];
        if($duration > $timeout) {
            session_destroy();
            header("location:index.php");
        }
    }
     
    $_SESSION['timeout'] = time();

    //generate kode pinjam
    $qry = "SELECT COUNT(*) AS num FROM log_peminjaman";
    $digitakhir = $conn->query($qry);
    $digitakhir = $digitakhir->fetch_assoc();
    if ($digitakhir["num"] < 10)
    {
        $digitakhir= "P00".($digitakhir["num"]+1);
    }
    elseif ($digitakhir["num"] >= 10) 
    {
       $digitakhir= "P0".($digitakhir["num"]+1);
    }
    else
    {
        $digitakhir= "P".($digitakhir["num"]+1);
    }

if(isset($_POST["submit"]))
{
    $brg = $_POST['barang'];
    $pinjam = $_POST['tglpinjam'];
    $kembali= $_POST['tglkembali'];
    $status = $_POST['status'];

    $cekstok = mysqli_query($conn, "SELECT stok from daftar_barang where kode_barang='P001'") or die(mysqli_error());

    $row = $cekstok->fetch_assoc();

    $dipinjam = "SELECT COUNT(*) AS num from log_peminjaman where kode_barang='$brg' && status='PINJAM'";
    $lihatstok = $conn->query($dipinjam);
    $lihatstok = $lihatstok->fetch_assoc();
   
    if ($row['stok'] < $lihatstok["num"] ) 
    {
        echo "<script> alert('Barang tidak tersedia'); </script>";
        $uploadOk = 0;
    }
    else
    {
        $sql = "INSERT INTO log_peminjaman VALUES('$digitakhir','$brg','$pinjam','$kembali','$status')";
        $conn->query($sql);
        $uploadOk = 1;
    }
}
    
?>
<!--

Sprint Template

http://www.templatemo.com/tm-401-sprint

-->
    <meta name="viewport" content="width=device-width">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/normalize.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/templatemo_misc.css">
    <link rel="stylesheet" href="../css/templatemo_login.css">
    <link rel="stylesheet" href="../css/templatemo_style.css">


    <!-- start: CSS -->
    <link id="bootstrap-style" href="../cssform/bootstrap.min.css" rel="stylesheet">
   <!--  <link href="../cssform/bootstrap-responsive.min.css" rel="stylesheet"> -->
    <!-- <link id="base-style" href="cssform/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="cssform/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'> -->
    <!-- end: CSS -->


    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body style="background: url(foto.JPG)">
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    
     <div id="front">
        <div class="site-header">
            <div class="container">
               <div class="row">

                    <div class="col-md-8 col-sm-6 col-xs-6">
                        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                        <div class="main-menu">
                            <ul>
                                <li><a href="#services">Daftar_Barang</a></li>
                                <li><a href="#inventory">Log_Peminjaman</a></li>
                                <li><a href="logout.php"><?php echo $_SESSION['user'];?>, Logout</a></li>
                            </ul>
                            <ul>
                                
                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
                <div class="row">

                    <div class="col-md-8 col-sm-6 col-xs-6">
                        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                        <div class="main-menu">
                            <ul>
                                <li><a href="#services">Daftar_Barang</a></li>
                                <li><a href="#inventory">Log_Peminjaman</a></li>
                                <li><a href="logout.php"><?php echo $_SESSION['user'];?>, Logout</a></li>
                            </ul>
                            <ul>
                                
                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->
    </div> <!-- /#front -->

    <!-- /#content -->
    <div class="container text-center" >

        <div class="center-coloumn">
            <h2 style="color: white">Data Penyewa</h2><br>
            <form action="tmbh-barang.php" method="post">
              <!--   Kode Pinjam: <br> -->
                <input type="hidden" name="kodepinjam" value="<?php echo $digitakhir; ?>">
                Barang : <br>
               <select id="barang" name="barang" width="430" style="width: 430px">
                <option value="">--Pilih Barang--</option>         
                <?php
                $sqlQuery ="SELECT * FROM daftar_barang";
                $qry=$conn->query($sqlQuery);
                while ($data=mysqli_fetch_array($qry)) 
                {   
                ?>
                        
                                <option value="<?php echo $data['kode_barang'] ?>"><?php echo $data['nama_barang']?></option>
                                                    
                <?PHP
                }
                ?>       
                </select><br><br>                 
                Tanggal Pinjam : <br>
                <input type="date" name="tglpinjam" style="height: 33px"><br><br>
                Tanggal Kembali : <br>
                <input type="date" style="height: 33px" name="tglkembali"><br><br>
                Status : <br>
                <select name="status" id="status">
                    <option value="PINJAM">PINJAM</option>
                    <option value="KEMBALI">KEMBALI</option>
                </select>
              <!--   Masukkan Gambar : <br> -->
                <!-- <button type="submit" onclick="alert('Barang Tersimpan !')" style="margin-left: 60%; margin-top: 20px">Simpan</button> -->
                <div class="row">
                    <?php
                    if(isset($uploadOk))
                    {
                        if($uploadOk==1) echo '<span style="color: #00FF00"><p style="position: fixed; bottom: 30; width:30%; text-align: center">Data berhasil disimpan!</p></span>';
                    }
                    ?>
                      <button type="submit" name="submit"  class='btn btn-success' style="margin-left: 65%;">Simpan</button>
                      <button type="button" onclick="location.href='admpanel.php';" class='btn btn-default'><font color="black">Kembali</font></button>
                </div>
            </form>
        </div>


        <div class="col-md-5 col-sm-12">
            
        </div>
            
        

    </div>

   
    <script src="../js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/jquery.easing-1.3.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>

</body>
</html>