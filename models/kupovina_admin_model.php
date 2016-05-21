<?php

class Kupovina_admin_model extends Admin_Model {
    
    public function getPurchases() {
        $purchases = '';
        
        $sql = "SELECT p.`purchase_id`, p.`fk_user_id`, p.`purchase_date`, p.`amount`, p.`total_price`, u.`first_name`, u.`last_name` 
                FROM `purchases` p
                INNER JOIN `users` u ON p.`fk_user_id` = u.`user_id`";
        
        $result = $this->db->query($sql);
        
        if ($result->rowCount() > 0) {
            while ($rs = $result->fetch(PDO::FETCH_ASSOC)) {
                $purchases[] = $rs;
            }
            
            foreach ($purchases as $purchase) {
                $items = '';
                
                $sql = "SELECT  it.`item_id`, it.`title`, it.`description`, it.`price`,
                                c.`name` AS category
                        FROM `items_to_purchases` i
                        INNER JOIN `items` it ON i.`fk_item_id` = it.`item_id`
                        INNER JOIN `categories` c ON c.`category_id` = it.`fk_category_id`
                        WHERE `fk_purchase_id` = {$purchase['purchase_id']}";
                
                $result = $this->db->query($sql);
                
                if ($result->rowCount() > 0) {
                    while ($rs = $result->fetch(PDO::FETCH_ASSOC)) {
                        $items[] = $rs;
                    }
                }
                
                $kupovina['purchase'] = $purchase;
                $kupovina['purchase']['items'] = $items;
                $kupovine[] = $kupovina;
                
            }
            
        }
         return $kupovine;
        
    }
    
   
    
}
?>
