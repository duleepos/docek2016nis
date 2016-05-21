<p>
    Izmeni kontakt stranicu!
</p>

<form action="<?php echo ADMIN_URL . 'kontakt/azurirajKontaktStranicu'; ?>" method="post" >
  
    Naslov: <input type="text" name="title" value="<?php echo $this->kontaktPage['title']; ?>" /> <br />
    Opis:   <textarea rows="20" cols="100" name="description" ><?php echo $this->kontaktPage['description']; ?></textarea> <br />

    <input type="submit" value="azuriraj" />
</form>