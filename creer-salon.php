<?php include("header.php"); ?>
    <div id="contenair">
        <div class="gauche">
            <?php
            if (!isset($_SESSION['pseudo'])) {
                header('location: /');
            }

            if (isset($_SESSION['pseudo'])) :
            ?>
                <span>
                    Bonjour <strong><?php echo $_SESSION["pseudo"]; ?> </strong> &nbsp; &nbsp;
                </span>
            <?php endif; ?>	<br><br>
            <?php require_once("includes/liste-des-salons.php"); ?>
            <img src="11.jpg" width=100% >
        </div>
        <div class="droit">
            <b>Discussions en cours :</b><br><br>
            <div class="oran"></div>
            <br> <b>Liste des connectés : </b><br><br>
            <div id="online-users">            </div>
        </div>
        <div class="centre">
            <div id="create-chatroom">
                <?php require_once("includes/validate-create-chatroom.php"); ?>
                <form autocomplete="off" id="create-chatroom-form" class="form-horizontal" role="form" data-toggle="validator" method="get" action="">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Créer un salon</legend>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="chatroom-title"></label>
                            <div class="col-md-4">
                                <input id="chatroom-title" name="chatroom-title" type="text" placeholder="Titre de salon" class="form-control input-md" minlength="3" maxlength="20" data-error="Le titre du salon doit être de 3 à 20 charactères" required >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4">                                <button type="submit" class="btn btn-warning">Valider</button>                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="submit-form" value="create-chatroom" />
                </form>
            </div>
        </div>
        <div class="centrebas">
            <div class="row">
                <div class="col-sm-11" style="padding: 20px; padding-left: 40px;">
                    <form id="submit-message" method="post" action="">                        <input type="text" name="message" id="message" style="width: 100%;"/>                        <input type="submit" value="Envoyer" style="display: none" />                    </form>
                </div>
                <div class="col-sm-1" style="padding-top: 20px;">                    <a href="index.html"><img src="post.jpg" title="Poster photo" width=30 height=30></a>                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">        $('#create-chatroom-form').validator();    </script><?php include("footer.php"); ?>