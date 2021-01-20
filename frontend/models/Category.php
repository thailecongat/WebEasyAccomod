<?php
require_once 'models/Model.php';

class Category extends Model
{
    /**
     * Lấy danh sách sản phẩm từ bảng categories
     */
    public function index() {
//        1 - chuẩn bị truy vấn
        $obj_select = $this
            ->connection
            ->prepare("SELECT * FROM categories");
//            Thực thi truy vấn
        $obj_select->execute();
//            Lấy dữ liệu thật
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    /**
     * Insert category
     * @param array $arr_param
     * @return mixed
     */
    public function insert($arr_param = []) {
        $obj_insert = $this
            ->connection
            ->prepare("INSERT INTO 
            categories(username,password, name, status, phone, email, address) 
            VALUES (:username, :password, :name, :status, :phone, :email, :address)");
        $is_insert = $obj_insert->execute($arr_param);
        return $is_insert;
    }

    /**
     * Get category by id
     * @param $id
     * @return mixed
     */
    public function getCategoryById($id) {
        $obj_select = $this->connection->prepare("SELECT `id`, `username`, `name`, `status`, `created_at`, `updated_at`, `phone`, `email`, `address` FROM categories WHERE id = :id");

        $obj_select->bindParam(':id', $id);
        $obj_select->execute();

        $category = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $category[0];
    }

    /**
     * Update category
     * @param array $arr_param
     * @return mixed
     */
    public function update($arr_param = []) {
        $obj_update = $this->connection->prepare("UPDATE categories SET name=:name,
                                    
        
                                     phone =:phone,
                                      email=:email, 
                                      address=:address, 
                                      updated_at=:updated_at WHERE id=:id");
        $is_update = $obj_update->execute($arr_param);

        return $is_update;
    }

    /**
     * Xóa category theo id
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        $obj_delete = $this->connection->prepare("DELETE FROM categories WHERE id=:id");
        $obj_delete->bindParam(':id', $id);
        $is_delete = $obj_delete->execute();

        return $is_delete;
    }

    public function login($arr_param){
        $obj_login = $this->connection->prepare("SELECT * FROM categories WHERE username = :username AND password = :password");

//        $obj_select->bindParam();
        $obj_login->execute($arr_param);
        $category = $obj_login->fetchAll(PDO::FETCH_ASSOC);
        if($category!=[]){
        return $category[0];
        }
        else return [];
    }
}
