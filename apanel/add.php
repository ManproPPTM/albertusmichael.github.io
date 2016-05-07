<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
    //count records
    $q = "SELECT COUNT(*) AS num FROM daftar_barang";
    $fname = $conn->query($q);
    $fname = $fname->fetch_assoc();
    $fname = "P".($fname["num"]+1);

    $_SESSION['timeout'] = time();
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])&&basename($_FILES["gbrbrg"]["name"])!="") {
        $target_dir = "../images/products/";
        $target_file = $target_dir . basename($_FILES["gbrbrg"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
        {
            $uploadOk = 0;
        }
        else
        {
            $check = getimagesize($_FILES["gbrbrg"]["tmp_name"]);
            if($check !== false&&$_POST["namabrg"]!=""&&$_POST["stkbrg"]!="") {
                $width = 400;
                $height = 400;
                /* Get original image x y*/
                list($w, $h) = getimagesize($_FILES['gbrbrg']['tmp_name']);
                /* calculate new image size with ratio */
                $ratio = max($width/$w, $height/$h);
                $h = ceil($height / $ratio);
                $x = ($w - $width / $ratio) / 2;
                $w = ceil($width / $ratio);
                /* new file name */
                $path = strrev(__DIR__);
                $path = substr($path, 6);
                $path = strrev($path);
                $path = $path.'images/products/'.$fname.".".$imageFileType;
                /* read binary data from image file */
                $imgString = file_get_contents($_FILES['gbrbrg']['tmp_name']);
                /* create image from string */
                $image = imagecreatefromstring($imgString);
                $tmp = imagecreatetruecolor($width, $height);
                imagecopyresampled($tmp, $image,
                    0, 0,
                    $x, 0,
                    $width, $height,
                    $w, $h);
                /* Save image */
                switch ($_FILES['gbrbrg']['type']) {
                case 'image/jpeg':
                    imagejpeg($tmp, $path, 100);
                    break;
                case 'image/png':
                    imagepng($tmp, $path, 0);
                    break;
                case 'image/gif':
                    imagegif($tmp, $path);
                    break;
                default:
                    $uploadOk = 0;
                    break;
                }
                /* cleanup memory */
                imagedestroy($image);
                imagedestroy($tmp);
                
                //insert database
                $q = "INSERT INTO daftar_barang(kode_barang, nama_barang, stok, imgpath) VALUES('".$fname."','".$_POST['namabrg']."','".$_POST['stkbrg']."','".$fname.".".$imageFileType."')";
                $conn->query($q)===true;
            } else {
                $uploadOk = 0;
            }
        }
    }
    else if(isset($_POST["submit"]))
    {
        if($_POST["namabrg"]!=""&&$_POST["stkbrg"]!="")
        {
            $q = "INSERT INTO daftar_barang(kode_barang, nama_barang, stok) VALUES('".$fname."','".$_POST["namabrg"]."','".$_POST["stkbrg"]."')";
            $conn->query($q);
            $uploadOk = 1;
        }
        else $uploadOk = 0;
    }

    //re-count records
    $q = "SELECT COUNT(*) AS num FROM daftar_barang";
    $fname = $conn->query($q);
    $fname = $fname->fetch_assoc();
    $fname = "P".($fname["num"]+1);
?>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <link href='../images/small_logo_.png' rel='shortcut icon'>
    <title>PPTPM UKDW</title>
    <meta name="description" content="">
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

    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
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
                                <li><a href="#services">Tambah_Barang</a></li>
                                <li><a href="logout.php"><?php echo $_SESSION['user'];?>, Logout</a></li>
                            </ul>
                            <ul>
                                
                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="responsive">
                            <div class="main-menu">
                                <ul>
                                <li><a href="#services">Tambah_Barang</a></li>
                                <li><a href="logout.php"><?php echo $_SESSION['user'];?>, Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->
    </div> <!-- /#front -->

    <!-- /#content -->
    <div class="container text-center">
        <div class="center-coloumn" style="background: url(foto.JPG); border: 0px; position: relative">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <h2 style="color: white">Form Tambah Barang</h2><br>
               <!--  Kode Barang : <br> -->
                <input type="text" name="kodebrg" value="<?php echo $fname; ?>" hidden><br>
                Nama Barang : <br>
                <input type="text" name="namabrg"><br>
                Stok Barang saat ini : <br>
                <input type="text" name="stkbrg"><br>
                Masukkan Gambar<br>
                (Resized and trimmed to 400x400px) : <br>
                <input type="file" name="gbrbrg" style="background-color: transparent; border: 0px; width: 250px; float: left">
                <div style="position: absolute; right: 10px">
                    <?php
                    if(isset($uploadOk))
                    {
                        if($uploadOk==1) echo '<span style="color: #00FF00">Berhasil Upload!</span>';
                        else if($uploadOk==0) echo '<span style="color: #FF3333">Gagal Upload!</span>';
                    }
                    ?>
                    <button type="submit" name="submit"  class='btn btn-success'>Simpan</button>
                    <button type="button" onclick="location.href='admpanel.php';" class='btn btn-default'>Kembali</button>
                </div>
                <div style="height: 44px"></div>
            </form>
        </div>
    </div>

   
    <script src="../js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/jquery.easing-1.3.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    <!-- templatemo 401 sprint -->
</body>
</html>