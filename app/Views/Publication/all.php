<?php setlocale(LC_TIME, "esp"); ?>
<div class="container">
    <?php 
        if(isset(session()->user)){
    ?>
    <form action="publication/add" method="post" enctype="multipart/form-data">
        <div class="form-group card">
        <div class="card-body">
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
        <button class="btn btn-primary">Subir</button>
        </div>
    </form>
    <br>
    <?php } ?>
    <div class="container_drag">
    <?php foreach($posts as $item): ?>
                <div draggable="true" class="box">
                <strong><?= $item['id'] ?></strong>
                <img src="<?php echo base_url('../images/'.$item['creado'].'/'.$item['nombre']);   ?>" alt="<?=$item['nombre']?>" width="200" height="150">

                <?php if(session()->user === $item['creado']){ ?>
                    <a href="publication/edit/<?=$item['id']?>" class="btn btn-sm btn-primary" role="button">Editar</a>
                    <a href="publication/delete/<?=$item['id']?>" class="btn btn-sm btn-danger" role="button">Borrar</a>
                <?php } ?>
            </div>
    <?php endforeach; ?>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', (event) => {

var dragSrcEl = null;

function handleDragStart(e) {
  
  dragSrcEl = this;

  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
}

function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault();
  }

  e.dataTransfer.dropEffect = 'move';
  
  return false;
}

function handleDragEnter(e) {
  this.classList.add('over');
}

function handleDragLeave(e) {
  this.classList.remove('over');
}

function handleDrop(e) {
  if (e.stopPropagation) {
    e.stopPropagation(); 
  }
  
  if (dragSrcEl != this) {
    dragSrcEl.innerHTML = this.innerHTML;
    this.innerHTML = e.dataTransfer.getData('text/html');
  }
  
  return false;
}

function handleDragEnd(e) {
  this.style.opacity = '1';
  
  items.forEach(function (item) {
    item.classList.remove('over');
  });
}


let items = document.querySelectorAll('.container_drag .box');
items.forEach(function(item) {
  item.addEventListener('dragstart', handleDragStart, false);
  item.addEventListener('dragenter', handleDragEnter, false);
  item.addEventListener('dragover', handleDragOver, false);
  item.addEventListener('dragleave', handleDragLeave, false);
  item.addEventListener('drop', handleDrop, false);
  item.addEventListener('dragend', handleDragEnd, false);
});
});
</script>