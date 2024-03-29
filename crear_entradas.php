<?php require_once 'includes/redireccion.php'; ?>

<?php require_once 'includes/cabecera.php'; ?>    
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
       <div id="principal">
           <h1>Crear Entradas</h1>
           
           <p> Añade nuevas entradas al blog para que los ususrios puedas leerlas
               y disfrutar de nuestro contenido.</p>
           <br>
           <form action="guardar_entrada.php" method="POST">
                   <label for="titulo">Titulo</label>
                   <input type="text" name="titulo" />
                   <?php echo ($_SESSION['errores_entrada']) ?  mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
                   
                   <label for="descripcion">Descripcion</label>
                   <textarea name="descripcion"></textarea>
                   <?php echo ($_SESSION['errores_entrada']) ?  mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
                   
                   <label for="categoria">Categoria</label>
                   <select name="categoria">
                       <?php $categorias = conseguirCategorias($db);
                            if($categorias):
                            while($categoria = mysqli_fetch_assoc($categorias)):                
                       ?>
                            <option value="<?=$categoria['id']?>">
                                <?=$categoria['nombre']?>
                            </option>
                       <?php
                            endwhile;
                            endif;
                       ?>
                       
                   </select>
                   <?php echo ($_SESSION['errores_entrada']) ?  mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
                   
                   <input type="submit" value="Guardar" />
           </form>
           <?php borrarErrores(); ?>
       </div>

<?php require_once 'includes/pie.php'; ?>