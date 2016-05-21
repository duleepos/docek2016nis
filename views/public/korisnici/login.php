<script type="text/javascript" src="<?php echo URL . 'libs/javascript/jquery.validate.min.js' ?>"></script>

<h1>LOGIN</h1>

<form class="form" action="<?php echo URL . 'korisnici/ulogujSe'; ?>" method="post" id="login_form" >
    <label for="login">Login:</label> <input type="text" id="login" name="login" class="required" /> <br/>
    <label for="password">Password:</label> <input type="password" id="password" name="password" class="required" /> <br/>
    <input class="button" type="submit" value="Login">
</form>



<script type="text/javascript">
    $(function() {
        $('#login_form').validate();
    });
</script>