
<h1>Svi korisnici</h1>

<?php if ((!empty($_GET['korisnik_obrisan'])) && ($_GET['korisnik_obrisan'] == 'true')) :?>

<h3>Korisnik je obrisan!</h3>

<?php endif;


    //echo '<pre>';
    //print_r($this->list);
echo "
<a href='".ADMIN_URL."korisnici/registracijaKorisnika'>
    <button>Dodaj korisnika</button>
</a>
";
    echo "<table border='1'>";
    echo "
        <tr>
            <th>
                Username
            </th>
            <th>
                Email
            </th>
            <th>
                First name
            </th>
            <th>
                Last name
            </th>
            <th>
                Adress
            </th>
            <th>
                Phone
            </th>
            <th>
                Reg. date
            </th>
            <th>
                Active
            </th>
            <th>
                Admin/user
            </th>
            <th>
                Obrisi korisnika
            </th>
        </tr>";
foreach($this->list as $admin){

    echo "
        <tr>
            <td>{$admin['login']}</td>
            <td>{$admin['email']}</td>
            <td>{$admin['first_name']}</td>
            <td>{$admin['last_name']}</td>
            <td>{$admin['address']}</td>
            <td>{$admin['phone']}</td>
            <td>{$admin['registration_date']}</td>
            <td>{$admin['active']}</td>
            <td>";
            if ($admin['fk_group_id'] == 1) {
                echo 'Admin';
            } else {
                echo 'Korisnik';
            };
           echo "
            </td>
            <td><a href='" . ADMIN_URL . "korisnici/obrisiKorisnika/{$admin['user_id']}' >Obrisi</a></td>
        </tr>";

    
}
echo "</table>";
?>
