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

<p>
    Dobro došli u Online Shop Administraciju!
</p>

<form action="<?php echo ADMIN_URL . 'home/azuriraj'; ?>" method="post" >

    Naslov: <input type="text" name="title" value="<?php echo $this->homePage['title']; ?>" /> <br />
    Opis:   <textarea rows="20" cols="100" name="description" ><?php echo $this->homePage['description']; ?></textarea> <br />

    <input type="submit" value="azuriraj" />
</form>