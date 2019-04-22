
<div class="general-product-block man-product-block" data-gender-type="man">
    <? foreach ($products as $item):?>
    <div class="product-block">
        <a class="product-link" href="/single_page/?id=<?=$item['id']?>">
            <img src="../img/product_img/<?=$item['image']?>" alt="<?=$item['name']?>">
            <div class="product-text">
                <h4><?=$item['name']?></h4>
                <p>$<?=$item['price']?></p>
            </div>
        </a>
    </div>
    <?endforeach?>
</div>