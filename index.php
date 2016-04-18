<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
    require 'connection.php';
?>
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <link href='images/small_logo_.png' rel='shortcut icon'>
    <title>PPTPM</title>
    <meta name="description" content="">
<!--

Sprint Template

http://www.templatemo.com/tm-401-sprint

-->
    <meta name="viewport" content="width=device-width">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="stylesheet" href="css/templatemo_style.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="front">
        <div class="site-header">
            <div class="container">
                <div class="row">
                    
                    <!--
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div id="templatemo_logos">
                            <h1><a href="#">Pptm</a></h1>
                        </div> 
                    </div>-->

                    <div class="col-md-8 col-sm-6 col-xs-6">
                        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                        <div class="main-menu">
                            <ul>
                                <li><a href="#front">Home</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#inventory">Inventory</a></li>
                                <li><a href="#about">About</a></li>  
                                <li><a href="#contact">Contact</a></li>
                            
                               
                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="responsive">
                            <div class="main-menu">
                                <ul>
                                    <li><a href="#front">Home</a></li>
                                    <li><a href="#services">Services</a></li>
                                    <li><a href="#inventory">Inventory</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                     
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
                <img src="images/slider/slide1.jpg" alt="slider image 1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="slider-caption">
                                <h2>HTML5 </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <img src="images/slider/slide2.jpg" alt="slider image 2">
                <div class="container caption-wrapper">
                    <div class="slider-caption">
                        <h2>Using Bootstrap Framework</h2>
                    </div>
                </div>
            </li>
            
        </ul> <!-- /.bxslider -->
        <div class="bx-thumbnail-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="bx-pager">
                            <a data-slide-index="0" href=""><img src="images/slider/thumb1.jpg" alt="image 1" /></a>
                            <a data-slide-index="1" href=""><img src="images/slider/thumb2.jpg" alt="image 2" /></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.site-slider -->



    <div id="services" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon first"></span>
                        <h3>Elelctronic Graphic and Design</h3>
                        <p> Memberi layanan visual design dan media production seperti, perancangan media instrusional maupun non-instruksional , pembuatan presentasi data elektronik dan transparansi OHP , desain grafis dan digital imaging</p>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <a href="#inventory">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon second"></span>
                        <h3>Peminjaman Alat</h3>
                        <p>Memberi dukungan dalam hal-hal teknis, seperti; peminjaman projector, perangkat A/V dan computer multimedia</p>
                    </div> <!-- /.service-item --></a>
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon third"></span>
                        <h3>Instructional Computing</h3>
                        <p>membantu pengajar dalam mengidentifikasikan dan menggunakan teknologi dan sumber daya instruksional yang lain.</p>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="service-icon fourth"></span>
                        <h3>Media</h3>
                        <p>Memberikan layanan media dokumentasi seperti video recorder, kamera, dsb</p>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#services -->

    
       <div id="inventory" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">Semua Barang</h1>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
<!--PHP HERE!-->
                <?php
                $sql='SELECT kode_barang, nama_barang, stok, imgpath FROM (-daftar_barang)';
                $res=$conn->query($sql);
                
                
                for ($i=0;$i<5;$i++)
                {
                echo
                '<div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="item-thumb">
                            <span class="note"><img src="images/small_logo.png" alt=""></span>
                            <div class="overlay">
                                <div class="overlay-inner">
                                    <a href="#nogo" class="view-detail">PPTPM</a>
                                </div>
                            </div> <!-- /.overlay -->
                            <img src="images/products/product1.jpg" alt="">
                        </div> <!-- /.item-thumb -->
                        <h3>Projector Hitachi DX250 3000 Lumens</h3>
                        <span>Jumlah Total <em class="price">3</em> Tersedia <em class="price">1</em></span>
                        <span>Tersedia Tanggal : <em class="price">SAAT INI TERSEDIA</em></em></span>
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->';
                }
                ?>
<!--PHP STOP HERE!-->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#products -->

     <div id="about" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">About</h1>
                    <h3>test1</h3>
                    <p>test2</p>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#products -->


   

    <div id="contact" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">Contact Us</h1>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center bigger-text">
                    
                </div>

               
                <div class="col-md-6 col-sm-6">
                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.035660495849!2d110.37618701437648!3d-7.7860439794186735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5828f6fb7ef7%3A0xb710cc588f40770e!2sUniversitas+Kristen+Duta+Wacana!5e0!3m2!1sen!2sid!4v1458366310712" width="550" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6">
                    
                    <div class="row contact-form">
                    
                        <fieldset class="col-md-6 col-sm-6">
                            <input id="name" type="text" name="name" placeholder="Name">
                        </fieldset>
                        <fieldset class="col-md-6 col-sm-6">
                            <input type="email" name="email" id="email" placeholder="Email">
                        </fieldset>
                        <fieldset class="col-md-12">
                            <input type="text" name="subject" id="subject" placeholder="Subject">
                        </fieldset>
                        <fieldset class="col-md-12">
                            <textarea name="comments" id="comments" placeholder="Message"></textarea>
                        </fieldset>
                        <fieldset class="col-md-12">
                            <input type="submit" name="send" value="Send Message" id="submit" class="button">
                        </fieldset>
                     
                    </div> <!-- /.contact-form -->
                    
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
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

    
    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="js/jquery.easing-1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <!-- templatemo 401 sprint -->
</body>
</html>
