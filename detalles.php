<?php

require 'config/database.php'; // se require la base de datos
require 'config/config.php'; 
$db =new database();
$con=$db->conectar();


$id = isset($_GET['id']) ? $_GET['id'] :'';
$token = isset($_GET['token']) ? $_GET['token'] :'';

if($id==''|| $token==''){
    echo '<h1>Error al procesar la solicitud</h1>';
    exit;
  }else {
    $token_tmp =hash_hmac('sha256',$id, KEY_TOKEN);
    if($token == $token_tmp){

    $sql= $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
    $sql->execute([$id]);
    if($sql->fetchColumn()>0){

      $sql= $con->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1  
      LIMIT 1"); //se hace un select para ver si existe el producto
      $sql->execute([$id]);
       $row=$sql->fetch(PDO::FETCH_ASSOC);
        $nombre=$row['nombre'];
        $descripcion=$row['descripcion'];
        $precio=$row['precio'];
        $descuento=$row['descuento'];
        $precio_desc = $precio - (($precio * $descuento) / 100);
        $dir_images="images/productos/".$id. '/'; // se require la b
        
        $rutaimg = $dir_images . 'principal.jpg';
        
        if(!file_exists($rutaimg)) {
            $rutaimg="images/no-photo.jpg";
        }
        $imagenes =array();
        if (file_exists($dir_images)){
          $dir  = dir ($dir_images);
    
        while(($archivo = $dir->read()) !== false){
        
            if($archivo!='principal.jpg' &&(strpos($archivo,'jpg') || strpos($archivo,'jpeg'))){
                $imagenes[]=$dir_images.$archivo;
            }
        }
        $dir->close(); 
        
       }
        }
      
        
       
    

    }else {
      echo '<h1>Error al procesar la solicitud</h1>';
      
    }
  }

?>

<b></b>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
    1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Productos</title>
   
</head>
<body>
<script id="dsq-count-scr" src="//kika-7.disqus.com/count.js" async></script>
<header>
  
  <div class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
      <a href="#" class="navbar-brand">
       
        <a href="http://localhost/Tienda/"><strong>Tienda kika</strong></a>
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
                <a target="_blank" href="Contacto" class="nav-link ">Contacto</a>
            </li>
            </ul>
            
            <!---------pse mostratra el numero de articulo que haya en el  carrito-------->
            <a href="checkout">
            <i class="fas fa-cart-plus" title="carrito de compra"></i><span id="num_cart" class="position-absolute top-25 start-90 translate-middle badge rounded-pill bg-danger"title="Numero de compra"><?php echo $num_cart;?></span></a>
            <!---------pse mostratra el numero de articulo que haya en el  carrito-------->
           
        </div> 
    </div>
    
  </div>
  
</header>

<br>
<main>

        <div class="container">
           <div class="row">
             <div class="col-md-6 order-md-1">
             <div id="carouselImges" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="<?php echo $rutaimg;  ?>" class="d-block w-100" alt="imagenprincipal" title="Imagen Principal">
                
                </div>
                <!---------se hace un recorido-------->
                <?php foreach($imagenes as $img ){ ?>
                <div class="carousel-item">
                <img src="<?php echo $img; ?>" class="d-block w-100">
                 
                </div>
                <?php }?> <!---------fin del recorrido-------->
              </div>
              <button class="carousel-control-prev"class= type="button" data-bs-target="#carouselImges" data-bs-slide="prev" >
                <span class="carousel-control-prev-icon" aria-hidden="true"title="atras" ></span>
                <span class="visually-hidden ">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselImges" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" title="atras"></span>
                <span class="visually-hidden"></span>
              </button>
            </div>

              
             </div>

             <div class="col-md-6 order-md-2">
               <h2><?php echo $nombre; ?></h2>


               <?php if($descuento > 0) { ?>
                <p><del><?php echo MONEDA . number_format($precio,2,'.',','); ?></del></p>
                <h1>
                  <?php echo MONEDA . number_format($precio_desc,2,',',','); ?>
                   <small class="text-success"><?php echo $descuento;?>% de Descuento</small>
                </h2>
                <?php } else  { ?>

               <h2><?php echo MONEDA . number_format($precio,0,'.',','); ?></h2>
                <?php } ?>
                <p class="lead">
                  <?php echo $descripcion; ?>
                </p>
                <div class="">
                <button class="Comprar" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')"title="Comprar ahora">Comprar ahora</button>

                <button class="Comprar1" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')" title="Agregar al carrito">Agregar al carrito</button>

                </div>
               </div>
           </div>
        </div>
</main>


  

<div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://kika-7.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript><a href="https://disqus.com/?ref_noscript">comentarios</a></noscript>





 <!--------script de bostrap-------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<!---------Funcion del boton agregar el productos-------->
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
          swal('producto','Agregado al carrito con exito','success');
          
      
        }
      })
  }
  
  
                
           
</script>    <!---------Fin del productos-------->



</body>

</html>