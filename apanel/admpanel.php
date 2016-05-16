<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php
    require "../connection.php";
    session_start();
    $timeout = 900;

    if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) {

        header ("Location: index.php");

    }

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

<!-- 
    <style type="text/css">
        button#pinjam {width:6em}
        button#pinjam:hover span {display:none}
        button#pinjam:hover:before {content:"KEMBALI"}
        #pinjam:hover {background-color:#008CBA;}
    </style>
 -->
<!-- 
 <script src="../js/jquery.min.js"></script>

     <script>
        $(document).ready(function(){

             $("#pinjam").click(function () {
                var $td= $(this).closest('tr').children('td');  
                var kodepinjam = $td.eq(0).text();
                var data = 'kodepinjam='+kodepinjam;

                $.ajax(
                {
                       type: "POST",
                       url: "updateStatus.php",
                       data: data,
                       cache: false,
                        success: function()
                       {
                            window.location.href = "http://localhost/PPTPM/apanel/admpanel.php";
                       }
                 });        
            });
           

        });
    </script>
 -->
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
                                <li><a href="#services">Daftar Barang</a></li>
                                <li><a href="#inventory">Log Peminjaman</a></li>
                                <li><a href="logout.php" onclick="location.href='logout.php';"><?php echo $_SESSION['user'];?>, Logout</a></li>
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
                                <li><a href="#services">Daftar Barang</a></li>
                                <li><a href="#inventory">Log Peminjaman</a></li>
                                 <li><a href="logout.php" onclick="location.href='logout.php';"><?php echo $_SESSION['user'];?>, Logout</a></li>
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
            <h2>Daftar Barang</h2>
            <div style="height: 40px; position: relative; background-color: #F5F5F5; padding: 0;">
                <a href='add.php'>
                    <!-- <button style="position: absolute; right: 50px; top: 50%; transform: translate(50%,-50%); background-color: #4CAF50; color: white; border: 0; height: 30px; width: 80px">Add</button> -->
                    <button type="button" style="width: 80px; position: absolute; right: 50px; top: 50%; transform: translate(50%,-50%);" onclick="location.href='add.php';" class='btn btn-success' width="100px">Add</button>
                </a>
            </div>
             <?php
            // Tentukan batas,cek halaman & posisi data
            $bts   = 6;
            $hal = @$_GET['hal'];
            if(empty($hal)){
                $pos  = 0;
                $hal = 1;
            }
            else{ 
              $pos  = ($hal-1) * $bts; 
            }

            ?>
            <table border="0" style="width:100%">
                <tr style="background-color: #4CAF50; color: white; height:40px">
                     <td style="width: 5%;"><b>No</b></td>
                    <td><b>Kode Barang</b></td>      
                    <td style="text-align:left; width: 30%;"><b>Nama Barang</b></td>
                    <td><b>Stok</b></td>
                    <td><b>Tambah/Kurang Stok</b></td>
                </tr>
                <?php
                //<!--PHP Code Here-->
                $sqlstok="SELECT kode_barang, nama_barang, stok, imgpath FROM daftar_barang LIMIT $pos,$bts";
                $resstok=$conn->query($sqlstok);
                $num = $pos+1;
                if(mysqli_num_rows($resstok)>0)
                {
                    for($i=0;$i<mysqli_num_rows($resstok);$i++)
                    {
                        $rowstok=mysqli_fetch_array($resstok);
                        
                        echo
                            '<tr>
                                <td>'.($num).'</td>
                                <td>'.$rowstok[0].'</td>      
                                <td style="text-align:left">'.$rowstok[1].'</td>
                                <td>'.$rowstok[2].'</td>
                                <td><a href="update.php?id='.$rowstok[0].'&stat=plus"><img src="../images/plus.png" alt=""></a><a href="update.php?id='.$rowstok[0].'&stat=minus"><img src="../images/minus.png" alt=""></a></td>
                            </tr>';
                            $num++;
                    } 
                }
                //<!--PHP Code Here-->
                ?>
            </table>
            <?php

                    // Hitung total data dan halaman serta link 1,2,3 
                    $query1     = mysqli_query($conn, "select * from daftar_barang");
                    $jumdata    = mysqli_num_rows($query1);
                    $jumhalaman = ceil($jumdata/$bts);

                    echo "<br> Halaman : ";

                    for($in=1;$in<=$jumhalaman;$in++)
                    if ($in != $hal){
                        echo " <a href=\"admpanel.php?hal=$in\">$in</a> | ";
                    }
                    else{ 
                        echo " <b>$in</b> | "; 
                    }
            ?>
        </div> <!-- /.container -->
    </div> <!-- /#services -->



