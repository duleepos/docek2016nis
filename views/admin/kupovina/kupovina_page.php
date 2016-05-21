<link href="<?php echo URL . 'libs/javascript/facebox/facebox.css'; ?>" media="screen" rel="stylesheet" type="text/css"/>
<script src="<?php echo URL . 'libs/javascript/facebox/facebox.js'; ?>" type="text/javascript"></script> 

<script type="text/javascript">
$(function() {
  $('a[rel*=facebox]').facebox()
});
</script>


<h1>kupovina</h1>


<table border="1" >
    <tr>
        <td>ID</td>
        <td>Ime i Prezime</td>
        <td>Datum kupovine</td>
        <td>Kolicina</td>
        <td>Ukupna Cena</td>
    </tr>
    <?php foreach ($this->kupovinaPage as $purchase): ?>
    <tr>       
        <td><b><?php echo $purchase['purchase']['purchase_id']; ?></b></td>
        <td><?php echo $purchase['purchase']['first_name'] . ' ' . $purchase['purchase']['last_name']; ?></td>
        <td><?php echo date("d. m. Y", $purchase['purchase']['purchase_date']); ?></td>
        <td><?php echo '<a href="#kupovina_' . $purchase['purchase']['purchase_id'] . '" rel="facebox">' . $purchase['purchase']['amount'] . '</a>'; 
            if (!empty($purchase['purchase']['items'])) {
                echo '<div class="none" id="kupovina_' . $purchase['purchase']['purchase_id'] . '">';
                echo '<h2>Spisak proizvoda:</h2>';
                echo '<table border="1">';
                echo '<tr>';
                echo '<td>Naziv</td>';
                echo '<td>Kategorija</td>';
                echo '<td>Cena</td>';
                echo '</tr>';
                foreach ($purchase['purchase']['items'] as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['title'] . '</td>';
                    echo '<td>' . $item['category'] . '</td>';
                    echo '<td><span class="price">' . number_format($item['price'], 2, ',', '.') . ' RSD</span></td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
        } ?>
        </td>
        <td><span class="price"><?php echo number_format($purchase['purchase']['total_price'], 2, ',', '.'); ?> RSD</span></td>
    </tr>
    <?php endforeach; ?>

</table>