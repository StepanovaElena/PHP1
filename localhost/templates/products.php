
<div class="general-product-block man-product-block" data-gender-type="man">
    <? foreach ($products as $item):?>
    <div class="product-block">
        <?if($item['discount'] != 0):?>
        <div class="discount"><span>-<?=$item['discount']?>%</span></div>
        <?endif;?>
        <a class="product-link" href="/single_page/<?=$item['id']?>">
            <img src="/img/product_img/<?=$item['image']?>" alt="<?=$item['name']?>">
            <div class="product-text">
                <h4><?=$item['name']?></h4>
                <?if(isset($item['discount-price'])):?>
                <div class="price-block">
                    <p class="old-price">$<?=$item['price']?></p>
                    <p class="new-price">$<?=$item['discount-price']?></p>
                </div>
                <?else:?>
                    <p>$<?=$item['price']?></p>
                <?endif;?>
            </div>
        </a>
    </div>
    <?endforeach?>
</div>