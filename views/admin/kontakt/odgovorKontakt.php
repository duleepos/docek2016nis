<h1>ODGOVORI</h1>

<form action="<?php echo ADMIN_URL . 'kontakt/odgovorKontakt/' . $this->contact['contact_id'] ;?>" method="post">
   TO: <input type="text" name="email" value="<?php echo $this->contact['email']; ?>"><br/> 
   SUBJECT : <input type="text" name="subject" ><br/>
   ODGOVOR : <textarea name="odgovor"></textarea>
             <input type="submit" value="odgovori">
</form>
