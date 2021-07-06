<?php
     if(!isset($_SESSION))
        session_start();

        if(!isset($_SESSION['content']))
            $_SESSION['content']=0;

        if(isset($_SESSION['panier']))
        {
            $_SESSION['content']=array_Sum($_SESSION['panier']);
        }
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Frica</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <!-- header section start -->
      <?php require 'header.php';?>
      <!-- header section end -->
      
      <!-- catagary section start -->
      <div class="catagary_section layout_padding">
         <div class="container">
            <div class="catagary_main">
               <div class="catagary_left">
                  <h2 class="categary_text">Recherche</h2>
               </div>
               <div class="catagary_right">
                  <div class="catagary_menu">
                     <form action="index.php" method="post">

                     <ul>
                        <li>
                           <label for="nom">NOM ARTI</label>
                           <input type="text" name="nom" id="nom">
                        </li>
                        <li>
                           <label for="min">PRIX MIN </label>
                           <input type="text" name="min" id="min">
                        </li>
                        

                        <li>
                           <label for="categorie">CATEGORIE</label>
                           <select name="categorie" id="catgorie">
                                 <option disabled selected value> -- select an option -- </option>
                                 <option value="ordinateur">ordinateur</option>
                                 <option value="telephone">telephone</option>
                                 <option value="divers">divers</option>
                           </select>
                        </li>

                        <li>
                           <label for="max">PRIX MAX</label>
                           <input type="text" name="max" id="max">
                        </li>

                        <li>
                        <input type="submit" value="Search" name="search">
                        </li>
                     </ul>          
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- catagary section end -->

      <!-----CODE PHP----->
      <?php if(isset($_POST['search'])):?>
         <?php  
         {
               define("MYHOST","localhost");
               define("MYUSER","root");
               define("MYPASS","");
               $db="magasin";
               
               $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
               
               if(isset($_POST['nom']) && !empty($_POST['nom']))
               {
                  
                  if(isset($_POST['min']) && !empty($_POST['min']))
                  {
                     
                     if(isset($_POST['max']) && !empty($_POST['max']))
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $nom=$_POST['nom'];
                              $min=$_POST['min'];
                              $max=$_POST['max'];
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                           }
                           else
                           {
                              $nom=$_POST['nom'];
                              $min=$_POST['min'];
                              $max=$_POST['max'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\" AND prix<=\"$max\"";
                           }
                     }
                     else
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $nom=$_POST['nom'];
                              $min=$_POST['min'];
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\" AND categorie=\"$categorie\"";
                           }
                           else
                           {
                              $nom=$_POST['nom'];
                              $min=$_POST['min'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\"";
                           }
                     }
                  }
                  else
                  {
                     if(isset($_POST['max']) && !empty($_POST['max']))
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $nom=$_POST['nom'];
                              $max=$_POST['max'];
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                           }
                           else
                           {
                              $nom=$_POST['nom'];
                              $max=$_POST['max'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix<=\"$max\"";
                           }
                     }
                     else
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $nom=$_POST['nom'];
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\" AND categorie=\"$categorie\"";
                           }
                           else
                           {
                              $nom=$_POST['nom'];
                              $sql="SELECT * FROM article WHERE nom=\"$nom\"";
                           }
                     }
                  }
               }
               else
               {
                  if(isset($_POST['min']) && !empty($_POST['min']))
                  {
                     
                     if(isset($_POST['max']) && !empty($_POST['max']))
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $min=$_POST['min'];
                              $max=$_POST['max'];
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE prix>=\"$min\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                           }
                           else
                           {
                              $min=$_POST['min'];
                              $max=$_POST['max'];
                              $sql="SELECT * FROM article WHERE prix>=\"$min\" AND prix<=\"$max\"";
                           }
                     }
                     else
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $min=$_POST['min'];
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE prix>=\"$min\" AND categorie=\"$categorie\"";
                           }
                           else
                           {
                              $min=$_POST['min'];
                              $sql="SELECT * FROM article WHERE prix>=\"$min\"";
                           }
                     }
                  }
                  else
                  {
                     if(isset($_POST['max']) && !empty($_POST['max']))
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $max=$_POST['max'];
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE prix<=\"$max\" AND categorie=\"$categorie\"";
                           }
                           else
                           {
                              $max=$_POST['max'];
                              $sql="SELECT * FROM article WHERE prix<=\"$max\"";
                           }
                     }
                     else
                     {
                           if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                           {
                              $categorie=$_POST['categorie'];
                              $sql="SELECT * FROM article WHERE categorie=\"$categorie\"";
                           }
                           else
                           {
                              $sql="SELECT * FROM article";
                           }
                     }
                  }
               }

               
            
               

               $result2=@mysqli_query($idcom,$sql);

               $coord2=@mysqli_fetch_row($result2);

               echo "<h2>LISTE DES PRODUITS</h2>";

            

               if(empty($coord2))
                  echo "<p class=\"red\">PRODUIT N EXISTE PAS</p>";
               else
               {

                  echo "<div class=\"product\">
                  <h3><a href=\"showDetail.php?idProduct=$coord2[0]\">$coord2[1]</a></h3>
                  <img src=\"../tp1_2/public/$coord2[6]\"height=\"200px\">
                  <p>description: $coord2[2]</p>
                  <p>Prix: $coord2[3] dhs</p>
                  <p>Categorie: $coord2[4]</p>
                  </div>";

                  while($coord2=mysqli_fetch_row($result2))
                  {
                     
                     echo "<div class=\"product\">
                     <h3><a href=\"showDetail.php?idProduct=$coord2[0]\">$coord2[1]</a></h3>
                     <img src=\"../tp1_2/public/$coord2[6]\" height=\"200px\">
                     <p>description: $coord2[2]</p>
                     <p>Prix: $coord2[3] dhs</p>
                     <p>Categorie: $coord2[4]</p>
                     </div>";

                  }


               }

         }
         ?>
      <?php else:?>
         <?php

            define("MYHOST","localhost");
            define("MYUSER","root");
            define("MYPASS","");
            $db="magasin";
            
            $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
            $sql="SELECT DISTINCT categorie FROM article";

            
            $result=@mysqli_query($idcom,$sql);

         ?>
         <?php  while($coord=mysqli_fetch_row($result))?>

            <div class="computers_section layout_padding">
         <div class="container">
            <h1 class="computers_taital">Computers & Laptop</h1>
         </div>
         </div>
         <div class="computers_section_2">
            <div class="container-fluid">
               <div class="computer_main">
                  <div class="row">
         
         <?php endfor;?>    
         
      <?php endif;?>




      <!-- computers section start -->
      <div class="computers_section layout_padding">
         <div class="container">
            <h1 class="computers_taital">Computers & Laptop</h1>
         </div>
      </div>
      <div class="computers_section_2">
         <div class="container-fluid">
            <div class="computer_main">
               <div class="row">
                  <div class="col-md-4">
                     <div class="computer_img"><img src="images/computer-img.png"></div>
                     <h4 class="computer_text">COMPUTER</h4>
                     <div class="computer_text_main">
                        <h4 class="dell_text">Samsung</h4>
                        <h6 class="price_text"><a href="#">$500</a></h6>
                        <h6 class="price_text_1"><a href="#">$1000</a></h6>
                     </div>
                     <div class="cart_bt_1"><a href="#">Add To Cart</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- computers section end -->

      <!-- footer section start -->
      <div class="footer_section layout_padding margin_top_90">
         <div class="container">
            <div class="footer_logo_main">
               <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
               <div class="social_icon">
                  <ul>
                     <li><a href="#"><img src="images/fb-icon.png"></a></li>
                     <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                     <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                     <li><a href="#"><img src="images/instagram-icon.png"></a></li>
                     <li><a href="#"><img src="images/youtub-icon.png"></a></li>
                  </ul>
               </div>
            </div>
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="adderss_text">About</h4>
                     <p class="ipsum_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="adderss_text">Menu</h4>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><a href="computers.html">Computers</a></li>
                           <li><a href="Mans_clothes.html">Mans Clothes</a></li>
                           <li><a href="womans_clothes.html">Womans Clothes</a></li>
                           <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="adderss_text">Useful Link</h4>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="#">Adipiscing</a></li>
                           <li><a href="#">Elit, sed do</a></li>
                           <li><a href="#">Eiusmod</a></li>
                           <li><a href="#">Tempor</a></li>
                           <li><a href="#">incididunt</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="adderss_text">Contact</h4>
                     <div class="call_text"><img src="images/map-icon.png"><span class="paddlin_left_0"><a href="#">London 145 United Kingdom</a></span></div>
                     <div class="call_text"><img src="images/call-icon.png"><span class="paddlin_left_0"><a href="#">+7586656566</a></span></div>
                     <div class="call_text"><img src="images/mail-icon.png"><span class="paddlin_left_0"><a href="#">volim@gmail.com</a></span></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
   </body>
</html>