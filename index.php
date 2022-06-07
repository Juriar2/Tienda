<?php
require 'config/database.php';
require 'config/config.php';




$db =new database();
$con=$db->conectar();

$sql= $con->prepare("SELECT id,nombre,precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

//session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
    1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Tienda kika</title>
</head>
<body>
<header>
  
  <div class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
      <a href="#" class="navbar-brand">
       
        <strong><a href="http://localhost/Tienda/"></a>Tienda kika</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarHeader">
            <ul class=" navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="" class="nav-link active">Catalogo productos</a>
            </li>
            <li class="nav-item">
                <a href="Arcerca" class="nav-link ">Acerca de nostros</a>
            </li>
            <li class="nav-item">
                <a  target="_blank" href="Contacto " class="nav-link ">Contacto</a>
            </li>
          
            </ul>
            <a href="checkout" class="car">
            <i class="fas fa-cart-arrow-down" title="carrito de compra"></i><span id="num_cart" class="position-absolute top-45 start-90 translate-middle badge rounded-pill bg-danger"title="Numero de compra"><?php echo $num_cart;?></span></a>
        </div> 
        
      <!--</form>-->
    </div>
 
  </div>
  
</header>

<main>
    <!---class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">----->
       <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 card-img-top ">
              <?php foreach($resultado as $row){ ?>
                <div class="col">
                    <div class="card shadow-sm">
                        
                        <?php
                        $id=$row['id'];
                        $imagen = "images/productos/".$id."/principal.jpg";

                        if(!file_exists($imagen)){
                          $imagen ="images/no-photo.jpg";
                        }
                        ?>
                    
                        <img src="<?php echo $imagen ?> " alt="Imagen Principal" title="Imagen Principal">
                        <div class="card-body border border-dark ">
                            <h5 class="card-title"><small><?php  echo $row['nombre']; ?></small></h5>
                            <p class="card-text"><b>$ <?php  echo number_format ($row['precio'],0,',', ','); ?></b></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="detalles?id=<?php echo $row ['id']; ?>&token=<?php echo hash_hmac('sha256', $row['id'],KEY_TOKEN); ?> " class="btn btn-secondary" title="Mas Info">Mas info</a>
                                </div>
                                <button class="btn btn-primary" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha256', $row['id'],KEY_TOKEN); ?>')"  title="Comprar" >Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
              <?php }?>
            </div>
        </div>
</main>






<script>
  function addProducto(id,token) {
    let url ='clases/carrito.php'
    let formData=new FormData()
    formData.append('id',id)
    formData.append('token',token)

    fetch(url, {
      method: 'POST',
      body: formData,
      mode: 'cors'
      }).then(response => response.json())
      .then(data => {
        if(data.ok){
          let elemento = document.getElementById("num_cart")
          elemento.innerHTML = data.numero
          swal('Producto','agregado al carrito con exito','success');
        }
      })
  }
  
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

<!--D/$peQN3---->