<?php
class Admin extends Controller
{
    private $domain = DOMAIN;
    public function __construct()
    {

        if ($_SESSION['user']['isAdmin'] == 0) {
            header("Location: $this->domain");
        }
    }

    public function index()
    {
        $data['props']['products'] = '';
        $data['content'] = 'page/admin/index';
        $this->render('layout/adminlayout', $data);
    }

    public function products()
    {
        $this->homeModel = $this->model('Product');
        $products = $this->homeModel->getFullProducts();

        $data['props']['products'] = $products;
        $data['content'] = 'page/admin/products';
        $this->render('layout/adminlayout', $data);
    }

    public function addProduct()
    {
        $this->homeModel = $this->model('Product');
        $categories = $this->homeModel->getFullCategories();

        $data['props']['categories'] = $categories;
        $data['content'] = 'page/admin/addProduct';
        $this->render('layout/adminlayout', $data);
    }

    public function handleAddProduct()
    {
        $request = new Request();
        $data = ($request->getFields());

        $avatar = $data['files']['avatar'];
        $save_file = $this->upLoatFile($avatar);

        array_pop($data);
        $data['image'] = $save_file;

        $this->homeModel = $this->model('Product');
        $this->homeModel->addProduct($data);
        header("Location: $this->domain/admin/products");
    }

    public function update_product()
    {
        $this->homeModel = $this->model('Product');
        $product = $this->homeModel->getProductById($_GET['id']);

        $categories = $this->homeModel->getFullCategories();
        $category = $this->homeModel->getCategoryById($product['typeId'])['name'];

        $data['props']['category'] = $category;
        $data['props']['categories'] = $categories;
        $data['props']['product'] = $product;
        $data['content'] = 'page/admin/updateProduct';
        $this->render('layout/adminlayout', $data);
    }

    public function handleUpdateProduct()
    {
        $request = new Request();
        $data = ($request->getFields());
        $avatar = $data['files']['avatar'];
        $data['image'] = $data['avatar'];

        $save_file = $this->upLoatFile($avatar);
        if (!empty($save_file)) {
            $data['image']  = $save_file;
        }

        $this->homeModel = $this->model('Product');
        $this->homeModel->updateProduct($data);
        header("Location: $this->domain/admin/products");
    }

    public function delete_product()
    {
        $this->homeModel = $this->model('Product');
        $this->homeModel->deleteProduct($_GET['id']);
        header("Location: $this->domain/admin/products");
    }

    // CAEGORY
    public function categories()
    {
        $this->homeModel = $this->model('Product');
        $categories = $this->homeModel->getFullCategories();

        $data['props']['categories'] = $categories;
        $data['content'] = 'page/admin/category';
        $this->render('layout/adminlayout', $data);
    }

    public function addCategory()
    {
        $data['props'] = [];
        $data['content'] = 'page/admin/addCategory';
        $this->render('layout/adminlayout', $data);
    }

    public function handleAddCategory()
    {
        $request = new Request();
        $data = ($request->getFields());

        var_dump($data);
        $this->homeModel = $this->model('Product');
        $this->homeModel->addCategory($data);
        header("Location: $this->domain/admin/categories");
    }

    public function update_category() {
        $this->homeModel = $this->model('Product');
        $category = $this->homeModel->getCategoryById($_GET['id']);

        $data['props']['category'] = $category;
        $data['content'] = 'page/admin/updateCategory';
        $this->render('layout/adminlayout', $data);
    }

    public function handleUpdateCategory() {
        $request = new Request();
        $data = ($request->getFields());

        $this->homeModel = $this->model('Product');
        $this->homeModel->updateCategory($data);
        header("Location: $this->domain/admin/categories");
    }

    public function delete_category() {
        $this->homeModel = $this->model('Product');
        $this->homeModel->deleteCategory($_GET['id']);
        header("Location: $this->domain/admin/categories");
    }
}
