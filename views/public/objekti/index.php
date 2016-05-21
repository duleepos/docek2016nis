<div class="navigation cf">
                <ul>
                    
                    <li><a <?php if (!empty($this->controllerName) && $this->controllerName == 'objekti') { echo 'class="active"' ; } ?> href="<?php echo URL?>">Doček-2016-Niš</a></li>
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

 <?php foreach ($this->categories as $category) {
                            if (!empty($this->currentCategoryId) && $this->currentCategoryId == $category['category_id'] )  
{echo '<h1>'.'DOČEK NOVE 2016 GODINE - NIŠ:'.' '.$category['name'].'</h1>';}

}
if (!empty($this->controllerName) && $this->controllerName === 'objekti' && empty($this->currentCategoryId)){
echo '<div class="top"><h1>'.'DOČEK NOVE 2016 GODINE - NIŠ'.'</h1>'
        . '<p>Želite da pronađete pravo mesto za provod u najluđoj noći!? Doček-2016-Niš.rs je 
                    za vas napravio listu objekata u Nišu koji organizuju proslave - žurke za doček nove godine. 
                    Svi objekti su podeljeni na kategorije: 
                    <a  href="objekti/kategorija/1-restorani-i-kafane"> Restorani i kafane,</a>
                    <a  href="objekti/kategorija/2-klubovi-i-kafici"> Klubovi i kafići,</a> 
                    <a  href="objekti/kategorija/3-repriza-doceka"> Repriza dočeka i</a> 
                    <a  href="objekti/kategorija/4-srpska-nova-godina"> Srpska nova godina.</a> </p>'
        . '</div>';}?>


<div class="items">

    <div class="search" >
	<div style="text-align:left;">
	<div class="fb-share-button" data-href="http://www.docek-2016-nis.rs/" data-layout="button"></div>
	<div class="fb-like" style="padding-left:20px;" data-href="https://www.facebook.com/Do&#x10d;ek-Nove-Godine-Ni&#x161;-1506924202938195" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
	<div class="fb-send" style="padding-left:20px;" data-href="https://www.facebook.com/Do&#x10d;ek-Nove-Godine-Ni&#x161;-1506924202938195"></div>
	</div>
	<a href="http://www.docek-2016-nis.rs/ponuda.php"> Ponuda za organizatore</a>
        <form action="<?php echo $this->paginationUrl; ?>" method="get">
            <div class="form1">
                <input type="text" name="pretraga" placeholder="Pretraga..." value="<?php echo $this->search; ?>"/>
                <input  type="submit" value=" "   />
            </div>
        </form>
    </div>

    <ul class="items_list cf">
        <?php foreach($this->items as $item):
            $itemUrl = URL . 'objekti/objekat/' . $this->urlName($item['item_id'].'-'.$item['title']);
        ?>
            <li>
                <div class="item_thumb">
                    <?php if (!empty($item['image'])) { ?>
                        <a href="<?php echo $itemUrl; ?>"><img src="<?php echo $item['images']['160x400'] ?>" alt="thumb"></a>
                    <?php } else { ?>
                        <a href="<?php echo $itemUrl; ?>"><img  alt="no_image"  src="<?php echo URL . 'images/no_image.png' ?>" /></a>
                    <?php } ?>
                </div>
                <div class="description">
                    
                        
                        <h2 class="title4"><a href="<?php echo $itemUrl; ?>"><?php echo $item['title'] ?></a></h2>
                        <div class="description1">      
                            <h3 class="title3"><a><?php echo $item['description'] ?></a></h3>
                        <a href="<?php echo $itemUrl; ?>">opširnije...</a>
                        </div>
                        
                    
                </div>
            </li>
        <?php endforeach; ?>
            <li>
                <div class="item_thumb">
                    
                        
                    
                        <a href="<?php echo URL.'kontakt'; ?>"><img  alt="docek"  src="<?php echo URL . 'images/docek.png' ?>" /></a>
                    
                </div>
                <div class="description">
                    
                        
                        <h2 class="title4"><a href="<?php echo URL.'kontakt'; ?>">Slobodno reklamno mesto za vašu proslavu/žurku</a></h2>
                        <div class="description1">      
                            <h3 class="title3">
                                <a>
                                    <p>Muzika: </p>
                                    <p>Piće: </p>
                                    <p>Hrana: </p>
                                    <p>Cena za doček Nove Godine: </p>
                                    <p>Kontakt: </p>
                                    <p> </p>
                                    <p>Dočekajte novu 2016. godinu u...</p>
                                    
                                </a>
                            </h3>
                        <h3><a href="<?php echo URL.'kontakt'; ?>">opširnije...</a></h3>
                        </div>
                        
                    
                </div>
            </li>
    </ul>
    

    
    
</div>
  <div class="kontakt1">
      
                    <h2>
                       <a  href="<?php echo URL . 'kontakt' ?>"> <p>- INFO i Marketing -</p>
                        <p>Doček-2016-Niš </p></a>
                    <p>Telefon: <a href="tel:+381601396594">060 1396594</a></p>
                    <p>Email: <a href="mailto:docek2016nis@gmail.com?Subject=Docek2016">docek2016nis@gmail.com</a></p></h2>
  </div>                 
<div class="clear_both"></div>