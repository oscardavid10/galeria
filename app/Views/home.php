<div class="container">
    <?php if(isset(session()->login_error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?=session()->login_error?>
        </div>
    <?php } ?>
    <h2>Iniciar sesión</h2>
    <form action="user/login" method="post">
        <div class="form-group">
            <label for="login">Nombre de usuario</label>
            <input type="text" name="login" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>