<div class="container table-position">
    <table class="table">

        <thead class="table-header">
        <tr>
            <th scope="col">Product Details</th>
            <th scope="col">unite Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">shipping</th>
            <th scope="col">Subtotal</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>

        <tbody id="cart">
        <?if (is_array($params)):?>
            <? foreach ($params as $item):?>

                <tr class="table-row">
                    <th scope="row">
                        <a class="row-a" href="#">
                            <img src="../img/product_img/<?=$item['image']?>" alt="product<?=$item['id']?>">
                            <h4><?=$item['name']?></h4>
                            <p>Color:<span><?=$item['color']?></span></p>
                            <p class="row-p" >Size:<span><?=$item['size']?></span></p>
                        </a>
                    </th>
                    <td>$<?=$item['price']?></td>
                    <td><input type="number" value="<?=$item['quantity']?>" placeholder="1" min="1" step="1"></td>
                    <td>FREE</td>
                    <td>$<?=$item['subtotal']?></td>
                    <td><a class="delate-item" href="/cart/item_delete/<?=$item['id']?>">X</a></td>
                </tr>

            <?endforeach;?>
        <?endif;?>

        </tbody>

    </table>
    <div><?=$msg?></div>
    <footer class="cart-footer">
        <div class="cart-button">
            <a href="/cart/clear">CLEAR SHOPPING CART</a>
            <a href="/products/">CONTINUE SHOPPING</a>
        </div>

        <form id="review-form" action="/cart/checkout" method="post">
            <select class="country" name="Country">
                <option value="Country">Select Country...</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="USA">USA</option>
            </select>
            <input class="country" type="text" name="telephone" placeholder="+7 (111) 111-11-11" required>

        <div class="cart-form">
            <div class="cart-total" id="cart-total">
                <h5>Sub Total</h5>
                <h4>GRAND TOTAL</h4>
                <a href="/cart/checkout"><button class="proceed-button">proceed to checkout</button></a>

            </div>
        </div>
        </form>
    </footer>

</div>

