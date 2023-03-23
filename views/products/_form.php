<?php
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($product)) $form_fields = (array) $product;
?>

<form action="<?= ROOT_PATH ?>/products/<?= $action ?>" method="post">
    <?php if ($action === "update"): ?>
        <input type="hidden" name="id" value="<?= $form_fields["id"] ?>">
    <?php endif ?>

    <!-- ... -->
    <div class="form-group my-3">
        <label for="product_name">Product Name</label>
        <input class="form-control" type="text" name="product_name" value="<?= $form_fields["product_name"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="price">Price</label>
        <input class="form-control" type="text" name="price" value="<?= $form_fields["price"] ?? "" ?>">
    </div>

    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
</form>