<?php

class Objekti_Admin_Controller extends Admin_Controller {

    public $thumbs = array(
                           '160x400' => array('width' => 160, 'height' => 400),
                           '300x700' => array('width' => 300, 'height' => 700)
                          );

    public function kategorije() {
        $this->view->activeNavigation = 'kategorije';
        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
        $this->view->render('objekti/kategorije.php');
    }

    public function dodajKategoriju() {
        $name = $_POST['name'];
        $this->model->addCategory($name);
        header('Location: ' . ADMIN_URL . 'objekti/kategorije');
    }
    public function obrisiKategoriju() {
        $categoryId = $_GET['category_id'];
        $this->model->deleteCategory($categoryId);
        header('Location: ' . ADMIN_URL . 'objekti/kategorije');
    }

    public function index(){
        $this->view->activeNavigation = 'objekti';
        $search = !empty($_GET['pretraga']) ? $_GET['pretraga'] : '';
				
        $itemsPerPage = 5;
        $page = 1;
        
        if (!empty($_GET['page']) && $_GET['page'] > 1) {
            $page = $_GET['page'];
        }
        
        $offset = ($page - 1) * $itemsPerPage;
        $limit = $itemsPerPage;
        
        $itemsCount = $this->model->countItems(0, $search);
        
        $pagesCount = ceil($itemsCount / $itemsPerPage);
        $this->view->pagesCount = $pagesCount;
        $this->view->currentPage = $page;
        
        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
        $items = $this->model->getItems(0, $offset, $limit, $search);
        $this->view->items = $items;
        $this->view->paginationUrl = ADMIN_URL . 'objekti';
        $this->view->searchParam = !empty($search) ? '&pretraga=' . $search : '';
        $this->view->search = $search;
        $this->view->render('objekti/index.php');
    }

    public function noviProizvod() {
        $this->view->activeNavigation = 'objekti';

        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
        
        $this->view->render('objekti/novi_objekat.php');
    }
    
    public function dodajProizvod() {
        $item['title'] = $_POST['title'];
        $item['details'] = $_POST['details'];
        $item['info'] = $_POST['info'];
        $item['music'] = $_POST['music'];
        $item['drink'] = $_POST['drink'];
        $item['food'] = $_POST['food'];
        $item['address'] = $_POST['address'];
        $item['maps'] = $_POST['maps'];
        $item['galery'] = $_POST['galery'];        
        $item['description'] = $_POST['description'];
        $item['price'] = $_POST['price'];
        $item['fk_category_id'] = $_POST['fk_category_id'];
        $item['image'] = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        $itemId = $this->model->addItem($item);

        //Ako dodajemo sliku
        if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['size'] > 0) {
            require_once LIBS . 'PHPThumb/ThumbLib.inc.php';
            $imageFolder = BASE_PATH.'images/objekti/' . $itemId . '/';
            $imageFile = $_FILES['image']['name'];

            if (!is_dir($imageFolder)) {
                mkdir($imageFolder);
            }

            foreach ($this->thumbs as $thumb) {
                $newImageFile = $thumb['width'] . 'x' . $thumb['height'] . '_' . $imageFile;
                $phpThumb = PhpThumbFactory::create($_FILES['image']['tmp_name']);
                $phpThumb->resize($thumb['width'], $thumb['height'])->save($imageFolder . $newImageFile);
            }

        }

        header('Location: ' . ADMIN_URL . 'objekti');
    }
    
    public function obrisiProizvod() {
        $itemId = $_GET['item_id'];
        $this->model->deleteItem($itemId);
        header('Location: ' . ADMIN_URL . 'objekti/');
    }
    
    public function azuriranjeProizvoda($itemId) {
        $this->view->activeNavigation = 'objekti';
        
        $item = $this->model->getItem($itemId);
        $this->view->item = $item;
        
        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
        
        $this->view->render('objekti/azuriranje_objekata.php');
    }
    
    public function izmeniProizvod() {
        $item['item_id'] = $_POST['item_id'];
        $item['title'] = $_POST['title'];
        $item['details'] = $_POST['details'];
        $item['info'] = $_POST['info'];
        $item['music'] = $_POST['music'];
        $item['drink'] = $_POST['drink'];
        $item['food'] = $_POST['food'];
        $item['address'] = $_POST['address'];
        $item['maps'] = $_POST['maps'];
        $item['galery'] = $_POST['galery'];
        $item['description'] = $_POST['description'];
        $item['price'] = $_POST['price'];
        $item['fk_category_id'] = $_POST['fk_category_id'];
        $item['image'] = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        $this->model->updateItem($item);

        //Ako menjamo sliku
        if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['size'] > 0) {
            require_once LIBS . 'PHPThumb/ThumbLib.inc.php';
            $imageFolder = BASE_PATH.'images/objekti/' . $item['item_id'] . '/';
            $imageFile = $_FILES['image']['name'];

            if (!is_dir($imageFolder)) {
                mkdir($imageFolder);
            }

            foreach ($this->thumbs as $thumb) {
                $newImageFile = $thumb['width'] . 'x' . $thumb['height'] . '_' . $imageFile;
                $phpThumb = PhpThumbFactory::create($_FILES['image']['tmp_name']);
                $phpThumb->resize($thumb['width'], $thumb['height'])->save($imageFolder . $newImageFile);
            }

        }

        header('Location: ' . ADMIN_URL . 'objekti');
    }


}

?>