<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="icons/atte1.jpg">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/jquery-2.2.3.min.js"></script>
    <script>
      $(window).on("load resize ", function() {
          var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
          $('.tbl-header').css({'padding-right':scrollWidth});
      }).resize();
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '.message', function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
          $('h1').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      });
    </script>
</head>
<body>
<?php include'header.php'; ?> 
<main>
  <?php 
    if (!empty($_GET['selector']) && !empty($_GET['validator'])) {
        echo '<h1 class="slideInDown animated">Silakan Masukkan Kata Sandi baru Anda</h1>';
    }
  ?>
<!-- Log In -->
<section class="pic_date_sel">
  <div class="slideInDown animated">
    <div class="login-page">
      
        <?php  
            if (empty($_GET['selector']) || empty($_GET['validator'])) {
              echo '<div class="alert alert-danger">
                        Tidak dapat memvalidasi permintaan Anda, silakan coba lagi!!
                      </div>';
            }
            elseif (!empty($_GET['selector']) && !empty($_GET['validator'])) {
              $selector = $_GET['selector'];
              $validator = $_GET['validator'];
            
              if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                echo '<div class="alert alert-success">
                        Link tersebut valid untuk mereset password admin
                      </div>';
                ?>
                <div class="form">
                  <div class="alert1"></div>
                  <form class="login-form" action="ac_reset_pass.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="selector" value="<?php echo $selector?>">
                    <input type="hidden" name="validator" value="<?php echo $validator?>">
                    <input type="password" name="pwd" placeholder="Masukan Password Baru Anda..." required/>
                    <input type="password" name="pwd_re" placeholder="Repeat Password Baru..." required/>
                    <button type="submit" name="reset">Reset Password</button>
                  </form>
                </div>
                <?php
              }
            }
        ?>
    </div>
  </div>
</section>
</main>
</body>
</html>