<div class="container">
    <div class="news-detail">
        <h2 class="title">
            <?= $post->TieuDe; ?>
        </h2>
        <p class="summary">
            <?= $post->TomTat; ?>
        </p>
        <img src="data:image/jpg;base64, <?= base64_encode($post->HinhAnh); ?>">
        <p class="content">
            <?= $post->NoiDung; ?>
        </p>
    </div>
</div>