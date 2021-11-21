<?php setlocale(LC_TIME, "esp"); ?>
<div class="container">
    <div class="col-md-6 offset-md-3">
    <form action="user/add" method="post">
        <div class="form-group row">
            <label for="user" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="user" id="user" required>
            </div>
        </div>
        <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="name" id="name" required>
            </div>
        </div>
        <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control form-control-sm" name="password" id="password" required>
            </div>
        </div>
        <button class="btn btn-primary">Agregar</button>
    </form>
    </div>
    <br>
    <?php foreach($users as $item): ?>
        <div class="card bg-light mb-3">
            <div class="card-body">
                <strong>Usuario: </strong><small><?= $item['login']; ?></small>
                <br><small>Nombre: <?= $item['name']; ?></small>
                <br><small>Contraseña: <?= $item['password']; ?></small>
                <div class="float-right">
                    <a href="user/edit/<?=$item['id']?>" class="btn btn-primary" role="button">Editar</a>
                    <a href="user/delete/<?=$item['id']?>" class="btn btn-danger" role="button">Borrar</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>