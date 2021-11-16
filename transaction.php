<?php
session_start();
//echo $_SESSION['fromID'].'-->'.$_SESSION['toID'].'='.$_POST['amount'];
$amount=$_POST['amount'];
//echo $amount;
if(!isset($_POST['amount'])){
    header('loaction: amount.php');
}
if(!isset($_SESSION['fromID'])||!isset($_SESSION['toID'])){
    header('location: view.php');
}

?>

<?php 

$fromID=$_SESSION['fromID'];
$toID=$_SESSION['toID'];
include('abcd.php');
$query="select balance,fname from customer where ID='$fromID' ";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
$amountA=$data['balance'];
$sendername=$data['fname'];
$query="select balance,fname from customer where ID='$toID' ";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
$amountB=$data['balance'];
$receivername=$data['fname'];
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
        <?php
            if($amount>$amountA){
                ?>
                <div class="alert alert-danger" role="alert">
                    Insuffecient Balance. Transaction Ended.<a href="view.php" class="alert-link">Go Back</a>.
                </div>
                <?php
            }else{
                $query="insert into transfer (fromID, toID, amount) values ('$fromID','$toID','$amount') ";
                $run=mysqli_query($con,$query);
                $amountA=$amountA-$amount;
                $amountB=$amountB+$amount;
                $query="update customer set balance='$amountA' where ID='$fromID' ";
                $run=mysqli_query($con,$query);
                $query="update customer set balance='$amountB' where ID='$toID' ";
                $run=mysqli_query($con,$query);
                ?>
                <div class="alert alert-success" role="alert">
                    Balance of Sender (<?php echo $sendername; ?>): <?php echo $amountA; ?>
                    <br>
                    Balance of Receiver (<?php echo $receivername; ?>): <?php echo $amountB; ?>
                    <br>
                    Transaction Successful <a href="view.php" class="alert-link">Click</a>, to process another transaction.
                </div>
                <?php
            }
        ?>
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