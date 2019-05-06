<h2>Personal account</h2>

<table class="table table-admin">

    <thead class="table-header-account">
    <tr>
        <th scope="col">Order number</th>
        <th scope="col">Date</th>
        <th scope="col">Total</th>
        <th scope="col">Delivery</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
</table>

<?if (is_array($orders)):?>
    <? foreach ($orders as $item):?>
        <details class="details-block">
            <summary>
                <div class="table-row-account">
                    <div>
                        <h4><?=$item['order_number']?></h4>
                    </div>
                    <div><?=$item['date']?></div>
                    <div>$<?=$item['total']?></div>
                    <div><?=$item['delivery']?></div>
                    <div><?=$item['status']?></div>
                </div>
            </summary>
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

                    <? foreach ($item['positions'] as $val):?>

                        <tr class="table-row-admin">
                            <th scope="row">
                                <a href="/single_page/<?=$val['product_id']?>">
                                    <h4><?=$val['name']?></h4>
                                </a>

                            </th>
                            <td><?=$val['size']?></td>
                            <td>$<?=$val['price']?></td>
                            <td>-<?=$val['discount']?>%</td>
                            <td><?=$val['quantity']?></td>
                            <td>$<?=$val['subtotal']?></td>
                        </tr>

                    <?endforeach;?>

                </tbody>

            </table>

        </details>
    <?endforeach;?>
<?endif;?>








