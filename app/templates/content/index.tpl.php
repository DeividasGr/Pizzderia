<main>
    <section class="pizza">
        <div class="container">
            <h1 class="header"><?php print $data['title']; ?></h1>
            <div class="pizza-list">
                <?php foreach ($data['products'] as $card): ?>
                    <?php print $card;  ?>
                <?php endforeach; ?>
            </div>
            <?php if (!isset($_SESSION['email'])): ?>
                <form action="/login">
                    <button class="btn">Login</button>
                </form>
            <?php endif; ?>
        </div>
    </section>
</main>


