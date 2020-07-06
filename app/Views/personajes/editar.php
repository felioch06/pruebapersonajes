<?= $header ?>
<body>
<?= $banner ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">

                <!-- formulario para editar cada personaje -->
                <form action="api/actualizar" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" value="<?php echo $personaje['id_personaje'] ?>" name="id" required>

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo $personaje['nombre'] ?>" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="">Edad</label>
                        <input type="number" class="form-control" value="<?php echo $personaje['edad'] ?>" name="edad" required>
                    </div>

                    <div class="form-group">
                        <label for="">Biografia</label>
                        <textarea name="biografia" cols="30" rows="3" class="form-control" required><?php echo $personaje['biografia'] ?></textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Categoria</label>

                        <div class="input-group mb-3">
                            <select name="fk_categoria" class="custom-select" id="inputGroupSelect01" required>
                                <option  value="<?php echo $categoriaActual[0]['id_categoria'] ?>" selected><?php echo $categoriaActual[0]['nombre_categoria'] ?> </option>
                            <?php foreach($categorias as $categoria){ ?>
                                <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nombre_categoria'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="">Foto</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Elegir Archivo</label>
                            </div>
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