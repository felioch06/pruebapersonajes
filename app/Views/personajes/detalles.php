<?= $header ?>

<body>
    <?= $banner ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Detalles de cada personaje -->
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php echo $personaje['foto'] ?>" width="100%" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title"><?php echo strtoupper($personaje['nombre']) ?></h1>
                                <p class="card-text">Edad: <?php echo $personaje['edad'] ?></p>
                                <p class="card-text">biografia: <?php echo $personaje['biografia'] ?></p>
                                <p class="card-text">Categoría: <?php echo $categoria[0]['nombre_categoria'] ?></p>
                                <p class="card-text">Relación con personajes: 
                                    <ul>
                                        <?php for($i=0;$i < count($relacion); $i++){ ?>
                                        <li><?php echo($relacion[$i]["nombre"])  ?></li>
                                        <?php } ?>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $footer ?>
</body>

</html>