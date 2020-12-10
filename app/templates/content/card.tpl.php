<div>
    <img
            src="<?php print $data['image']; ?>"
            alt="<?php print $data['name']; ?>"
            class="pizza-img"
    >
    <div class="pizza-info">
        <h3 class="pizza-name"><?php print $data['name']; ?></h3>
        <p class="pizza-price">$ <?php print $data['price']; ?></p>
    </div>
    <?php if (isset($_SESSION['role'])): ?>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <div>
               <?php print $data['edit']->render(); ?>
               <?php print $data['delete']->render(); ?>
            </div>

        <?php elseif ($_SESSION['role'] === 'user'): ?>
            <div>
                <?php print $data['order']->render(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

