<?= $header ?>
<body>
<?= $banner ?>

    <div class="container my-5">
        <a href="crear" class="btn btn-success mb-5" >Crear Personaje</a>
        <a href="relacion" class="btn btn-info mb-5" >Crear Relación</a>
        <div class="row">
            <div class="col-md-12">

            <div class="row row-cols-1 row-cols-md-3">

    
        <?php foreach($personajes as $personaje){ ?>
                <div class="col mb-4">
                    <div class="card">
                    <img src="<?php echo $personaje['foto'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo strtoupper($personaje['nombre']) ?></h5>
                        <p class="card-text">
                            <a href="editar?id=<?php echo $personaje['id_personaje'] ?>" class="btn btn-info" >Editar</a>
                            <a href="detalles?id=<?php echo $personaje['id_personaje'] ?>" class="btn btn-warning" >Detalles</a>
                            <a href="api/eliminar?id=<?php echo $personaje['id_personaje'] ?>" class="btn btn-danger" >Eliminar</a>
                        </p>
                    </div>
                    </div>
                </div>
        <?php } ?>

            </div>

            </div>
        </div>
    </div>
   
<?= $footer ?>
</body>
</html>