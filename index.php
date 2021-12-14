<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<link href="styles/style.css" rel="stylesheet" type="text/css">
    <title> LOS VACUNOS</title>

    <style type="text/css">
    #titulo{
        display: none;
        
    }

    #titulo2{
        display: none;
    }
    #titulo3{
        display: none;
    }
    #titulo4{
        display: none;
    }
    #titulo5{
        display: none;
    }
    #titulo6{
        display: none;
    }
    h6{
      color: red;
    }
   
    </style>
  </head>

  <body>
 
 <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://png.pngtree.com/png-vector/20210224/ourlarge/pngtree-cute-cow-mascot-logo-png-image_2945270.jpg" alt="" width="40" height="40" class="d-inline-block align-text-top">
      Los vacunos
    </a>
    <?php 
require "conexion.php";
$stmt = $dbh->prepare("SELECT id, color FROM colores ");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
?>

<!-- form vacunos -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="margin-left:900px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear vacuno
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear vacuno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      

<div class="container">
<form action="insertar_vacuno.php" method="POST">
<div class="mb-3">
<label>Código:</label>
  <input type="text" class="form-control" name="codigo" id="exampleFormControlInput1" pattern="[AGC1-987654321]+" placeholder=" Ejemplo AGC13456" onclick="mostrar() , quitar_dos()" required >
</div>
<div id="titulo" >
<h6> Escriba en mayúsculas</h6>
</div>
<div class="mb-3">
<label>Fecha de nacimiento:</label>
  <input type="date" class="form-control" name="fecha" id="exampleFormControlInput1" min="2015-01-01" placeholder=" Ingrese el código del vacuno" onclick="quitar() , quitar_dos()" Required >
</div>

<div class="mb-3">
<label>Nombre:</label>
  <input type="text" class="form-control" name="nombre" id="exampleFormControlInput1" pattern="[A-Z ]{5,20}" placeholder=" Ingrese el nombre del vacuno" onclick="mostrar_dos() , quitar()"  Required >
</div>
<div id="titulo2" >
<h6> Escriba en mayúsculas</h6>
</div>
<div>
<label for="exampleDataList" class="form-label">Género::</label>
<select class="form-select" name="genero" aria-label="Default select example" onclick="quitar() , quitar_dos()" Required >
  <option selected></option>
  
  <option value="MACHO">MACHO</option>
  <option value="HEMBRA">HEMBRA</option>
</select>
</div>

<div>
<label for="exampleDataList" class="form-label">Color:</label>
<select class="form-select" name="color" aria-label="Default select example" onclick="quitar() , quitar_dos()" Required >
  <option selected></option>
  <?php while ($row = $stmt->fetch()){ ?>
  <option value="<?php echo $row['id'] ?>"><?php echo $row['color']?></option>
 <?php } ?> 
</select>
</div>

<div>

<?php 

$stmt = $dbh->prepare("SELECT id, raza FROM razas ");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
?>
<label for="exampleDataList" class="form-label">Raza:</label>
<select class="form-select" name="raza" aria-label="Default select example" onclick="quitar() , quitar_dos()" Required >
  <option selected></option>
  <?php while ($row = $stmt->fetch()){ ?>
  <option value="<?php echo $row['id'] ?>"><?php echo $row['raza'] ?></option>
 <?php } ?> 
</select>
</div>
<?php 

$stmt = $dbh->prepare("SELECT codigo_finca, nombre_finca FROM fincas ");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
?>
<label for="exampleDataList" class="form-label">Finca a la que pertenece:</label>
<select class="form-select" name="finca" aria-label="Default select example" onclick="quitar() , quitar_dos()" Required >
  <option selected></option>
  <?php while ($row = $stmt->fetch()){ ?>
  <option value="<?php echo $row['codigo_finca'] ?>"><?php echo $row['nombre_finca'] ?></option>
 <?php } ?> 
</select>
</div>
<br>
<div>
<button type="submit" class="btn btn-primary">Registrar</button>
</div>
</form>
</div>



      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- form vacunos -->

<!-- form finca -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Crear finca
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Crear finca</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div class="container">
<form action="insertar_finca.php" method="POST">
<div class="mb-3">
<label>Código finca:</label>
  <input type="text" class="form-control" name="codigo" id="codigo" pattern="FIN(01|02|03|04|05|06|07)" placeholder=" Ejemplo: FIN01 " onclick="mostrar_tres() , quitar_cuatro(), quitar_cinco(), quitar_seis()" required >
</div>
<div id="titulo3" >
<h6> Escriba en mayúsculas</h6>
</div>
<div class="mb-3">
<label>Nombre de la finca:</label>
  <input type="text" class="form-control" name="nombre_finca" id="nombre"  pattern="[A-Z ]{5,20}"  placeholder=" Ingrese el nombre de la finca" onclick="mostrar_cuatro(), quitar_tres() , quitar_cinco(), quitar_seis()" Required >
