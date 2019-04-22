
<h1>Gallery</h1>

<div class="gallery">
    <? foreach ($gallery as $image):?>
    <div class="picture-container">
        <a id = "<?= $image['id']?>" href="/image_page/?id=<?=$image['id']?>"><img src="../img/img_small/<?= $image['name']?>" alt = "<?= $image['name'] ?>"></a>
        <div class="views gallery-views">
            <img class = "eye" src="../img/icons/eye.png" alt="">
            <span><?=$image['views']?></span>
        </div>

    </div>
    <?endforeach?>
</div>

<div class="upload-form">
    <p>Upload your pictures to the gallery!</p>
    <form method="post" enctype="multipart/form-data">
        <input id="files" type="file" name="userfile">
        <input id="submit" type="submit" value="Load" name="submit">
    </form>

    <!-- Вывод ошибок загрузки -->
    <?php if (!empty($error)): ?>
        <p class='upload_form_error'> <?= $error ?></p>
    <?php endif; ?>

</div>