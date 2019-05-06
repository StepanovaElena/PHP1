<a class="back-arrow" href="/admin/">
    <img src="/img/icons/left-arrow.png" alt="Back arrow">
    <span>Back to Admin page</span>
</a>

<h3>Offers</h3>

<?foreach ($category as $item):?>
    <p><?=$item['category']?>: -<span data-id="<?=$item['id']?>"><?=$item['discount']?></span>%</p>
<?endforeach?>

<h3 class="feedback-admin-title">Changing offers</h3>
<form action="" method="post">
    <div class="offers-select-title">
        <div>
            <h4>CHOOSE CATEGORY</h4>
        </div>
        <div>
            <h4>INPUT DISCOUNT</h4>
        </div>
    </div>
    <div class="offers-select-block">
        <select id="category" name="category">
            <?foreach ($category as $item):?>
                <option data-id="<?=$item['id']?>" value="<?=$item['id']?>"><?=$item['category']?></option>
            <?endforeach?>
        </select>

        <input class="input-discount" type="number" name="discount">

    </div>
    <a class="offers-change-button" href="#">Change offer</a>
</form>

<script>
    (function($) {
        $(function () {
            $('form').on ('click', '.offers-change-button', function(){
                var id = $('#category option:selected').attr("data-id");
                var discount = $('.input-discount').val();

                $.ajax({
                    url: "/changeOffer/",
                    type: "POST",
                    dataType : "json",
                    data:{
                        id: id,
                        discount: discount
                    },
                    error: function() {alert("Something went wrong ...");},
                    success: function(answer){
                        $('span[data-id="' + answer.id + '"]').text(answer.discount);
                    }
                })
            });
        });
    })(jQuery);
</script>