</div>
<div id="titulo4" >
<h6> Escriba en mayúsculas</h6>
</div>
<div class="mb-3">
<label>Nombre de la vereda:</label>
  <input type="text" class="form-control" name="nombre_vereda" id="vereda" pattern="[A-Z ]{5,20}" placeholder=" Ingrese el nombre de la vereda" onclick="mostrar_cinco() , quitar_tres(), quitar_cuatro(), quitar_seis()"  Required >
</div>
<div id="titulo5" >
<h6> Escriba en mayúsculas</h6>
</div>

<div class="mb-3">
<label>Departamento:</label>
  <input type="text" class="form-control" name="departamento" id="departamento" pattern="[A-Z ]{5,20}" placeholder=" Ingrese el departamento" onclick="mostrar_seis() , quitar_tres(), quitar_cuatro(), quitar_cinco()"  Required >
</div>
<div id="titulo6" >
<h6> Escriba en mayúsculas</h6>
</div>
<div class="mb-3">
<label>Extensión en hectáreas:</label>
  <input type="number" class="form-control" name="hectareas" id="hectareas" min="1.10" max="35.0"  placeholder=" Ingrese las hectáreas" onclick="quitar_tres() , quitar_cuatro(), quitar_cinco(), quitar_seis()"  Required >
</div>

<br>
<div>
<button type="submit" class="btn btn-primary">Registrar</button>
</div>
</form>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
  </div>
</nav>



    <center><h1>Los vacunos</h1></center>




<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-left:30px; margin-right:30px;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://www.worldanimalprotection.cr/sites/default/files/styles/1200x630/public/media/br_files/6062625947_a5e7e55be3_o.jpg?itok=2uCxVnRw" class="d-block w-100" alt="..." height="400">
    </div>
    <div class="carousel-item">
      <img src="https://noticias.masverdedigital.com/wp-content/uploads/2020/08/lasvacasselamen1b.jpg" class="d-block w-100" alt="..." height="400">
    </div>
    <div class="carousel-item">
      <img src="https://www.ngenespanol.com/wp-content/uploads/2018/08/%C2%BFEn-qu%C3%A9-pa%C3%ADs-latino-hay-m%C3%A1s-vacas-que-personas-1280x720.jpg" class="d-block w-100" alt="..." height="400">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>


<div style="margin-left:30px;">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn3tZX6NFwvf8OI0ReCcqTR7sqJjS9rpJgBg&usqp=CAU"  width="460px" height="200px">
<img src="https://brappi.com/files/05-2021/ad31273/venta-de-finca-ganadera-lecheria-guayabo-de-408882113.jpg" width="370px" height="200px"> 
<img src="https://img-co-1.trovit.com/171EgbqB1dt/171EgbqB1dt.1_11.jpg" width="450px" height="200px"> 
</div>

<div style="margin-top:5px; margin-left:30px; " >

<img src="https://imganuncios.mitula.net/casa_en_venta_finca_ganadera_en_venecia_antioquia_7_alcobas_8_ba%C3%B1os_2330048593693873181i12.jpg" width="320px" height="200px">
<img src="https://img.fotocommunity.com/pequea-finca-ganadera-via-armenia-pereira-b60355f7-606d-452f-92c8-2829723f0933.jpg?height=1080" width="335px" height="200px"> 
<img src="https://staticw.s3.amazonaws.com/inmuebles/gr13386120200603113259.jpg" width="335px" height="200px"> 
<img src="https://http2.mlstatic.com/D_NQ_NP_974189-MCO44680007245_012021-O.jpg" width="286px" height="200px"> 
</div>
<br>


<script>
function mostrar(){
    document.getElementById('titulo').style.display = 'block';
  }
  function quitar(){
   document.getElementById('titulo').style.display = 'none';
  }
  function mostrar_dos(){
    document.getElementById('titulo2').style.display = 'block';
  }
  function quitar_dos(){
   document.getElementById('titulo2').style.display = 'none';
  }
  function mostrar_tres(){
    document.getElementById('titulo3').style.display = 'block';
  }
  function quitar_tres(){
   document.getElementById('titulo3').style.display = 'none';
  }
  function mostrar_cuatro(){
    document.getElementById('titulo4').style.display = 'block';
  }
  function quitar_cuatro(){
   document.getElementById('titulo4').style.display = 'none';
  }
  function mostrar_cinco(){
    document.getElementById('titulo5').style.display = 'block';
  }
  function quitar_cinco(){
   document.getElementById('titulo5').style.display = 'none';
  }
  function mostrar_seis(){
    document.getElementById('titulo6').style.display = 'block';
  }
  function quitar_seis(){
   document.getElementById('titulo6').style.display = 'none';
  }

  var input= document.getElementById('nombre');
input.oninvalid = function(event) 
{ 
  event.target.setCustomValidity('Campo no valido, por favor escriba en mayúscula y no mayor de 20 carácteres y no menor de 5 carácteres'); 
}


</script>
  
 
<footer class="text-center text-lg-start bg-light text-muted">
  
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Los vacunos
    
  </div>
  
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    


  </body>
</html>