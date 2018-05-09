<form class="form-horizontal" method="post" action="">
    <fieldset>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="pseudo">Pseudo</label>
            <div class="col-md-4">
                <input id="pseudo-login" name="pseudo-login" type="text" placeholder="" class="form-control input-md" required="">
                <span id="login-check" class="help-block"></span>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for=""></label>
            <div class="col-md-4">
                <button id="login-submit" type="submit" class="btn btn-danger">ENTER</button>
            </div>
        </div>

        <input type="hidden" name="submit-form" value="login-submitted" />

    </fieldset>
</form>