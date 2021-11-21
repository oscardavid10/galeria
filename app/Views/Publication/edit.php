<div class="container">
    <?php
        if(session()->user === $post['creado']){
    ?>
    <h2>Actualizar publicación</h2>
    <br>
    <form action="publication/edit" method="post" enctype="multipart/form-data">
        <div class="form-group card">
            <div class="card-body">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <img src="<?php echo base_url('../images/'.$post['creado'].'/'.$post['nombre']);   ?>" alt="<?=$post['nombre']?>" width="200" height="150">
            <br><br>
            <div class="row">
                <div class="col-5">
                    <label for="imagen">Selecciona la imagen nueva</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/png, image/jpeg" required>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="pic_title">Titulo para la imagen</label>
                    <input type="text" class="form-control" name="pic_title" id="pic_title" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>

    <br>
    <?php }else{ ?>
        <div class="alert alert-danger" role="alert">
            No tienes permiso.
        </div>
    <?php } ?>
</div>