<div class="navigation cf">
                <ul>
                    
                    <li><a <?php if (!empty($this->controllerName) && $this->controllerName == 'objekti') { echo 'class="active"' ; } ?> href="<?php echo URL . 'objekti' ?>">Doček-2016-Niš</a></li>
      
                    <li><a  href="<?php echo URL . 'objekti/kategorija/1-restorani-i-kafane' ?>">Restorani i kafane</a></li>
                    <li><a  href="<?php echo URL . 'objekti/kategorija/2-klubovi-i-kafici' ?>">Klubovi i kafići</a></li>
                    <li><a  href="<?php echo URL . 'objekti/kategorija/3-repriza-doceka' ?>">Repriza dočeka</a></li>              
                    <li><a  href="<?php echo URL . 'objekti/kategorija/4-srpska-nova-godina' ?>">Srpska nova godina</a></li>
                    
                    <li><a <?php if (!empty($this->controllerName) && $this->controllerName == 'kontakt') { echo 'class="active"' ; } ?> href="<?php echo URL . 'kontakt' ?>">Kontakt</a></li>
                    
                </ul>
            </div>
<nav class="slider">
  <div id="toggle-menu"> <a href="#"><img src="images/menu.png"></a></div>
  <ul class="menu" id="menu">
       
     <li><a href="<?php echo URL . 'objekti' ?>">Doček-2016-Niš</a></li>
      
                    <li><a  href="<?php echo URL . 'objekti/kategorija/1-restorani-i-kafane' ?>">Restorani i kafane</a></li>
                    <li><a  href="<?php echo URL . 'objekti/kategorija/2-klubovi-i-kafici' ?>">Klubovi i kafići</a></li>
                    <li><a  href="<?php echo URL . 'objekti/kategorija/3-repriza-doceka' ?>">Repriza dočeka</a></li>              
                    <li><a  href="<?php echo URL . 'objekti/kategorija/4-srpska-nova-godina' ?>">Srpska nova godina</a></li>
                    <li><a  href="<?php echo URL . 'kontakt' ?>">Kontakt</a></li>
   </ul>
 </nav>
            <div class="content">
 <div class="top"><?php
        echo '<h1>' . $this->kontaktPage['title'] . '</h1>'; ?>
            <p>
            Ukoliko želite da reklamirate vašu novogodišnju proslavu/žurku na našem sajtu, 
            možete nas kontaktirati na telefon, email ili putem forme sa ove stranice.
            
            </p>
        </div>              
        <a href="http://www.docek-2016-nis.rs/ponuda.php"> Ponuda za organizatore</a>

                <div class="kontakt">
                    <h2>- INFO i Marketing -
                        <p><?php
    echo $this->kontaktPage['description'];
    ?></p></h2>


    <h3 style="margin-top: 25px;">Kontaktirejte nas putem forme:</h3>

    <?php
    if (!empty($_GET['message']) && $_GET['message'] == 'sent') {
        echo '<p style="color:red; font-weight:bold;">Usrešno ste poslali poruku!</p>';
    }
    if (!empty($_GET['error']) && $_GET['error'] == 1) {
        echo '<p style="color:red; font-weight:bold;">Niste popunili sva polja!</p>';
    }
    if (!empty($_GET['error']) && $_GET['error'] == 2) {
        echo '<p style="color:red; font-weight:bold;">Niste uneli validan Email!</p>';
    }
    ?>

    <form class="form contact_form" action="<?php echo URL . 'kontakt/dodajKontakt'; ?>" method="post" >
        <label for="name"></label> <input type="text" id="name" name="name" placeholder="Ime i prezime..."/> 
        <br>
        <label for="email"></label> <input type="text" id="email" name="email" placeholder="Vaš Email..." /> 
        <br>
        <label for="text"></label> <textarea id="text" name="text" placeholder="Tekst poruke..."></textarea> 
        <br>
        <input class="button" type="submit" value="Pošalji">
    </form>
</div>

<div class="log"> 
                   <?php if (!empty($_SESSION['user_id'])) { ?>
                        <li><a <?php if (!empty($this->controllerName) && $this->controllerName == 'korisnici') { echo 'class="active"' ; } ?> href="<?php echo URL . 'korisnici/logout' ?>">Logout</a></li>
                    <?php } else { ?>
                        <li><a <?php if (!empty($this->controllerName) && $this->controllerName == 'korisnici') { echo 'class="active"' ; } ?> href="<?php echo URL . 'korisnici/login' ?>">Login</a></li>
                    <?php }?>
             </div> 
<div style="clear: both;"></div>