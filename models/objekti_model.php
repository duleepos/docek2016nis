<?php

class Objekti_Model extends Model {

    public function getCategories() {
        $categories = array();

        $sql = "SELECT `category_id`, `name`, `number_of_items_in_category`
                FROM `categories`
                ORDER BY `category_id` ASC";
        $result = $this->db->query($sql);

        if ($result->rowCount() > 0) {
            while ($rs = $result->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = $rs;
            }
        }

        return $categories;
    }
    
   

    public function getItems($categoryId = 0, $offset = 0, $limit = 0, $search = '', $ranges = array()) {
        $items = array();

        $limitSql = '';

        if ($offset == 0 && $limit > 0) {
            $limitSql = " LIMIT $limit ";
        } else if ($offset > 0 && $limit > 0) {
            $limitSql = " LIMIT $offset, $limit ";
        }

        $where = "";
        if (!empty($categoryId) && $categoryId > 0) {
            $where = " WHERE `fk_category_id` = '$categoryId' ";
        }
        if (!empty($search)) {
            $where = !empty($where) ? $where . " AND (`title` LIKE '%$search%' OR `description` LIKE '%$search%' ) " : " WHERE `title` LIKE '%$search%' OR `description` LIKE '%$search%'  ";
        }
        if (!empty($ranges)) {
            if (!empty($where)) {
                $where = $where . ' AND (' . join(' OR ', $ranges) . ')';
            } else {
                $where = 'WHERE ' . join(' OR ', $ranges);
            }
        }

        $sql = "SELECT  i.`item_id`, i.`title`, i.`details`, i.`info`, i.`music`, i.`drink`, i.`food`, i.`address`,i.`galery`,i.`maps`, i.`description`, i.`image`, i.`price`, i.`active`, i.`create_date`, i.`number_of_items`, i.`fk_category_id`,
                c.`name` AS `category`
                FROM `items` i
                INNER JOIN `categories` c ON c.category_id = i.fk_category_id
                $where
                ORDER BY i.`item_id` ASC    
                $limitSql
                ";
        $result = $this->db->query($sql);

        if ($result->rowCount() > 0) {
            while ($rs = $result->fetch(PDO::FETCH_ASSOC)) {
                if (!empty($rs['image'])) {
                    $rs['images']['160x400'] = URL . 'images/objekti/' . $rs['item_id'] . '/160x400_' . $rs['image'];
                    $rs['images']['300x700'] = URL . 'images/objekti/' . $rs['item_id'] . '/300x700_' . $rs['image'];
                }
                $items[] = $rs;
            }
        }

        return $items;
    }

    public function getItem($itemId) {
        $item = array();

        $sql = "SELECT  i.`item_id`, i.`title`, i.`details`, i.`info`, i.`music`, i.`drink`, i.`food`, i.`address`,i.`maps`,i.`galery`, i.`description`, i.`image`, i.`price`, i.`active`, i.`create_date`, i.`number_of_items`, i.`fk_category_id`,
                        c.`name` AS category
                FROM `items` i
                INNER JOIN `categories` c ON c.category_id = i.fk_category_id
                WHERE `item_id` = '$itemId' ";
        $result = $this->db->query($sql);

        if ($result->rowCount() > 0) {
            $item = $result->fetch(PDO::FETCH_ASSOC);

            if (!empty($item['image'])) {
                $item['images']['160x400'] = URL . 'images/objekti/' . $item['item_id'] . '/160x400_' . $item['image'];
                $item['images']['300x700'] = URL . 'images/objekti/' . $item['item_id'] . '/300x700_' . $item['image'];
            }
        }

        return $item;
    }

    public function countItems($categoryId = 0, $search = '', $ranges = array()) {
        $num = 0;

        $where = '';
        if (!empty($categoryId) && $categoryId > 0) {
            $where = " WHERE `fk_category_id` = '$categoryId' ";
        }
        if (!empty($search)) {
            $where = !empty($where) ? $where . " AND `title` LIKE '%$search%' " : " WHERE `title` LIKE '%$search%' ";
        }
        if (!empty($ranges)) {
            $where = !empty($where) ? $where . ' AND (' . join(' OR ', $ranges) . ')': 'WHERE ' . join(' OR ', $ranges);
        }

        $sql = "SELECT COUNT(*) AS num
                FROM `items`
                $where";
        $result = $this->db->query($sql);
        list($num) = $result->fetch();

        return (int)$num;
    }

    public function purchase($userId, $items, $amount, $priceSum) {
        $createDate = time();

        $sql = "INSERT INTO `purchases` (`fk_user_id`, `purchase_date`, `amount`, `total_price`)
                VALUES ('$userId', '$createDate', '$amount', '$priceSum')";
        $this->db->exec($sql);
        
        $purchaseId = $this->db->lastInsertId();
        
        foreach ($items as $item){
            $sql = "INSERT INTO `items_to_purchases`(`fk_purchase_id`, `fk_item_id`) 
                VALUES ('$purchaseId', '{$item['item_id']}')";
            $this->db->exec($sql);
        }
    }

}

?>