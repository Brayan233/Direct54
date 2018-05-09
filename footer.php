<div class="bas">
    <div class="basdroit">
        <a href="cgu.html">CGU</a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#pseudo-register').keyup(function() {

            $(this).val($(this).val().toUpperCase());
            var pseudo = $(this).val();

            $.post("includes/check-pseudo-register.php", {pseudo: pseudo} , function(data) {
                console.log(data);

                if (data.status == true) {
                    $('#register-check').parent('div').removeClass('has-error').addClass('has-success');
                    $('#register-submit').prop("disabled", false)

                } else {
                    $('#register-check').parent('div').removeClass('has-success').addClass('has-error');
                    $('#register-submit').prop("disabled", true)
                }

                $('#register-check').html(data.msg);

            },'json');
        });

        /*$('#pseudo-login').keyup(function() {

            $(this).val($(this).val().toUpperCase());

            var pseudo = $(this).val();

            /!*$('#pseudo-check').html('<img src="/img/loading.gif" width="30" />');*!/

            $.post("includes/check-pseudo-login.php", {pseudo: pseudo} , function(data) {
                if (data.exists == true) {
                    $('#login-check').parent('div').removeClass('has-error').addClass('has-success');
                    $('#login-submit').prop("disabled", false)

                } else {
                    $('#login-check').parent('div').removeClass('has-success').addClass('has-error');
                    $('#login-submit').prop("disabled", true)
                }

                $('#login-check').html(data.msg);

            },'json');
        });*/

        <?php
        if(isset($_SESSION["pseudo"])) :
        ?>
        function update_user_activity() {
            var action = 'update_time';
            $.ajax({
                url:"includes/update-user-activity.php",
                method:"POST",
                data:{action:action},
                success:function(data) {
                }
            });
        }

        function fetch_online_users() {
            var action = 'fetch-online-users';
            $.ajax({
                url:"includes/fetch-online-users.php",
                method:"POST",
                data:{action:action},
                success:function(data) {
                    $("#online-users").html(data);
                }
            });
        }

        <?php
        $current_page = $_SERVER['REQUEST_URI'];

        if ( strpos($current_page,'/tchat.php') == 0) :

            $chatroom_id = '4';
            if (isset($_GET['salon_id'])) {
                $chatroom_id = $_GET['salon_id'];
            }
            ?>
            function fetch_messages_first_time() {
                var action = 'fetch-messages';
                $.ajax({
                    url:"includes/fetch-messages.php",
                    method:"POST",
                    data:{
                        action: action,
                        chatroom_id: '<?php echo $chatroom_id; ?>',
                    },
                    success:function(data) {
                        var chat = $("#chat-messages");
                        chat.html(data);

                        //Scroll to the bottom
                        var height = chat.get(0).scrollHeight;
                        chat.animate({scrollTop: height});

                    }
                });
            }

            function fetch_messages() {
                var action = 'fetch-messages';
                $.ajax({
                    url:"includes/fetch-messages.php",
                    method:"POST",
                    data:{
                        action: action,
                        chatroom_id: '<?php echo $chatroom_id; ?>',
                    },
                    success:function(data) {
                        var chat = $("#chat-messages");

                        chat.html(data);

                        //Scroll to the bottom
                        var autoScrolled = check_scroll_bottom(chat);

                        console.log(autoScrolled);

                        //Scroll to the bottom
                        if (autoScrolled) {
                            var height = chat.get(0).scrollHeight;
                            chat.animate({scrollTop: height});
                        }
                    }
                });
            }

            fetch_messages_first_time();

            setInterval(function(){
                fetch_messages();
            }, 2000);

            $("form#submit-message").on("submit", function(e) {
                e.preventDefault();
                var action = 'submit-message';
                var message = $("#message").val();
                var user_id = '<?php echo $_SESSION["user_id"]; ?>';

                if ( message == '' ) {
                    alert("Merci de saisir un message");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "includes/submit-message.php",
                        data: {
                            action: action,
                            message : message,
                            user_id : user_id,
                            chatroom_id : <?php echo $chatroom_id; ?>},
                        cache: false,
                        success: function(html) {
                            $("#message").val('');
                        }
                    });
                }
            });
        <?php endif; ?>

        function check_scroll_bottom(object) {
            var howClose = 160;  // # pixels leeway to be considered "at Bottom"
            var scrollHeight = object.prop("scrollHeight");
            var scrollBottom = object.prop("scrollTop") + object.height();
            var atBottom = scrollBottom > (scrollHeight - howClose);
            return atBottom;
        }

        function scroll_to_bottom(object) {
            var height = object.get(0).scrollHeight;
            object.animate({scrollTop: height});
        }

        setInterval(function(){
            update_user_activity();
        }, 3000);


        setInterval(function(){
            fetch_online_users();
        }, 3000);

        <?php
        endif;
        ?>
    });
</script>
</body>
</html>