<?php

    $routes = [
        "get" => [
            [
                "pattern" => "/",
                "controller" => "ProductsController",
                "action" => "index"
            ],
            [
                "pattern" => "/products/new",
                "controller" => "ProductsController",
                "action" => "_new"
            ],
            [
                "pattern" => "/products/:id",
                "controller" => "ProductsController",
                "action" => "show"
            ],
            [
                "pattern" => "/products/edit/:id",
                "controller" => "ProductsController",
                "action" => "edit"
            ],
            [
                "pattern" => "/products/delete/:id",
                "controller" => "ProductsController",
                "action" => "delete"
            ]
        ],
        "post" => [
            [
                "pattern" => "/products/create",
                "controller" => "ProductsController",
                "action" => "create"
            ],
            [
                "pattern" => "/products/update",
                "controller" => "ProductsController",
                "action" => "update"
            ]
        ]
    ];

?>