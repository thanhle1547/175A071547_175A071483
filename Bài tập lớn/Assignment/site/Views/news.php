<div class="news">
    <div class="container">
        <h1 class="news-title">
            Tin Tức
        </h1>
        <div class="news-body row">
            <?php foreach ($posts as $post) : ?>
                <div class="card">
                    <div class="card-top-img">
                        <img src="data:image/jpg;base64, <?= base64_encode($post->HinhAnh); ?>">
                    </div>
                    <div class="card-body">
                        <a href="../site/news/detail/<?= $post->MaBai ?>" class="card-title">
                            <?= $post->TieuDe; ?>
                        </a>
                        <p class=" card-text">
                            <?= $post->TomTat; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>