<?php include('db.php') ?>

<?php include('includes/header.php') ?>
    
<div class="container p-4">

    <div class="row">
       <div class="col-md-4">
        
       <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" 
            role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_product.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="nombre de producto" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="referencia" class="form-control" placeholder="referencia de producto" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="precio" class="form-control" placeholder="precio de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="peso" class="form-control" placeholder="peso de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="categoria" class="form-control" placeholder="categoria de producto">
                    </div>

                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="stock de producto">
                    </div>

                    <div class="form-group">
                        <input type="date" name="creacion" class="form-control" placeholder="creacion de producto">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="save_product" value="Guardar">
                
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>referencia</th>
                        <th>precio</th>
                        <th>peso</th>
                        <th>categoria</th>
                        <th>stock</th>
                        <th>creacion</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM PRODUCTO";
                    $result_product = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_array($result_product)){ ?>
                        <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['referencia'] ?></td>
                            <td><?php echo $row['precio'] ?></td>
                            <td><?php echo $row['peso'] ?></td>
                            <td><?php echo $row['categoria'] ?></td>
                            <td><?php echo $row['stock'] ?></td>
                            <td><?php echo $row['creacion'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>"class="btn btn-secondary">
                                    edit
                                </a>
                                <a href="delete_product.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

     
</div>

<?php include('includes/footer.php') ?>

  