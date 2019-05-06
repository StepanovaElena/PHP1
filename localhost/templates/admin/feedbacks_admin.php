<a class="back-arrow" href="/admin/">
    <img src="/img/icons/left-arrow.png" alt="Back arrow">
    <span>Back to Admin page</span>
</a>

<h3 class="feedback-admin-title">ALL feedbacks with "NEW" status</h3>

<div class="feedback-admin">
    <?if (!empty($feedback)):?>
        <? foreach ($feedback as $item): ?>
            <div class="feedback-block-admin">
                <div>
                    <p>User name: <?= $item['name']?></p>
                    <p>Item ID:
                        <a class="feedback-admin-product-info" href="/single_page/<?=$item['product_id']?>">
                            <span><?=$item['product_id']?></span>
                            <img src="/img/icons/inf_black.png" alt="information">
                        </a>
                    </p>
                    <p><?=$item['date']?></p>
                    <p><?= $item['feedback'] ?></p>
                </div>
                <div>
                    <a href="/admin/confirm/<?=$item['id']?>"><img src="/img/icons/checked.png" alt="checked"></a>
                    <a href="/admin/delete/<?=$item['id']?>"><img src="/img/icons/cancel.png" alt="canceled"></a>
                </div>

            </div>
        <? endforeach; ?>
    <?else:?>
        <p>There are no new feedbacks!</p>
    <?endif;?>
</div>
