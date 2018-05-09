<?php include("header.php"); ?>

    <?php
    include("includes/validate-register.php");
    ?>

    <div id="contenair">
        <!--Bloc gauche-->
        <div class="gaucheind">
            <ul class="nav nav-tabs">
                <li><a href="/">Se connecter</a></li>
                <li class="active"><a href="#">Créer un pseudo</a></li>
            </ul>

            <div class="tab-content" style="margin-top: 25px;">
                <?php include("includes/register-form.php"); ?>
            </div>

        </div>
        <!--End Bloc gauche-->

        <!--Bloc droit-->
        <div class="droitind">
        </div>
        <!--End Block droit-->
    </div>

<?php include("footer.php"); ?>