<div id="inventory" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <CENTER><h2>Log Peminjaman</h2></CENTER>
                </div>
            </div> 
            
            <div style="height: 40px; position: relative; background-color: #F5F5F5; padding: 0;">
                <a href='log.php'>
                   <!--  <button style="position: absolute; right: 50px; top: 50%; transform: translate(50%,-50%); background-color: #4CAF50; color: white; border: 0; height: 30px; width: 80px">Add</button> -->
                    <button type="button" style="width: 80px; position: absolute; right: 50px; top: 50%; transform: translate(50%,-50%);" onclick="location.href='log.php';" class='btn btn-success' width="100px">Add</button>
                </a>

            </div>

            <?php
            // Tentukan batas,cek halaman & posisi data
            $batas   = 6;
            $halaman = @$_GET['halaman'];
            if(empty($halaman)){
                $posisi  = 0;
                $halaman = 1;
            }
            else{ 
              $posisi  = ($halaman-1) * $batas; 
            }

            ?>
            <table border="0" style="width:100%">
                <tr style="background-color: #4CAF50; color: white; height:40px">
                    <td><center><b>Nomor Peminjaman</b></center></td>
                    <td style="width: 30%;"><b>Nama Barang</b></td>      
                    <td><center><b>Tanggal Pinjam</b></center></td>
                    <td><center><b>Tanggal Kembali</b></center></td>
                    <td><center><b>Status</b></center></td>
                    <td><center><b>Ubah Status</b></center></td>
                </tr>
                <?php
                //<!--PHP Code Here-->
                $tglskrg = date('Y-m-d');
                $sqllog="SELECT log_peminjaman.kode_peminjaman, log_peminjaman.kode_barang, log_peminjaman.tgl_pinjam, log_peminjaman.tgl_kembali, 
                log_peminjaman.status, daftar_barang.nama_barang FROM log_peminjaman left join daftar_barang on 
                log_peminjaman.kode_barang = daftar_barang.kode_barang ORDER BY CASE WHEN status = 'KEMBALI' and tgl_kembali = '$tglskrg' 
                THEN null WHEN status = 'KEMBALI' and tgl_kembali < '$tglskrg' THEN '3' ELSE tgl_kembali END ASC LIMIT $posisi,$batas";
                $reslog=$conn->query($sqllog);
                $no = $posisi+1;
                if(mysqli_num_rows($reslog)>0)
                {
                    for($i=0;$i<mysqli_num_rows($reslog);$i++)
                    {
                        $rowlog=mysqli_fetch_array($reslog);
                        $duedate = substr($rowlog[3],0,4).substr($rowlog[3],5,2).substr($rowlog[3],8,2);
                        
                        if($duedate<=date('Ymd') && $rowlog[4]=='PINJAM') echo '<tr style="background-color: #FFCCCC">';
                        else echo '<tr>';
                        echo
                                '<td><center>'.$rowlog[0].'</center></td>      
                                <td>'.$rowlog[5].'</td>';
                        
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
                            echo    '<td><center>'.$date.'</center></td>';
                        }
                        
                        switch($rowlog[4])
                        {
                            case "PINJAM": 
                                echo '<td style="color: red"><center>PINJAM</center></td>';
                                echo '<td><center><a href="update.php?idlog='.$rowlog[0].'"><button style="background-color: #4CAF50; color: white; border: 0; height: 30px; width: 80px">Kembali</button></a></center></td>';
                                break;
                            case "KEMBALI": 
                                echo '<td style="color: green"><center>KEMBALI</center></td>';
                                echo '<td><center><a><button style="background-color: #7CDF80; color: white; border: 0; height: 30px; width: 80px" disabled>Kembali</button></a></center></td>';
                                break;
                        }
                        echo '</tr>';
                    }
                }
                $no++;
                //<!--PHP Code Here-->
                ?>

            </table>
            <center>
            <?php

                    // Hitung total data dan halaman serta link 1,2,3 
                    $query2     = mysqli_query($conn, "select * from log_peminjaman");
                    $jmldata    = mysqli_num_rows($query2);
                    $jmlhalaman = ceil($jmldata/$batas);

                    echo "<br> Halaman : ";

                    for($i=1;$i<=$jmlhalaman;$i++)
                    if ($i != $halaman){
                        echo " <a href=\"admpanel.php?halaman=$i\">$i</a> | ";
                    }
                    else{ 
                        echo " <b>$i</b> | "; 
                    }
            ?>
            </center>
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
                       <!--  <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                        <li><a href="#" class="fa fa-rss"></a></li> -->
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