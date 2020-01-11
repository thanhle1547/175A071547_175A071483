<div class="background"></div>
<div class="login-form">
    <h1 class="brand">TLU</h1>
    <h2 class="title">Tài khoản</h2>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" name="username" required>
            <label for="username">Username</label></div>
        <div class="form-group">
            <input type="password" name="password" required>
            <label for="password">Password</label></div>
        <?php if (isset($message) && $message !== '') : ?>
            <div class="alert alert-warning" role="alert">
                <?= $message; ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <button class="btn btn-rounded-corner btn-primary btn-inactive btn-login">Đăng nhập</button>
        </div>
    </form>
</div>
<script>
    $('.btn-login').click(function() {
        $.post(
            "account/login", 
            {
                username: $('input[name="username"]').val(),
                password: $('input[name="password"]').val()
            },
            function(data) {
                if (data)
                    alert(data);
            }
        );
    });
</script>
</body>

</html>