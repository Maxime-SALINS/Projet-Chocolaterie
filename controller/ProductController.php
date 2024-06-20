<?php
namespace App\controller;

use App\model\ProductModel;
use App\manager\ProductManager;
use App\Model\Page;
use App\manager\PageManager;

class ProductController extends AbstractController {

    public function viewProductDash(string $path, string $files)
    {
        $tableSql = new ProductManager;
        $product_elements = $tableSql->findAll();

        $this->render($path, [
            'title' => 'Dashboard',
            'first_title' => 'Dashboard administrateur',
            'name' => 'dashboard',
            'product_elements'=>$product_elements
        ], 'dashboard',$files);
    }

    public function viewAll()
    {
        $newProduct = new ProductModel;
        
        $tableSql = new ProductManager;
        $product_elements = $tableSql->findAll();

        $productPage = new PageManager;
        $elements = $productPage->findElements('Produits');

        $newPage = new Page($elements);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            if(isset($_POST['filter_chocolate'])){

                $newProduct->setCategory($_POST['filter_chocolate']);
                $category_name = $newProduct->getCategory();
                $product_elements = $tableSql->findByCategory($category_name);

            } elseif(isset($_POST['filter_cafe'])){

                $newProduct->setCategory($_POST['filter_cafe']);
                $category_name = $newProduct->getCategory();
                $product_elements = $tableSql->findByCategory($category_name);

            } elseif(isset($_POST['filter_the'])){

                $newProduct->setCategory($_POST['filter_the']);
                $category_name = $newProduct->getCategory();
                $product_elements = $tableSql->findByCategory($category_name);

            } elseif(isset($_POST['filter_glace'])){

                $newProduct->setCategory($_POST['filter_glace']);
                $category_name = $newProduct->getCategory();
                $product_elements = $tableSql->findByCategory($category_name);
            }
        }

