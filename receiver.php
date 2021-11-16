<?php 
session_start();
if(!isset($_POST['fromID'])){
    header('location: view.php');
}
$_SESSION["fromID"]=$_POST['fromID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bank Management System- Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <a href="index.html" class="hero-logo" data-aos="zoom-in"><img src="assets/img/2.png" alt=""></a>
      <h1 data-aos="zoom-in">Bank Management System</h1>
    </div>
  </section><!-- End Hero -->
    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="tab-content">
            <h2> Select Receiver</h2>
            <?php
                include('abcd.php');
                $fromID=$_POST['fromID'];
                $query="select * from customer WHERE ID<>'$fromID' order by ID";
                $run=mysqli_query($con,$query);
                $i=1;
                while($data=mysqli_fetch_assoc($run)){
                    $img=$data['propic'];?>
                    <div class="tab-pane <?php if($i==1) echo 'active show' ?>" id="<?php echo 'tab-'.$i;?>">
                    <figure>
                        <img src="<?php echo $img; ?>" style="height: 300px; width: auto;" alt="" class="img-fluid">
                    </figure>
                    <form method="post" action="amount.php">
                    <button type="submit" style="background-color:#138963; color: white; border-radius: 8px;" value="<?php  echo $data['ID'];  ?>" name="toID">Select</button>
                    </form>
                    </div>
                <?php
                    $i++;
                }
            ?>
            </div>
          </div>
          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left">
            <ul class="nav nav-tabs flex-column">
            <?php
                $query="select * from customer WHERE ID<>'$fromID' order by ID";
                $run=mysqli_query($con,$query);
                $i=1;
                while($data=mysqli_fetch_assoc($run)){
                    ?>
                    <li class="nav-item <?php if($i!=1) echo 'mt-2'; ?>">
                        <a class="nav-link <?php if($i==1) echo 'active show'; ?>" data-bs-toggle="tab" href="<?php echo '#tab-'.$i; ?>">
                            <h3><?php echo $data['fname']." ".$data['lname']; ?>  </h3>
                            <h4><?php echo $data['email']; ?></h4>
                            <p><?php echo $data['balance']."Rs"; ?></p>
                        </a>
                    </li>
                    <?php $i++;
                }
            ?>
              
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Featured Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><a href="https://github.com/apoorvgit"><span>ApoorvGit</span></a></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>

</html>