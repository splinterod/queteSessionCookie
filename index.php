

<!-- Creation of cookie -->
<?php
require_once ('function.php');

if (!isset($_COOKIE['cart'])) {
    setcookie('cart',serialize(['nbItems' => '0']));
}

?>

 <!--Creation of $_SESSION var : nomuser -->
<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user']="";
}



/* insert info from add to cart to cookies */
if(!empty($_GET)){

    var_dump($_SESSION);

    if ($_SESSION['user']==""){ ?>
        <script type="text/javascript">
          var okAlert =  alert('You must be connect to buy cOOkies');
          window.location.replace("http://localhost:8000/login.php");
        </script>
        <?php
    } else {

    echo $_GET['add_to_cart'] ;
    $cart = addItemtoCart($_GET['add_to_cart']) ;
    header('location:/index.php');
    }
}

?>

<!-- insert of head and data products -->
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>


<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
