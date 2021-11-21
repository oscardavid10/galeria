<div class="container">
    <h2>Actualizar Usuario</h2>
    <form action="user/edit" method="post">
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <div class="form-group row">
            <label for="user" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="user" id="user" value="<?=$user['login']?>" required>
            </div>
        </div>
        <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?=$user['name']?>" required>
            </div>
        </div>
        <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control form-control-sm" name="password" id="password" value="<?=$user['password']?>" required>
            </div>
        </div>

        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div>