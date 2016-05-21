<h1>LOGIN</h1>

<form class="form" action="<?php echo ADMIN_URL . 'korisnici/ulogujSe'; ?>" method="post" >
    <label for="login">Login:</label> <input type="text" id="login" name="login" /> <br/>
    <label for="password">Password:</label> <input type="password" id="password" name="password" /> <br/>
    <input class="button" type="submit" value="Login">
</form>
