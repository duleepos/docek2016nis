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
<h1>NOVI PROIZVOD</h1>

<div>
    <form class="form" action="<?php echo ADMIN_URL . 'objekti/dodajProizvod' ?>" method="post" enctype="multipart/form-data">
        <label for="title">Naziv</label> <input type="text" id="title" name="title" /> <br/>
        <label for="details">Opis-širi</label> <textarea id="details" name="details" ></textarea> <br/>
        <label for="info">Info</label> <input type="text" id="info" name="info" /> <br/>
        <label for="music">Muzika</label> <input type="text" id="music" name="music" /> <br/>
        <label for="drink">Piće</label> <input type="text" id="drink" name="drink" /> <br/>
        <label for="food">Hrana</label> <input type="text" id="food" name="food" /> <br/>
        <label for="address">Adresa</label> <input type="text" id="address" name="address" /> <br/>
        <label for="address">mapa</label> <input type="text" id="maps" name="maps"<br/>
        <label for="address">galerija</label> <input type="text" id="galery" name="galery"<br/>
        <label for="description">Opis</label> <textarea id="description" name="description" ></textarea> <br/>
        <label for="price">Cena</label> <input type="text" id="price" name="price" /> <br/>
        <label for="image">Slika</label> <input type="file" id="image" name="image" /> <br/>
        <label for="fk_category_id">Kategorija</label>
            <select name="fk_category_id">
                <option value=""> - - - - - </option>
                <?php
                    foreach ($this->categories as $category) {
                        echo '<option value="' . $category['category_id'] .'">'. $category['name'] . '</option>';
                    }
                ?>
            </select> <br/>
        <input class="button" type="submit" value="dodaj" />
    </form>
    
</div>
<div class="clear_both"></div>