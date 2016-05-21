<?php

Class Korisnici_Admin_Model extends Admin_Model{

    public function loginCheck($login, $password) {
        $password = md5($password);

        $sql = "SELECT `user_id`, `login`, `password`, `email`, `first_name`, `last_name`, `address`, `phone`, `registration_date`, `active`, `email_code`, `fk_group_id`
                FROM `users`
                WHERE `login` = '$login' AND `password` = '$password' AND `active` = 1 AND `fk_group_id` = 1
                LIMIT 1";
        $result = $this->db->query($sql);

        if ($result->rowCount() > 0) {
            $user = $result->fetch(PDO::FETCH_ASSOC);

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['group_id'] = $user['fk_group_id'];
            return true;
        } else {
            return false;
        }

    }


    function usersList($catId){
        $sql = "SELECT `user_id`, `login`, `password`, `email`, `first_name`, `last_name`, `address`, `phone`, `registration_date`, `active`, `email_code`, `fk_group_id`
                FROM `users`
                WHERE `fk_group_id` IN ({$catId})";
        $result = $this->db->query($sql);
        if ($result->rowCount() > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                $users[] = $row;
            }
            return $users;

        }
        else{
            return "error";
        }
    }

     public function userAdd($user) {
        $registrationDate = time();

        //Proveravamo da li postoji login ili email
        $sql = "SELECT *
                FROM `users`
                WHERE `login` = '{$user['login']}' OR `email` = '{$user['email']}' ";
        $result = $this->db->query($sql);
        if ($result->rowCount() > 0) {
            return false;
        }

        $sql = "INSERT INTO `users` (`login`, `password`, `email`, `first_name`, `last_name`, `address`, `phone`, `registration_date`, `active`, `fk_group_id`)
                VALUES (:login, :password, :email, :first_name, :last_name, :address, :phone, :registration_date, :active, :fk_group_id)";
        $result = $this->db->prepare($sql);
        $result->execute(array(':login' => $user['login'],
                               ':password' => md5($user['password']),
                               ':email' => $user['email'],
                               ':first_name' => $user['first_name'],
                               ':last_name' => $user['last_name'],
                               ':address' => $user['address'],
                               ':phone' => $user['phone'],
                               ':registration_date' => $registrationDate,
                               ':active' => 1,
                               ':fk_group_id' => $user['fk_group_id']
                               )
                        );
        return true;
    }

    public function obrisiKorisnika($id){

        $sql = "DELETE FROM `users` WHERE `user_id` = {$id}";

        $result = $this->db->query($sql);

    }


}
?>