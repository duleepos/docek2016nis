<script type="text/javascript" src="<?php echo URL . 'libs/javascript/tinymce/tinymce.min.js' ?>"></script>

<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    width: 300,
    height: 300,

    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l  ink image | print preview media fullpage | forecolor backcolor emoticons"


 });
</script>
<h1>AZURIRANJE PROIZVODA</h1>

<div>
    <form class="form" action="<?php echo ADMIN_URL . 'objekti/izmeniProizvod' ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="item_id" value="<?php echo $this->item['item_id']; ?>" />
        <label for="title">Naziv</label> <textarea id="title" name="title" ><?php echo $this->item['title']; ?></textarea> <br/>
        <label for="details">Opis-širi</label> <textarea id="details" name="details" ><?php echo $this->item['details']; ?></textarea> <br/>
        <label for="info">Info</label> <input type="text" id="info" name="info" value="<?php echo $this->item['info']; ?>" /> <br/>
        <label for="music">Muzika</label> <input type="text" id="music" name="music" value="<?php echo $this->item['music']; ?>"/> <br/>
        <label for="drink">Piće</label> <input type="text" id="drink" name="drink" value="<?php echo $this->item['drink']; ?>"/> <br/>
        <label for="food">Hrana</label> <input type="text" id="food" name="food" value="<?php echo $this->item['food']; ?>"/> <br/>
        <label for="address">Adresa</label> <input type="text" id="address" name="address" value="<?php echo $this->item['address']; ?>" /> <br/>
        <label for="galery">galery</label> <textarea id="galery" name="galery" ><?php echo $this->item['galery']; ?></textarea> <br/>
        <label for="maps">mapa</label> <textarea id="maps" name="maps" ><?php echo $this->item['maps']; ?></textarea> <br/>
        <label for="description">Opis</label> <textarea id="description" name="description" ><?php echo $this->item['description']; ?></textarea> <br/>
        <?php if ( !empty($this->item['images']['300x300']) ) { ?>
        <label for="slika" >Slika</label> <img id="slika" alt="<?php echo $this->item['image']; ?>"  src="<?php echo $this->item['images']['300x300'] ?>" /> <br/>
        <?php } ?>
        <label for="image">Izmeni sliku</label> <input type="file" id="image" name="image" /> <br/>
        <label for="price">Cena</label> <input type="text" id="price" name="price" value="<?php echo $this->item['price']; ?>" /> <br/>
        <label for="fk_category_id">Kategorija</label>
            <select name="fk_category_id">
                <option value=""> - - - - - </option>
                <?php
                    foreach ($this->categories as $category) {
                        echo '<option ' .  ($this->item['fk_category_id'] == $category['category_id'] ? 'selected="selected"' : '') .  ' value="' . $category['category_id'] .'">'. $category['name'] . '</option>';
                    }
                ?>
            </select> <br/>
        <input class="button" type="submit" value="dodaj" />
    </form>
    
</div>
<div class="clear_both"></div>