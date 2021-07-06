<?php
     if(!isset($_SESSION))
        session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Frica</title>
    <!-- basic -->
    <meta charset="utf-8">
     
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
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>
<body>
<?php
    
    if(isset($_SESSION['id']) && !empty($_SESSION['id']))
    {
        require("header.php");?>

        <!-- catagary section start -->
        <div class="catagary_section layout_padding">
           <div class="container">
              <div class="catagary_main">
                 <div class="catagary_left">
                    <h2 class="categary_text">
                        INFORMATION DE L UTILISTEUR
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
        

        $id=$_SESSION['id'];
        $sql="SELECT * FROM client WHERE id_client=\"$id\"";

        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
        
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $result=@mysqli_query($idcom,$sql);
        $coord=@mysqli_fetch_row($result);



        echo "<form action=\"updateUser.php?idclient=$coord[0]\" method=\"post\" class=\"read\">
        <table>
            <tr>
                <td><label for=\"nom\">NOM </label></td>
                <td><input type=\"text\" name=\"nom\" value=$coord[1] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"prenom\">PRENOM </label></td>
                <td><input type=\"text\" name=\"prenom\" value=$coord[2] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"adresse\">ADRESSE </label></td>
                <td><input type=\"text\" name=\"adresse\" value=$coord[4] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"mail\">MAIL </label></td>
                <td><input type=\"email\" name=\"mail\" value=$coord[6] class=\"sign\"></td>
            </tr>

            
            </table>

            <input type=\"submit\" value=\"Enregistrer Modification\" name=\"modifier\">
            </form>";


    }
    else{
        echo "<h1>ERREUR 404: Client Non Reconnu</h1>";
    }

?>  
</body>
</html>
      
       