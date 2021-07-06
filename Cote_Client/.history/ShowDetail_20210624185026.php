<?php
     if(!isset($_SESSION))
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
      
      <title>Frica</title>
      
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
     

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<?php
    require("header.php");
    if(isset($_GET['idProduct']) && !empty($_GET['idProduct']))
    {
        $id=$_GET['idProduct'];
        $sql="SELECT * FROM article WHERE id_article=\"$id\"";

        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
        
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $result=@mysqli_query($idcom,$sql);
        $coord=@mysqli_fetch_row($result);
      ?>
   <!-- catagary section start -->
   <div class="catagary_section layout_padding">
           <div class="container">
              <div class="catagary_main">
                 <div class="catagary_left">
                    <h2 class="categary_text">
                        <?=$coord[1]?>
                    </h2>
                 </div>
                 <div class="catagary_right">
                    <div class="catagary_menu">
                       <p></p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <!-- catagary section end -->

      <?php
        echo "<div align=\"center\">";
        echo "<img src=\"../tp1_2/public/$coord[0].jpg\">";
        echo "<p>Prix: $coord[2] dhs</p>";
        echo "<form action=\"addPanier.php?idProduct=$coord[0]\" method=\"post\">
        <label>Quantite: </label><input id=\"prev\" type=\"button\" value=\"-\"><input id=\"qte\" type=\"text\" name=\"qte\" value=\"0\"><input id=\"next\" type=\"button\" value=\"+\">
        <br>
        <label>Montant: </label><input id=\"mnt\" type=\"text\" name=\"mnt\" value=\"0 dhs\">";

        echo "<p><input type=\"submit\" value=\"Ajouter Au Panier\" name=\"valider\"></p>";
 /*       if(!isset($_SESSION['id']))
            echo "<p><a href=\"loginView.php\">Veuillez vous Connecter avant de faire la commande</a></p>";
        else
            echo "<p><input type=\"submit\" value=\"Valider Commande\" name=\"valider\"></p>";
*/
        echo "</form>";
        echo "</div>";
    


    }

?>  
</body>
<?php echo "<script>
  var prev=document.getElementById(\"prev\");
  var qte=document.getElementById(\"qte\");
  var next=document.getElementById(\"next\");
  var mnt=document.getElementById(\"mnt\");
  next.addEventListener(\"click\",function(){

        qte.value++;

    mnt.value=$coord[2]*qte.value +\" dhs\";
  });

  prev.addEventListener(\"click\",function(){
    if(qte.value>0)
        qte.value--;

    mnt.value=$coord[2]*qte.value +\" dhs\";
  });

       
  
</script>"?>
</html>
      
       