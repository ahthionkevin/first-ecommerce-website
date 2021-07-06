<div class="header_section haeder_main">
         <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
               
               <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                     <?php if(!isset($_SESSION['id'])):?>
                        <li><a href="loginView.php"><img src="images/user-icon.png"></a></li>
                        <li><a href="signInView.php" class="link"><img src="images/add.png"></a></li>
                     <?php else:?>
                         <li><a href="logout.php"><img src="images/logout.png"></a></li>
                        `<li><a href="showUser.php" class="link"><img src="images/user1.png"></a></li>
                     <?php endif;?>
                        <li><a href="panier.php"><img src="images/trolly-icon.png"></a></li>
                     </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>