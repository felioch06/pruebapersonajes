<?= $header ?>
<body>
<?= $banner ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">

                <form action="api/relacion" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label for="">Personaje Principal</label>

                        <div class="input-group mb-3">
                            <select name="fk_personaje_1" class="custom-select" id="inputGroupSelect01" required>
                                <option  value="" disabled selected>Seleccionar</option>
                            <?php foreach($personajes as $personaje){ ?>
                                <option value="<?php echo $personaje['id_personaje'] ?>"><?php echo $personaje['nombre'] ?></option>
                            <?php } ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                    <label for="">Relacionado con</label>

                        <div class="input-group mb-3">
                            <select name="fk_personaje_2" class="custom-select" id="inputGroupSelect01" required>
                            <option  value="" disabled selected>Seleccionar</option>
                            <?php foreach($personajes as $personaje){ ?>
                                <option value="<?php echo $personaje['id_personaje'] ?>"><?php echo $personaje['nombre'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>

            </div>
        </div>
    </div>
   
<?= $footer ?>
</body>
</html>