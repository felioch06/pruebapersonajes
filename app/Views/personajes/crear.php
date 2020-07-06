<?= $header ?>
<body>
<?= $banner ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">

                <form action="api/guardar" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="">Edad</label>
                        <input type="number" class="form-control" name="edad" required>
                    </div>

                    <div class="form-group">
                        <label for="">Biografia</label>
                        <textarea cols="30" rows="3" class="form-control" name="biografia" required></textarea>
                    </div>

                    <div class="form-group">
                    <label for="">Categoria</label>

                        <div class="input-group mb-3">
                            <select name="fk_categoria" class="custom-select" required >
                                <option value="" disabled selected >Seleccionar</option>
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
                                <input type="file" class="custom-file-input" name="foto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                                <label class="custom-file-label" for="inputGroupFile01">Elegir Archivo</label>
                            </div>
                        </div>
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary">Crear Personaje</button>
                </form>

            </div>
        </div>
    </div>
   
<?= $footer ?>
</body>
</html>