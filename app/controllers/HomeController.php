<?php 
// controller
class HomeController extends BaseController {
    private $__homeModel;
    function __construct($conn)
    {
        $this->__homeModel = $this->initModel("HomeModel",$conn);
    }

    public function index()
    {
        $items = $this -> __homeModel -> getItems();
        $this -> view("layouts/client_layout",["content"=>"home", "items" => $items]);
    }

    public function additems()
    {
        var_dump($_POST);
        if(isset($_POST["submit"]))
        {
            $item_code = $_POST["item_code"];
            $item_name = $_POST["item_name"];
            $quantity = $_POST["quantity"];
            $expired_date = $_POST["expired_date"];
            $note = $_POST["note"];
            $this -> __homeModel -> additems($item_code, $item_name, $quantity, $expired_date, $note);
        }
    }

    public function edit()
    {
        $id = $_GET["id"];
        $items = $this -> __homeModel -> getItemsById($id);
        $this -> view("layouts/client_layout",["content" => "edit-form", "items" => $items]);
        var_dump($_POST);
      
    }

    public function update()
    {
        if(isset($_POST["submit"]))
        {
            $id = $_POST["id"];
            var_dump($id);
            var_dump($_POST);
            $item_code = $_POST["item_code"];
            $item_name = $_POST["item_name"];
            $quantity = $_POST["quantity"];
            $expired_date = $_POST["expired_date"];
            $note = $_POST["note"];
            $this -> __homeModel -> edititems($item_code, $item_name, $quantity, $expired_date, $note, $id);
        }
    }

    public function delete()
    {
        $id = $_GET["id"];
        $this -> __homeMode -> deleteitems($id);
    }
}

?>