<?php

    require_once("./models/ProductModel.php");

    function index () {
        $products = ProductModel::findAll();

        render("products/index", [
            "products" => $products,
            "title" => "Products"
        ]);
    }

    function _new () {
        render("products/new", [
            "title" => "New Product",
            "action" => "create"
        ]);
    }

    function edit ($request) {
        if (!isset($request["params"]["id"])) {
            return redirect("", ["errors" => "Missing required ID parameter"]);
        }

        $product = ProductModel::find($request["params"]["id"]);
        if (!$product) {
            return redirect("", ["errors" => "Product does not exist"]);
        }

        render("products/edit", [
            "title" => "Edit Product",
            "product" => $product,
            "edit_mode" => true,
            "action" => "update"
        ]);
    }

    function create () {
        validate($_POST, "products/new");
        
        ProductModel::create($_POST);

        redirect("", ["success" => "Product was created successfully"]);
    }

    function update () {
        if (!isset($_POST['id'])) {
            return redirect("products", ["errors" => "Missing required ID parameter"]);
        }

        validate($_POST, "products/edit/{$_POST['id']}");

        ProductModel::update($_POST);
        redirect("", ["success" => "Product was updated successfully"]);
    }

    function delete ($request) {
        if (!isset($request["params"]["id"])) {
            return redirect("products", ["errors" => "Missing required ID parameter"]);
        }

        ProductModel::delete($request["params"]["id"]);

        redirect("", ["success" => "Product was deleted successfully"]);
    }

    function validate ($package, $error_redirect_path) {
        $fields = ["product_name", "price"];
        $errors = [];

        // No empty fields
        foreach ($fields as $field) {
            if (empty($package[$field])) {
                $humanize = ucwords(str_replace("_", " ", $field));
                $errors[] = "{$humanize} cannot be empty";
            }
        }

        // Product Name
        // ...

        // Price can not be negative or zero
        if ($package["price"] <= 0) {
            $errors[]= "Price must be greater then 0.00";
        }

        if (count($errors)) {
            return redirect($error_redirect_path, ["form_fields" => $package, "errors" => $errors]);
        }
    }

?>