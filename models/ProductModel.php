<?php

    class ProductModel {
        private static $_table = "products";
        
        public static function findAll () {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$table}";

            $products = $conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $products;
        }

        public static function find ($id) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$table} WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $product = $stmt->fetch(PDO::FETCH_OBJ);
            $conn = null;
            return $product;
        }

        public static function create ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "INSERT INTO {$table} (
                product_name,
                price
            ) VALUES (
                :product_name,
                :price
            )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":product_name", $package["product_name"], PDO::PARAM_STR);
            $stmt->bindParam(":price", $package["price"], PDO::PARAM_STR);

            $stmt->execute();
            $conn = null;
        }

        public static function update ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "UPDATE {$table} SET
                product_name = :product_name,
                price = :price
            WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $package['id'], PDO::PARAM_INT);
            $stmt->bindParam(":product_name", $package['product_name'], PDO::PARAM_STR);
            $stmt->bindParam(":price", $package['price'], PDO::PARAM_STR);
            
            $stmt->execute();
            $conn = null;
        }

        public static function delete ($id) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "DELETE FROM {$table} WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
            $conn = null;
        }
    }

?>