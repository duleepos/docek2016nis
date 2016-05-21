<div class="navigation cf">
                <ul>
                    
                    <li><a <?php if (!empty($this->controllerName) && $this->controllerName == 'objekti') { echo 'class="active"' ; } ?> href="<?php echo URL ?>">Doček-2016-Niš</a></li>
                    <ul>
                        <?php foreach ($this->categories as $category) {?>
                            <li <?php if (!empty($this->currentCategoryId) && $this->currentCategoryId == $category['category_id'] ) { echo 'class="active"'; } ?> >
                                <a href="<?php echo URL . 'objekti/kategorija/' . $this->urlName($category['category_id'].'-'.$category['name']); ?>"> <?php echo $category['name'] ?> </a> 
                            </li>
                        <?php } ?>
                    </ul>
                    <li><a <?php if (!empty($this->controllerName) && $this->controllerName == 'kontakt') { echo 'class="active"' ; } ?> href="<?php echo URL . 'kontakt' ?>">Kontakt</a></li>
                    
                </ul>
            </div>
<nav class="slider">
    <div id="toggle-menu"> <a href="#"><img src="<?php echo URL . 'images/menu.png' ?>"></a></div>
    <ul class="menu" id="menu">
       
     <li><a href="<?php echo URL ?>">Doček-2016-Niš</a></li>
                    <ul>
                        <?php foreach ($this->categories as $category) {?>
                            <li >
                                <a href="<?php echo URL . 'objekti/kategorija/' . $this->urlName($category['category_id'].'-'.$category['name']); ?>"> <?php echo $category['name'] ?> </a> 
                            </li>
                        <?php } ?>
                    </ul>
                    <li><a  href="<?php echo URL . 'kontakt' ?>">Kontakt</a></li>
   </ul>
 </nav>
            <div class="content">
                
                
                <div class="itm">
<h1><?php echo $this->item['title']; ?></h1>
<div class="items_left">
    
    
    <h3>
            <?php echo $this->item['details']; ?>
    </h3>
    
        
    <div class="item_image">
        <?php if (!empty($this->item['image'])) { ?>
            <img src="<?php echo $this->item['images']['300x700'] ?>" alt="<?php echo $this->item['image']; ?>"   />
        <?php } else { ?>
            <img alt="no_image"  src="<?php echo URL . 'images/no_image.png' ?>" />
        <?php } ?>
        
    </div>
    <h2>
        Informacije & rezervacije:
    <p><?php echo $this->item['info']; ?> </p>    
    </h2>
    
    <h3>
        Muzika: 
        <p><?php echo $this->item['music']; ?></p>
    </h3>
    
    <h3>
       Piće: 
       <p><?php echo $this->item['drink']; ?></p>
    </h3>
    
    <h3>
         Hrana:
         <p><?php echo $this->item['food']; ?></p>
    </h3>
    
    <h3>
       Cena: 
       <p><?php echo $this->item['price']; ?></p>
    </h3>
    
    <h2>
        Informacije & rezervacije:
        <p><?php echo $this->item['info']; ?> </p>
        
    </h2>
    
    <div class="galery">
        <p><?php echo $this->item['galery']; ?> </p>
        </div>
    <h3>
      Adresa:    
      <p><?php echo $this->item['address']; ?> </p>
    </h3>
    
    
    <div id="map">
        <p><?php echo $this->item['maps']; ?> </p>
    </div>
    
    <br/><a href="javascript:history.back()">Nazad</a>   
</div>
<div class="items_right">
    <h5><?php echo $this->item['title']; ?></h5>
    <h5>
        Informacije & rezervacije: <?php echo $this->item['info']; ?>
    </h5>
    
    <h5>
       Cena: <?php echo $this->item['price']; ?>    
    </h5>
    
    
</div>             
 <div class="clear_both"></div>
                </div>
