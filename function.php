<?php
function addItemtoCart(int $IdProduct):array {

    var_dump($_COOKIE);

    $cart = unserialize($_COOKIE['cart']);
     /* si il existe , je unserialize le cookie */
    var_dump($cart);

    if (array_key_exists($IdProduct,$cart)) {
        $cart[$IdProduct] = $cart[$IdProduct] +1;
    } else {
        $cart[$IdProduct]= 1;
    }
    $cart['nbItems']=$cart['nbItems'] + 1;
    /* je reserialize le string  et je crée le cookie */
    setcookie('cart',serialize($cart));

    return $cart;
}


