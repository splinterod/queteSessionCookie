<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION["user"] = "";
}

if (isset($_POST)) {
    setcookie('cart',serialize(['nbItems' => '0']));
}


require 'inc/data/products.php';
require 'inc/head.php';
$cart = unserialize($_COOKIE['cart']);


?>

<div class="alert alert-success" role="alert">
    Your cart contains : <?php
    if (isset($cart['nbItems'])) {
        echo $cart['nbItems'];
    } else {
        echo 0;
    }; ?>  cOOkies
</div>

<section class="cookies container-fluid">
    <div class="row">
        <?php
        foreach ($catalog as $id => $cookie) {
            ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3><?= $cookie['name']; ?></h3>
                <p><?= $cookie['description']; ?></p>
                <div>Number of article: <?php
                    if (isset($cart[$id])) {
                        echo $cart[$id];
                    } else {
                        echo 0;
                    }; ?></div>
            </div>
        <?php } ?>
    </div>

    <div class="row mt-4">
        <form method="post" action="cart.php">
            <input hidden name="emptyCart" value="empty">
            <button type="submit" class="mt-4 ml-1  btn btn-primary btn-lg " name="btnEmptyCart" value="emptyCart">Empty Cart</button>
        </form>
    </div>


</section>




<?php require 'inc/foot.php'; ?>
