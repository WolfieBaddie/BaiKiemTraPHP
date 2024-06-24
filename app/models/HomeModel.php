<?php 
class HomeModel {
    private $__conn;
    public function __construct($conn) {
        $this->__conn = $conn;
    }


    public function additems($item_code, $item_name, $quantity, $expired_date, $note) {
        try {
            if(isset($this->__conn)) {
                $sql = "insert into item_sale (item_code, item_name, quantity, expired_date, note) values (:item_code, :item_name, :quantity, :expired_date, :note)";
                $expired_date = date("Y-m-d", strtotime($expired_date));
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("item_code", $item_code, PDO::PARAM_STR);
                $stmt->bindParam("item_name", $item_name, PDO::PARAM_STR);
                $stmt->bindParam("quantity", $quantity, PDO::PARAM_STR);
                $stmt->bindParam("expired_date", $expired_date, PDO::PARAM_STR);
                $stmt->bindParam("note", $note, PDO::PARAM_STR);
                $stmt->execute();
                var_dump($sql);
                var_dump($stmt);
            } else {
                echo "not connection";
                die();
            }
        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
        return null;
        header("Location: http://localhost/BaiKiemTra/home/index");
    }

    public function getItems()
    {
        try {
            if(isset($this->__conn)) {
                $sql = "select * from item_sale";
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                echo "not connection";
                die();
            }
        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
        return null;   
    }

    public function getItemsById($id)
    {
        try {
            if(isset($this->__conn)) {
                $sql = "select * from item_sale where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt -> bindParam(":id", $id, PDO::PARAM_STR);
                var_dump($id);
                $stmt -> execute();
                return $stmt -> fetch(PDO::FETCH_ASSOC);
                
            } else {
                echo "not connection";
                die();
            }
        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
        return null; 
    }

    public function edititems($item_code, $item_name, $quantity, $expired_date, $note, $id)
    {
        try {
            if(isset($this->__conn)) {
                $sql = "update item_sale set item_code = :item_code, item_name = :item_name, quantity = :quantity, expired_date = :expired_date, note = :note where id = :id";
                $expired_date = date("Y-m-d", strtotime($expired_date));
                $stmt = $this->__conn->prepare($sql);
                $stmt -> bindParam(":id", $id, PDO::PARAM_STR);
                $stmt->bindParam(":item_code", $item_code, PDO::PARAM_STR);
                $stmt->bindParam(":item_name", $item_name, PDO::PARAM_STR);
                $stmt->bindParam(":quantity", $quantity, PDO::PARAM_STR);
                $stmt->bindParam(":expired_date", $expired_date, PDO::PARAM_STR);
                $stmt->bindParam(":note", $note, PDO::PARAM_STR);
                $stmt->execute();
                var_dump($sql);
                header("Localtion: http://localhost/BaiKiemTra/home/index");
            } else {
                echo "not connection";
                die();
            }
        } catch (PDOException $e) {
            echo "". $e->getMessage();
        }
        return null;
        header("Location: http://localhost/BaiKiemTra/home/index");
    }

    public function deleteitems($id)
    {
        try
        {
            $sql = "delete from item_sale where id = :id";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();   
        }catch(PDOException $e)
        {
            echo "". $e->getMessage();
        }
    }
}




?>