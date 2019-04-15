
<h1>Gallery</h1>

<div class="gallery">
    <? foreach ($links as $link):?>
    <a href="<?= $pathbig?><?= $link ?>" target="_blank"><img src="<?= $pathsmall?><?= $link ?>" alt = "<?= $link ?>"></a>
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