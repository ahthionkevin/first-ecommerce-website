<?php
     if(!isset($_SESSION))
        session_start();
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
    <link rel="stylesheet" href="style1.css">
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

        echo "<div align=\"center\">";
        echo "<h2>$coord[1]</h2><br><br>";
        echo "<img src=\"../tp1_2/public/$coord[6]\">";
        echo "<p>Description: $coord[2]</p>";
        echo "<p>Prix: $coord[3] dhs</p>";
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
    if(qte.value<$coord[5])
        qte.value++;

    mnt.value=$coord[3]*qte.value +\" dhs\";
  });

  prev.addEventListener(\"click\",function(){
    if(qte.value>0)
        qte.value--;

    mnt.value=$coord[3]*qte.value +\" dhs\";
  });

       
  
</script>"?>
</html>
      
       