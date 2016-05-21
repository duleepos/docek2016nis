<?php

class Objekti_Controller extends Controller {

    public function index(){
        $ranges = array();

        if (!empty($_GET['range_1'])) {
            $ranges[1] =  '`price` BETWEEN 0 AND 500';
        }
        if (!empty($_GET['range_2'])) {
            $ranges[2] =  '`price` BETWEEN 500 AND 1000';
        }
        if (!empty($_GET['range_3'])) {
            $ranges[3] =  '`price` > 1000';
        }

        $search = !empty($_GET['pretraga']) ? $_GET['pretraga'] : '';

        $itemsPerPage = 8;
        $page = 1;

        if (!empty($_GET['page']) && $_GET['page'] > 1) {
            $page = $_GET['page'];
        }

        $offset = ($page - 1) * $itemsPerPage;
        $limit = $itemsPerPage;

        $itemsCount = $this->model->countItems(0, $search, $ranges);

        $pagesCount = ceil($itemsCount / $itemsPerPage);
        $this->view->pagesCount = $pagesCount;
        $this->view->currentPage = $page;

        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
       
        $items = $this->model->getItems(0, $offset, $limit, $search, $ranges);
        $this->view->items = $items;
        $this->view->paginationUrl = URL . 'objekti';
        $this->view->searchParam = !empty($search) ? '&pretraga=' . $search : '';
        $this->view->search = $search;
        $this->view->render('objekti/index.php');
    }

    public function kategorija($categoryUrl) {
        $ranges = array();

        if (!empty($_GET['range_1'])) {
            $ranges[1] =  '`price` BETWEEN 0 AND 500';
        }
        if (!empty($_GET['range_2'])) {
            $ranges[2] =  '`price` BETWEEN 500 AND 1000';
        }
        if (!empty($_GET['range_3'])) {
            $ranges[3] =  '`price` > 1000';
        }

        $categoryId = explode('-', $categoryUrl);
        $categoryId = (int)$categoryId[0];

        $search = !empty($_GET['pretraga']) ? $_GET['pretraga'] : '';

        $itemsPerPage = 8;
        $page = 1;

        if (!empty($_GET['page']) && $_GET['page'] > 1) {
            $page = $_GET['page'];
        }

        $offset = ($page - 1) * $itemsPerPage;
        $limit = $itemsPerPage;

        $itemsCount = $this->model->countItems($categoryId, $search, $ranges);

        $pagesCount = ceil($itemsCount / $itemsPerPage);
        $this->view->pagesCount = $pagesCount;
        $this->view->currentPage = $page;

        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
        $this->view->currentCategoryId = $categoryId;
        $items = $this->model->getItems($categoryId, $offset, $limit, $search, $ranges);
        $this->view->items = $items;
        $this->view->paginationUrl = URL . 'objekti/kategorija/' . $categoryId;
        $this->view->searchParam = !empty($search) ? '&pretraga=' . $search : '';
        $this->view->search = $search;
        $this->view->render('objekti/index.php');
    }

    public function objekat($itemUrl) {
        $itemId = explode('-', $itemUrl);
        $itemId = (int)$itemId[0];

        $categories = $this->model->getCategories();
        $this->view->categories = $categories;
        $item = $this->model->getItem($itemId);
        $this->view->item = $item;
        $this->view->render('objekti/objekat.php');
    }

    public function dodajUkorpu($itemId) {
        if (!empty($itemId) && $itemId > 0) {
            $item = $this->model->getItem($itemId);
            $_SESSION['korpa'][] = $item;
        }

        header('Location: ' . URL . 'objekti/objekat/' . $itemId);
    }

    public function korpa() {
        $itemsCount = !empty($_SESSION['korpa']) ? count($_SESSION['korpa']) : 0;
        $items = array();

        if(!empty($_SESSION['korpa'])){
        $items = $_SESSION['korpa'];
        }

        $this->view->items = $items;
        $this->view->itemsCount = $itemsCount;
        $this->view->render('objekti/korpa.php');
    }

    public function naruci() {
        if (!empty($_SESSION['user_id']) &&  !empty($_SESSION['korpa'])) {

            $amount = count($_SESSION['korpa']);
            
            $items = $_SESSION['korpa'];
            
            foreach ($_SESSION['korpa'] as $objekatUkorpi) {
                    $priceSum += $objekatUkorpi['price'];
            }

            $this->model->purchase($_SESSION['user_id'], $items, $amount, $priceSum);
            
            /*foreach ($_SESSION['korpa'] as $item) {
                $this->model->purchase($_SESSION['user_id'], $item);
            }*/

            unset($_SESSION['korpa']);

            header('Location: ' . URL . 'objekti?naruceno=true');
        }
    }

    public function obrisiIzKorpe($rb) {
        $rb = empty($rb) ? 0 : $rb;
        unset($_SESSION['korpa'][$rb]);

        header('Location: ' . URL . 'objekti/korpa');
        return true;
    }


}

?>