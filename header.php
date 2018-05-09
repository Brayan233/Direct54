<?php require_once("includes/functions.php"); ?>
<!doctype html><html lang=fr><head>    
<title>Direct 54 / Meurthe-et-Moselle</title>    
<meta charset="UTF-8">    
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    
<meta name="keywords" content="Meurthe-et-Moselle; Nancy" />    
<meta name="description" content="Retrouvez toute la Meurthe-et-Moselle : Discutez en direct, Partagez vos infos, Faites des rencontres. Gratuit et sans inscription...">    
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >    
<meta name="robots" content="index, follow"/>    
<meta name="msapplication-navbutton-color" content="#1A2530">    
<meta name="apple-mobile-web-app-status-bar-style" content="#1A2530">    
<link rel= "shortcut icon" href="/images/favicon.ico" >    
<link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">    
<link rel="stylesheet" href="assets/fontawesome/css/fontawesome.min.css" type="text/css">    
<link rel="stylesheet" href="front.css" type="text/css">    
<script type="text/javascript" src="assets/jquery-2.0.3.js"></script>    
<script type="text/javascript" src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>    
<script type="text/javascript" src="assets/bootstrap-validator.js"></script></head><body><header>    
<div id="headertop">        
<div class="topdroit">            
<?php if (isset($_SESSION['pseudo'])) : ?>			                
<span>                    
<a href="/creer-salon.php"><img src="images/salon.jpg" height="20" title="Créer salon"/>&nbsp;&nbsp;&nbsp; 
<a href="/xxxxxxxxxxx"><img src="images/connect.jpg" height="20" title="Authentifiez-vous : &#013 En étant authentifié, vous pourrez :&#013 - Poster des photos,&#013 - Créer des salons,&#013 - etc..."/>&nbsp;&nbsp;&nbsp;
<a href="/?deconnexion"><img src="images/deco.jpg" height="20" title="Se déconnecter"/></a>
</span>            
<?php
endif;
?>
</div>
<div class="topgauche"></b>DIRECT54</div>    
</div></header>

