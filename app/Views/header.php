<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
.container_drag {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 10px;
}

.box {
  border: 3px solid #666;
  background-color: #ddd;
  border-radius: .5em;
  padding: 10px;
  cursor: move;
}

.box.over {
  border: 3px dotted #666;
}

[draggable] {
  user-select: none;
}
    </style>
    <title>Imagenes</title>
</head>
<body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="#" class="nav-link disabled" tadindex="-1" aria-disabled="true">Imagenes MVC</a>
        </li>
        <?php if(isset(session()->user)){ ?>
        <li>
            <a href="#" class="nav-link disabled" tabindex="-1" aria-disabled="true"><?=session()->name?></a>
        </li>
        <li>
            <a href="<?php echo base_url().'/user/logout'?>" class="nav-link">Salir</a>
        </li>
        <?php } ?> 
    </ul>
