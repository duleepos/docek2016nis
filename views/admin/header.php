<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
        <title>administracija</title>
        <link rel="stylesheet" href="<?php echo URL . 'views/admin/style_admin.css'; ?>"/>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="<?php echo URL . 'libs/javascript/jquery-1.10.2.min.js' ?>"></script>
        
    <script src="https://maps.googleapis.com/maps/api/js"></script>

    </head>
    <body>
        <div id="page">
            <div class="header cf">
                
                <div class="logo">Administracija</div>

                <?php if (!empty($_SESSION['user_id'])) {  ?>
                <div class="login header_login">
                    <p style="text-align:right;">
                        <?php echo '<b>' . $_SESSION['login'] . '</b>' . ' (' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . ')' ; ?>
                    </p>
                </div>
                <?php } ?>
            </div>
            
            <div class="navigation cf">
                <ul>
                    <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'home') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'home' ?>">Home</a></li>
                    <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'kategorije') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'objekti/kategorije' ?>">Kategorije</a></li>
                    <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'objekti') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'objekti' ?>">Proizvodi</a></li>
                    <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'kontakt') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'kontakt' ?>">Kontakti</a></li>
                    <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'kontaktStranica') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'kontakt/kontaktStranica' ?>">Kontakt Stranica</a></li>
                    <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'korisnici') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'korisnici' ?>">Korisnici</a></li>
                    <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'kupovina') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'kupovina' ?>">Kupovina</a></li>
                    <?php if (!empty($_SESSION['user_id'])): ?>
                        <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'logout') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'korisnici/logout' ?>">Logout</a></li>
                    <?php else: ?>
                        <li><a <?php if (!empty($this->activeNavigation) && $this->activeNavigation == 'login') { echo 'class="active"' ; } ?> href="<?php echo ADMIN_URL . 'korisnici/login' ?>">Login</a></li>
                    <?php endif ?>    
                        
                </ul>
            </div>
            <div class="content">

