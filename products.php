<div class="product-list flex flex-wrap items-center">
    <?php
    $q = $db->query("SELECT * FROM products") or die($db->error);
    while($d = $q->fetch_assoc()) {
        ?>
        <div class="product">
            <div>
                <div class="img"><img src="./images/<?=$d['image']?>"></div>
                <p class="name"><?=$d['product_name']?></p>
                <p class="price">UGX <?=number_format($d['price'])?></p>
                <a href="./?ref=<?=$ref?>&addToCart&productId=<?=$d['id']?>" data-id="<?=$d['id']?>" type="button">buy now</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>