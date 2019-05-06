<a class="back-arrow" href="/orders_admin/">
    <img src="/img/icons/left-arrow.png" alt="Back arrow">
    <span>Back to Orders list</span>
</a>
<h4>Order number: <span><?=$order['order_number']?></span></h4>
<h4>Date: <span><?=$order['date']?></span></h4>
<p>User: <span><?=$order['user-login']?></span></p>

    <table class="table">

        <thead class="table-header">
        <tr>
            <th scope="col">Product name</th>
            <th scope="col">Size</th>
            <th scope="col">Unite Price</th>
            <th scope="col">Discount</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>

        <tbody id="cart">
        <?if (is_array($positions)):?>
            <? foreach ($positions as $item):?>

                <tr class="table-row-admin">
                    <th scope="row">
                        <h4><?=$item['name']?></h4>
                    </th>
                    <td><?=$item['size']?></td>
                    <td>$<?=$item['price']?></td>
                    <td>-<?=$item['discount']?>%</td>
                    <td><input type="number" value="<?=$item['quantity']?>" readonly></td>
                    <td>$<?=$item['subtotal']?></td>
                </tr>

            <?endforeach;?>
        <?endif;?>

        </tbody>

    </table>

<div class="order-total-info">
    <p>Delivery: <input id="delivery" type="text" value="<?=$order['delivery']?>"></p>
    <p>Subtotal price: <span>$<?=$order['total']?></span></p>
    <h3>Total price: <span>$<?=$order['total']?></span></h3>
</div>
<div class="user-info">
    User information:
    <h4>Telephone:
    <input id="telephone" type="telephone" value="<?=$order['telephone']?>">
</div>

<a id="change-info" class="offers-change-button" data-id="<?=$order['order_number']?>" href="#">Change order data</a>

<script>
    (function($) {
        $(function () {
            // Слушаем нажатия на изменение количества товара в корзине
            $('#change-info').on('click', function () {
                var id = $(this).attr('data-id');

                var dlv = $('#delivery').val();

                var tel = $('#telephone').val();


                    // Отправляем запрос на изменение количества
                    $.ajax({
                        url: "/changeOrder/",
                        type: "POST",
                        dataType : "json",
                        data:{
                            id: id,
                            dlv: dlv,
                            tel: tel
                        },
                        error: function() {alert("Something went wrong ...");},
                        success: function(answer){
                            $('#delivery').text(answer.dlv);
                            $('#telephone').text(answer.tel);
                        }

                    })

            });
        });
    })(jQuery);
</script>