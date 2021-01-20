<?php
require_once 'models/Model.php';

class Product extends Model
{
    public function delete($id) {
        //cbi truy vấn
        $obj_delete = $this->connection
            ->prepare("DELETE FROM products WHERE id=:id");
        //gắn giá trị cho tham số
        $arr_params = [
            ":id" => $id
        ];

        //thực thi truy vấn
        return $obj_delete->execute($arr_params);
    }


    public function insert($arr_params = [])
    {
        //1 - chuẩn bị câu truy vấn
        $obj_insert = $this
            ->connection
            ->prepare("INSERT INTO
products(user_id, product_address, price, dt, avatar, summary, qty, dh, nl, status)
VALUES(:user_id, :address, :price, :dt, :avatar, :summary, :qty, :dh, :nl, :status)
");
//        2 - thực thi bằng cách truyền tham số
        $is_insert = $obj_insert->execute($arr_params);

        return $is_insert;
    }

    public function index(){
        $obj_select = $this
            ->connection
//            ->prepare("SELECT * FROM products");
            ->prepare("SELECT products.*,
                    categories.name AS user_name, categories.phone AS user_phone
                    FROM products INNER JOIN categories 
                    ON products.user_id = categories.id");
//            Thực thi truy vấn
        $obj_select->execute();
//            Lấy dữ liệu thật
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getById($id) {
        //cbi kết nối
        $obj_select = $this
            ->connection
            ->prepare("SELECT * FROM products WHERE id = :id");
        //gắn params
        $arr_param = [
            ':id' => $id
        ];
        //thực thi
        $obj_select->execute($arr_param);
        //lấy ra dữ liệu từ việc execute
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        if($products == [])
            return [];
        else
        return $products[0];
    }

    public function getByCategoryId($id) {
        //cbi kết nối
        $obj_select = $this
            ->connection
            ->prepare("SELECT * FROM products WHERE user_id = :id");
        //gắn params
        $arr_param = [
            ':id' => $id
        ];
        //thực thi
        $obj_select->execute($arr_param);
        //lấy ra dữ liệu từ việc execute
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

         return $products;
    }

    public function update($arr_params) {
        //cbi truy vấn
        $obj_update = $this
            ->connection
            ->prepare("UPDATE products 
                SET user_id=:user_id, 
                product_address=:product_address, 
                price=:price,
                dt=:dt,
                avatar=:avatar,
                summary=:summary,
                qty=:qty,
                dh=:dh,
                nl=:nl,
                
               updated_at=:updated_at
                WHERE id=:id
");

        //truyền param và thực thi
        return $obj_update->execute($arr_params);
    }
}