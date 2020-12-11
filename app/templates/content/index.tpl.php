<main>
    <section class="pizza">
        <h1 class="header"><?php print $data['title']; ?></h1>
        <div class="pizza-list container">
            <?php foreach ($data['products'] as $product): ?>
                <div>
                    <img
                            src="<?php print $product['image']; ?>"
                            alt="<?php print $product['name']; ?>"
                            class="pizza-img"
                    >
                    <div class="pizza-info">
                        <h3 class="pizza-name"><?php print $product['name']; ?></h3>
                        <p class="pizza-price">$ <?php print $product['price']; ?></p>
                    </div>
                    <div class="btn-container">
                        <?php print $product['order']; ?>
                        <?php print $product['link']; ?>
                        <?php print $product['delete']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php print $data['redirect']; ?>
        </div>
    </section>
</main>


