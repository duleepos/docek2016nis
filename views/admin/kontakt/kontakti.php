<h1>KONTAKTI</h1>

<?php if(!empty($_GET['poruka']) && $_GET['poruka'] == 'uspesan_odgovor'): ?>
<p style="color: red">Uspesno ste ogovorili !</p>
<?php endif;?>

<div>

    <table class="mt15" border="1">
        <tr>
            <td>ID</td>
            <td>Ime i Prezime</td>
            <td>Email</td>
            <td>Tekst</td>
            <td>&nbsp;</td>
        </tr>
        <?php
        foreach ($this->contacts as $contact) {
            echo '<tr>';
            echo '<td>' . $contact['contact_id'] . '</td>';
            echo '<td>' . $contact['name'] . '</td>';
            echo '<td>' . $contact['email'] . '</td>';
            echo '<td>' . $contact['text'] . '</td>';
            echo '<td>' . date('H:i:s d/m/Y', $contact['create_date']) . '</td>';
            echo '<td><a href="' . ADMIN_URL .'kontakt/obrisiKontakt?contact_id=' . $contact['contact_id'] . '" title="Obrisi kontakt"><img src="' . URL . 'images/icon_delete.png" /></a>';
            echo '&nbsp;<a href="' . ADMIN_URL .'kontakt/odgovori/' . $contact['contact_id'] . '">Odgovori</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>