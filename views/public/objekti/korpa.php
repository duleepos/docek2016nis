<h1>KORPA</h1>

<h3>Proizvodi u korpi</h3>

<div class="korpa-izgled">
    
    <?php if (!empty($this->items)) { ?>
    
        <table border="1" >
            <tr>
                <td>Slika</td>
                <td>Proizvod</td>
                <td>Kategorija</td>
                <td>Cena</td>
                <td>&nbsp;</td>
            </tr>
            <?php $sumPrice = 0; ?>
            <?php foreach ($this->items as $rb => $item): ?>
            <tr>
                <td><img src="<?php echo $item['images']['160x160']; ?>" width="70" /></td>
                <td><?php echo $item['title'] ?></td>
                <td><?php echo $item['category'] ?></td>
                <td><?php echo $item['price'] ?></td>
                <td><a  style="color:red; " href="<?php echo URL . 'objekat/obrisiIzKorpe/' . $rb; ?>"><b>izbaci proizvod</b></a></td>
                <?php $sumPrice += $item['price'];?>
            </tr>
            <?php endforeach; ?>
        </table>

        <p class="br_proivoda">Broj proizvoda u korpi: <b><?php echo $this->itemsCount; ?></b></p>
        <p class="br_proivoda">Ukupna cena: <b style="color:red"><?php echo number_format($sumPrice, 2, ',', '.') ?></b> RSD</p>

        <div>
            <a class="button" href="<?php echo URL . 'objekat/naruci'; ?>">Naruči</a>
        </div>
        
    <?php } else { ?>
        <h2>Vaša korpa je prazna!</h2>
    <?php } ?>
    
</div>


<div class="clear_both"></div>