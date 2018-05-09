<form class="form-horizontal" method="get" action="">
    <fieldset>
        <!-- Form Name -->        <!--<legend>Créer un pseudo</legend>-->        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="pseudo"></label>
            <div class="col-md-6">
                <?php
                $pseudo = '';
                if (isset($_SESSION['pseudo'])) {
                    $pseudo = $_SESSION['pseudo'];
                }
                ?>
                <input autocomplete="off" id="pseudo-register" name="pseudo-register" type="text" placeholder="Saisir nom ou pseudo" value="<?php echo $pseudo; ?>" class="form-control input-md" required="required">
                <span id="register-check"" class="help-block"></span>
            </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="sexe"></label>
            <div class="col-md-6">
                <select id="sexe" name="sexe" class="form-control" required="required">
                    <option value="">Choisir une option</option>
                    <option value="1">Homme</option>
                    <option value="0">Femme</option>
                </select>
            </div>
        </div>
        <?php if (isset($_SESSION['sexe'])) : ?>
            <script type="text/javascript">
                var sexe = "<?php echo $_SESSION['sexe']; ?>";
                $("select#sexe").val(sexe);
            </script>
        <?php endif; ?>
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="enter"></label>
            <div class="col-md-6">
                <button id="register-submit" type="submit" class="btn btn-danger">ENTER</button>
            </div>
        </div>
        <input type="hidden" name="submit-form" value="register-submitted" />
    </fieldset>
</form>