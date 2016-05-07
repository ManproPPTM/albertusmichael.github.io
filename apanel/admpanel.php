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
     
    $_SESSION['timeout'] = time();
    if (isset($_GET["success"]))
    {
        echo "<script>alert('Berhasil upload!');</script>";
        echo "<script>window.location='admpanel.php';</script>";
    }
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
                    <div class="col-md-12">
                        <div class="responsive">
                            <div class="main-menu">
                                <ul>
                                <li><a href="#services">Daftar_Barang</a></li>
                                <li><a href="#inventory">Log_Peminjaman</a></li>
                                 <li><a href="logout.php"><?php echo $_SESSION['user'];?>, Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->
    </div> <!-- /#front -->

    <div class="site-slider">
        <ul class="bxslider">
        <li>
    </div> <!-- /.site-slider -->

    <div id="services" class="content-section">
        <div class="container text-center">
            <H1>Daftar Barang</H1>
            <div style="height: 40px; position: relative; background-color: #F5F5F5; padding: 0;">
                <a href='add.php'>
                    <button style="position: absolute; right: 50px; top: 50%; transform: translate(50%,-50%); background-color: #4CAF50; color: white; border: 0; height: 30px; width: 80px">Add</button>
                </a>
            </div>
            <table border="0" style="width:100%">
                <tr style="background-color: #4CAF50; color: white; height:40px">
                    <td>No</td>
                    <td>Kode Barang</td>      
                    <td>Nama Barang</td>
                    <td>Stok</td>
                    <td>Tambah/Kurang Stok</td>
                </tr>
                <?php
                //<!--PHP Code Here-->
                $sqlstok="SELECT kode_barang, nama_barang, stok, imgpath FROM daftar_barang";
                $resstok=$conn->query($sqlstok);
                
                if(mysqli_num_rows($resstok)>0)
                {
                    for($i=0;$i<mysqli_num_rows($resstok);$i++)
                    {
                        $rowstok=mysqli_fetch_array($resstok);
                        
                        echo
                            '<tr>
                                <td>'.($i+1).'</td>
                                <td>'.$rowstok[0].'</td>      
                                <td>'.$rowstok[1].'</td>
                                <td>'.$rowstok[2].'</td>
                                <td><a href="update.php?id='.$rowstok[0].'&stat=plus"><img src="../images/plus.png" alt=""></a><a href="update.php?id='.$rowstok[0].'&stat=minus"><img src="../images/minus.png" alt=""></a></td>
                            </tr>';
                    }
                }
                //<!--PHP Code Here-->
                ?>
            </table>
        </div> <!-- /.container -->
    </div> <!-- /#services -->



<div id="inventory" class="content-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Log Peminjam</h1>
                </div>
            </div> 
            
            <div style="height: 40px; position: relative; background-color: #F5F5F5; padding: 0;">
                <a href='#'>
                    <button style="position: absolute; right: 50px; top: 50%; transform: translate(50%,-50%); background-color: #4CAF50; color: white; border: 0; height: 30px; width: 80px">Add</button>
                </a>
            </div>
            <table border="0" style="width:100%">
                <tr style="background-color: #4CAF50; color: white; height:40px">
                    <td>Nomor Peminjaman</td>
                    <td>Kode Barang</td>      
                    <td>Tanggal Pinjam</td>
                    <td>Tanggal Kembali</td>
                    <td>Status</td>
                    <td>Ubah Status</td>
                </tr>
                <?php
                //<!--PHP Code Here-->
                $sqllog="SELECT kode_peminjaman, kode_barang, tgl_pinjam, tgl_kembali, status FROM log_peminjaman";
                $reslog=$conn->query($sqllog);
                
                if(mysqli_num_rows($reslog)>0)
                {
                    for($i=0;$i<mysqli_num_rows($reslog);$i++)
                    {
                        $rowlog=mysqli_fetch_array($reslog);
                        
                        echo
                            '<tr>
                                <td>'.$rowlog[0].'</td>      
                                <td>'.$rowlog[1].'</td>';
                        
                        for($j=2;$j<=3;$j++)
                        {
                            $date=substr($rowlog[$j],8,2)." ";
                            switch(substr($rowlog[$j],5,2))
                            {
                                    case "01": $date= $date."JAN "; break;
                                    case "02": $date= $date."FEB "; break;
                                    case "03": $date= $date."MAR "; break;
                                    case "04": $date= $date."APR "; break;
                                    case "05": $date= $date."MAY "; break;
                                    case "06": $date= $date."JUN "; break;
                                    case "07": $date= $date."JUL "; break;
                                    case "08": $date= $date."AUG "; break;
                                    case "09": $date= $date."SEP "; break;
                                    case "10": $date= $date."OCT "; break;
                                    case "11": $date= $date."NOV "; break;
                                    case "12": $date= $date."DES "; break;
                            }
                            $date=$date.substr($rowlog[$j],0,4);
                            echo    '<td>'.$date.'</td>';
                        }
                        
                        switch($rowlog[4])
                        {
                            case "PINJAM": 
                                echo '<td style="color: red">PINJAM</td>';
                                echo '<td><a href="#"><button style="background-color: #4CAF50; color: white; border: 0; height: 30px; width: 80px">Kembali</button></a></td>';
                                break;
                            case "KEMBALI": 
                                echo '<td style="color: green">KEMBALI</td>';
                                echo '<td><a href="#"><button style="background-color: #7CDF80; color: white; border: 0; height: 30px; width: 80px" disabled>Kembali</button></a></td>';
                                break;
                        }
                        echo '</tr>';
                    }
                }
                //<!--PHP Code Here-->
                ?>
            </table>


        </div> <!-- /.container -->
    </div> <!-- /#products -->

     

    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6">
                    <span>
                        Copyright &copy; 2016 <a href="#">PPTPM Universitas Kristen Duta Wacana</a>
                        
                        
                       
                    </span>

            </div> <!-- /.col-md-6 -->
                <div class="col-md-4 col-sm-6">
                    <ul class="social">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                        <li><a href="#" class="fa fa-rss"></a></li>
                    </ul>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    
    <script src="../js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/jquery.easing-1.3.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    <!-- templatemo 401 sprint -->
</body>
</html>