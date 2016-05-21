
<h1>Users</h1>


<?php
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
        </tr>
";
    
}
echo "</table>";
?>
