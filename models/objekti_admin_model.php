<?php

include_once LIBS . 'Model.php';
include_once BASE_PATH . 'models/objekti_model.php';

class Objekti_Admin_Model extends Objekti_Model {
    
    public function addCategory($name) {
        if (empty($name)) {
            return false;
        }

        $sql = "INSERT INTO `categories` (`name`, `number_of_items_in_category`)
                VALUES ('$name', 0)";
        $this->db->exec($sql);
        
        return true;
    }
    
    public function deleteCategory($categoryId) {
        if (empty($categoryId)) {
            return false;
        }

        $sql = "DELETE FROM `categories`
                WHERE `category_id` = '$categoryId'";
        $this->db->exec($sql);

        return true;
    }
    
    
    public function addItem($item) {
        $sql = "INSERT INTO `items` (`title`, `details`, `info`, `music`, `drink`, `food`, `address`,`maps`,`galery`, `description`, `image`, `price`, `fk_category_id`,`active`)
                VALUES ('{$item['title']}', '{$item['details']}', '{$item['info']}', '{$item['music']}', '{$item['drink']}', '{$item['food']}', '{$item['address']}', '{$item['maps']}', '{$item['galery']}', '{$item['description']}', '{$item['image']}', '{$item['price']}', '{$item['fk_category_id']}', 1)";
        if ( $this->db->exec($sql) == true && $item['fk_category_id'] > 0 ) {
            $itemId = $this->db->lastInsertId();

            $sql = "UPDATE `categories` SET `number_of_items_in_category` = number_of_items_in_category+1
                    WHERE `category_id` = '{$item['fk_category_id']}'";
            $this->db->exec($sql);
        }
        
        return $itemId;
    }
    
    public function deleteItem($itemId) {
        if (empty($itemId)) {
            return false;
        }
        
        $item = $this->getItem($itemId);
        
        $sql = "DELETE FROM `items`
                WHERE `item_id` = '$itemId'";
        if ( $this->db->exec($sql) ) {
            if (!empty($item['fk_category_id'])) {
                $sql = "SELECT COUNT(*) AS items
                        FROM `items` 
                        WHERE `fk_category_id` = '{$item['fk_category_id']}'";
                list($itemsCount) = $this->db->query($sql)->fetch();
                
                $sql = "UPDATE `categories` SET `number_of_items_in_category` = '$itemsCount'
                        WHERE `category_id` = '{$item['fk_category_id']}'";
                $this->db->exec($sql);
            }
        }

        return true;
    }
    
    public function updateItem($item) {
        $imageSql = !empty($item['image']) ? " , `image` = '{$item['image']}' " : '';

        $sql = "UPDATE `items` SET `title` = '{$item['title']}',  `details` = '{$item['details']}',  `info` = '{$item['info']}',
                         `music` = '{$item['music']}', `drink` = '{$item['drink']}', `food` = '{$item['food']}',
                           `address` = '{$item['address']}', `maps` = '{$item['maps']}', 
                        `description` = '{$item['description']}', `price` = '{$item['price']}',    
                       `fk_category_id` = '{$item['fk_category_id']}'
                       $imageSql
                WHERE `item_id` = '{$item['item_id']}'";
        $this->db->exec($sql);
        
        return true;
    }

    
}

?>