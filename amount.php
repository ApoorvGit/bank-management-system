<?php 
session_start();
if(!isset($_POST['toID'])){
    header('location: receiver.php');
}
if(!isset($_SESSION['fromID'])){
    header('loaction: view.php');
}
$fromID=$_SESSION['fromID'];
$_SESSION['toID']=$_POST['toID'];
include('abcd.php');
$query="select balance from customer where ID='$fromID' ";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
$amount=$data['balance'];
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
        <form class="form-inline" method="post" action="transaction.php">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Available Amount: <?php echo $amount; ?> </label>
            </div>
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Enter Amount</label>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="number" class="form-control" id="inputPassword2" name="amount" placeholder="Amount in ₹">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Send</button>
        </form>
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
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>

</html>