        $this->render('product-list', [
            'newPage' => $newPage,
            'title_default' => 'Page | Chocolaterie',
            'product_elements' => $product_elements,
            'name' => 'product'
        ]);

    }

    public function showOne(int $product_id)
    {
        $newProduct = new ProductModel;
        $newProduct->setId($product_id);
        
        $tableSql = new ProductManager;
        $product_element = $tableSql->findOne($newProduct->getId());

        $productPage = new PageManager;
        $elements = $productPage->findElements('Produits');

        $newPage = new Page($elements);

        $this->render('product-detail', [
            'newPage' => $newPage,
            'title_default' => 'Page | Chocolaterie',
            'product_element' => $product_element,
            'name' => 'product'
        ]);
    }

    public function getCategory():array 
    {
        $tableSql = new ProductManager;
        
        return $tableSql->findCategory();
    }

    public function createProduct(string $path, string $files)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!empty($_POST['product_name']) && !empty($_POST['description']) && !empty($_POST['category']) && !empty($_FILES['image_product']['name'])){
    
                $newProduct = new ProductModel;
    
                $newProduct->setProduct_name($_POST['product_name']);
                $newProduct->setProduct_image($_FILES['image_product']['name']);
                $newProduct->setDescription($_POST['description']);
                $newProduct->setCategory_id($_POST['category']);
    
                $product_name = $newProduct->getProduct_name();
                $image_product = $newProduct->getProduct_image();
                $description = $newProduct->getDescription();
                $category_id = $newProduct->getCategory_id();
    
                //Check if product exist already on bdd :
                $newQuery = new ProductManager;
                $table_product= $newQuery->findAll();
    
                if(!in_array($product_name, array_column($table_product, "product_name"))){
                    
                    //image infos :
                    $tmpName = $_FILES['image_product']['tmp_name'];
        
                    //Get extension of image :
                    $imgExtension = pathinfo($image_product, PATHINFO_EXTENSION);
        
                    //Regex for extension valid :
                    $extensionValid = ['jpg', 'jpeg','gif','png','webp'];
        
                    //Test if extension is valid or not :
                    if (!in_array(strtolower($imgExtension),$extensionValid)){

                        $msg_error = "l'extention de l'image n'est pas valide";

                        $this->render($path, [
                            'title' => 'Dashboard',
                            'first_title' => 'Dashboard administrateur',
                            'name' => 'dashboard',
                            'categorys' => $this->getCategory(),
                            'msg_error' => $msg_error
                        ], 'dashboard',$files);

                    } else {
                        
                        move_uploaded_file($tmpName, 'assets/images/produits/'. $image_product);
                        
                        $image_product = "/assets/images/produits/" . $image_product;

                        $newQuery->create($product_name, $image_product, $description, $category_id);
                        
                        $this->redirect('/dashboard/produits');
                    }
                } else{
                    $msg_error = "le produit existe déjà";

                    $this->render($path, [
                        'title' => 'Dashboard',
                        'first_title' => 'Dashboard administrateur',
                        'name' => 'dashboard',
                        'categorys' => $this->getCategory(),
                        'msg_error' => $msg_error
                    ], 'dashboard',$files);
                }
            } else {
                $msg_error = "Vueillez remplir tous les champs";

                $this->render($path, [
                    'title' => 'Dashboard',
                    'first_title' => 'Dashboard administrateur',
                    'name' => 'dashboard',
                    'categorys' => $this->getCategory(),
                    'msg_error' => $msg_error
                ], 'dashboard',$files);
            }
        }

        $this->render($path, [
            'title' => 'Dashboard',
            'first_title' => 'Dashboard administrateur',
            'name' => 'dashboard',
            'categorys' => $this->getCategory()
        ], 'dashboard',$files);
    }

    public function updateProduct(string $path, string $files)
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!empty($_POST['product_name']) && !empty($_POST['description']) && !empty($_FILES['image_product']['name'])){
    
                $newProduct = new ProductModel;
    
                $newProduct->setId($_GET['product_id']);
                $newProduct->setProduct_name($_POST['product_name']);
                $newProduct->setProduct_image($_FILES['image_product']['name']);
                $newProduct->setDescription($_POST['description']);
    
                $product_id = $newProduct->getId();
                $product_name = $newProduct->getProduct_name();
                $image_product = $newProduct->getProduct_image();
                $description = $newProduct->getDescription();
                    
                //image infos :
                $tmpName = $_FILES['image_product']['tmp_name'];
    
                //Get extension of image :
                $imgExtension = pathinfo($image_product, PATHINFO_EXTENSION);
    
                //Regex for extension valid :
                $extensionValid = ['jpg', 'jpeg','gif','png','webp'];
        
                //Test if extension is valid or not :
                if (!in_array(strtolower($imgExtension),$extensionValid)){
                    $msg_error = "l'extention de l'image n'est pas valide";
                    $this->render($path, [
                        'title' => 'Dashboard',
                        'first_title' => 'Dashboard administrateur',
                        'name' => 'dashboard',
                        'msg_error' => $msg_error
                    ], 'dashboard',$files);
                } else {
                    $newQuery = new ProductManager;
                    
                    move_uploaded_file($tmpName, 'assets/images/produits/'. $image_product);
                    
                    $image_product = "/assets/images/produits/" . $image_product;

                    $newQuery->update($product_id, $product_name, $image_product, $description);
                    
                    $this->redirect('/dashboard/produits');
                }
            } else {
                $msg_error = "Vueillez remplir tous les champs";

                $this->render($path, [
                    'title' => 'Dashboard',
                    'first_title' => 'Dashboard administrateur',
                    'name' => 'dashboard',
                    'msg_error' => $msg_error
                ], 'dashboard',$files);
            }
        }

        $this->render($path, [
            'title' => 'Dashboard',
            'first_title' => 'Dashboard administrateur',
            'name' => 'dashboard',
        ], 'dashboard',$files);
    }

    public function deleteProduct(int $product_id)
    {
        $newQuery = new ProductManager;
        $newQuery->delete($product_id);

        $this->redirect('/dashboard/produits');
    }
}