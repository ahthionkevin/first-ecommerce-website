<div class="header_section haeder_main">
         <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
               
               <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                     <?php if(!isset($_SESSION['id'])):?>
                        <li><a href="login.php"><img src="images/user-icon.png"></a></li>
                     <?php else:?>
                         <li><a href="logout.php" class="link"><img src="images/logout-24.png"></a></li>
                        `<li><a href="showUser.php" class="link">Modifier Profil</a></li>
                     <?php endif;?>
                        <li><a href="#"><img src="images/trolly-icon.png"></a></li>
                     </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>