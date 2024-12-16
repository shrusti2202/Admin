<?php
if (isset($_SESSION['aid'])) {
} else {
    echo "<script>
    window.location='login';
    </script>";
}
include_once('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <a class="btn btn-success" href="add_product">Add Product</a>
    <h2 align='center'>Product Image</h2>

    <?php
    if (!empty($product)) {
        foreach ($product as $w) {

    ?>


            <div class="container mt-3 d-flex">
                <div class="card  " style="width:400px">
                    <div class="card-body">
                        <h4 class="card-title">Name : <?php echo $w->name; ?></h4>
                        <p class="card-text">Description : <?php echo $w->description; ?></p>
                        <a href="" class="btn btn-primary">Price : <?php echo $w->price; ?></a>
                        <a href="edit_product?epro=<?php echo $w->id; ?>" class="btn btn-success">Edit</a>
                        <a href="delete?dproduct=<?php echo $w->id; ?>" class="btn btn-danger">Delete</a>
                        <br><br>
                    <img class="card-img-top" src="upload/product/<?php echo $w->img; ?>" width="50px">

                    </div>
                </div>
                <br>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>