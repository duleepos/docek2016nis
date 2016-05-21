<h1>Registracija</h1>

<?php if ((!empty($_GET['error'])) && ($_GET['error'] == 'prazna_polja')) :?>

<h3>Morate popuniti sva polja!</h3>

<?php endif; ?>

<?php if ((!empty($_GET['error'])) && ($_GET['error'] == 'neispravan_email')) :?>

<h3>Nevalidan email!</h3>

<?php endif; ?>

<?php if ((!empty($_GET['error'])) && ($_GET['error'] == 'neuspesno_dodavanje')) :?>

<h3>Neuspešno dodavanje korisnika</h3>

<?php endif; ?>

<form class="form" action="<?php echo ADMIN_URL . 'korisnici/dodajKorisnika'; ?>" method="post" >
    <label for="login">Login:</label> <input type="text" id="login" name="login" /> <br/>
    <label for="password">Password:</label> <input type="password" id="password" name="password" /> <br/>
    <label for="email">Email:</label> <input type="text" id="email" name="email" /> <br/>
    <label for="first_name">Ime:</label> <input type="text" id="first_name" name="first_name" /> <br/>
    <label for="last_name">Prezime:</label> <input type="text" id="last_name" name="last_name" /> <br/>
    <label for="address">Adresa:</label> <input type="text" id="address" name="address" /> <br/>
    <label for="phone">Telefon:</label> <input type="text" id="phone" name="phone" /> <br/>
     <input type="radio" id="admin" name="group" value='1'/> <label for="admin">Admin</label><br/>
     <input type="radio" id="user" name="group" value='2'/> <label for="user">Korisnik</label><br/>
    <input class="button" type="submit" value="Registruj se">
</form>

