<?php 
    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $consulta = "SELECT * FROM producto WHERE id = $id";
        $result = mysqli_query($conn, $consulta);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $ref = $row['referencia'];
            $precio = $row['precio'];
            $peso = $row['peso'];
            $cat = $row['categoria'];
            $stock = $row['stock'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $referencia = $_POST['referencia'];
        $precio = $_POST['precio'];
        $peso = $_POST['peso'];
        $cat = $_POST['categoria'];
        $stock = $_POST['stock'];

        $consulta = "UPDATE producto set nombre = '$nombre', referencia = '$referencia', precio = '$precio', peso = '$peso', categoria = '$cat', stock = '$stock' WHERE id = $id";
        mysqli_query($conn, $consulta);

        $_SESSION['message'] = 'producto actualizado con exito';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="actualiza el nombre">
                    </div>

                    <div class="form-group">
                        <input type="text" name="referencia" value="<?php echo $ref; ?>"class="form-control" placeholder="referencia">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="precio" value="<?php echo $precio; ?>" class="form-control" placeholder="precio de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="peso" value="<?php echo $peso; ?>" class="form-control" placeholder="peso de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="categoria" value="<?php echo $cat; ?>" class="form-control" placeholder="categoria de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="stock" value="<?php echo $stock; ?>" class="form-control" placeholder="cantidad de stock">
                    </div>
                        <br>
                        
                    <button type="button" class="btn btn-success" name="actualizar">
                        actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>