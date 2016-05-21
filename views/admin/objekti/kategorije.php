<h1>KATEGORIJE</h1>

<div>
    Dodaj kategoriju:
    <form class="form" action="<?php echo ADMIN_URL . 'objekti/dodajKategoriju'; ?>" method="post">
        <label for="name">Naziv</label> <input type="text" id="name" name="name" />
        <input type="submit" value="dodaj" />
    </form>

    <table class="mt15" border="1">
        <tr>
            <td>ID</td>
            <td>Naziv</td>
            <td>Broj proizvoda</td>
            <td>&nbsp;</td>
        </tr>
        <?php
        foreach ($this->categories as $category) {
            echo '<tr>';
            echo '<td>' . $category['category_id'] . '</td>';
            echo '<td>' . $category['name'] . '</td>';
            echo '<td>' . $category['number_of_items_in_category'] . '</td>';
            echo '<td><a href="' . ADMIN_URL .'objekti/obrisiKategoriju?category_id=' . $category['category_id'] . '" title="Obrisi kategoriju"><img src="' . URL . 'images/icon_delete.png" /></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>