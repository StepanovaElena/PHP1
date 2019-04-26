    <!-- Вывод информации о товаре -->
    <div class="container slider-photo">
    <img src="../img/product_img/<?=$params['image']?>" alt="product">
    </div>

    <div class="container description-block">
        <section class="prod-description">
            <div class="gray-line"><div class="pink-line"></div></div>
            <h2><?=$params['name']?></h2>
            <p><?=$params['discription']?></p>
            <div class="prod-point">
                <p>MATERIAL: <span><?=$params['material']?></span></p>
                <p>DESIGNER: <span><?=$params['designer']?></span></p>
            </div>
            <span>$<?=$params['price']?></span>
            <a class="cart-buttom" href="/single_page/add/<?=$params['id']?>">Add to Cart</a>
            <?=$status?>
        </section>
    </div>

    <!-- Форма добавления отзыва о товаре -->
    <div class="feedback-form">
        <h4>Here you can leave your feedback!</h4>
        <form class = "feedback-form-fields" action="" method="post">
            <input name="id" value="<?=$itemID?>" type="hidden">
            <p>Your name:</p>
            <input name="name" type="text" required>
            <p>Feedback:</p>
            <textarea name="text" required></textarea>
            <input name="submit" value="Send" type="submit">
        </form>

        <!-- Вывод ошибок загрузки -->
        <?php if (!empty($error)): ?>
            <p class='upload_form_error'> <?= $error ?></p>
        <?php endif; ?>
    </div>

    <!-- Вывод всех отзывов о конктретном товаре -->
    <div class="feedback-block">
        <h3>Feedbacks</h3>
        <?if (is_array($fb)):?>
        <?foreach ($fb as $feedback):?>
        <div class = "feedback">
            <span><?= $feedback["name"]?></span>
            <p><?=$feedback["feedback"]?></p>
        </div>
       <?endforeach?>
        <?else:?>
        <p><?=$fb?></p>
        <?endif;?>
    </div>
