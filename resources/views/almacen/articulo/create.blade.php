@extends ('layouts.admin')
<link rel="stylesheet" href="{{asset('css/vistas.css')}}">
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Articulo</h3>
		</div>
	</div>
	{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files' => true))!!}
    {{Form::token()}}		
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
			<div class="form-group">
				<img id="imgSalida" height="200px" width="200px">
			</div>
            <label class="btn btn-primary">
                Cargar Imagen <input type="file" style="display: none;" id="imagen" name="image" accept="image/*">
            </label>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="codigo">Codigo del Articulo</label>
				<input type="number" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Codigo del Articulo...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" required value="{{old('nombre')}}" name="nombre" class="form-control" placeholder="Nombre...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label>Categoria</label>
			<select name="idcategoria" class="form-control">
				@foreach($categorias as $cat)
					<option value="{{$cat->idCategorias}}">{{$cat->Nombre_categoria}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="text" required value="{{old('stock')}}" name="stock" class="form-control" placeholder="Stock...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="minimo">Minimo</label>
				<input type="number" required value="{{old('minimo')}}" name="minimo" class="form-control" placeholder="Minimo...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="maximo">Maximo</label>
				<input type="number" required value="{{old('maximo')}}" name="maximo" class="form-control" placeholder="Maximo...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="preciov">Precio de venta</label>
				<input type="text" required name="preciov" id="preciov" value="{{old('preciov')}}" class="form-control" placeholder="Precio de venta...">
			</div>
		</div>
	</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="/almacen/articulo" class="btn btn-danger">Cancelar</a>
			</div>
	<div id="myModal" class="modal">

	  <!-- The Close Button -->
	  <span class="cerrar" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

	  <!-- Modal Content (The Image) -->
	  <img class="modal-content" id="img01">

	  <!-- Modal Caption (Image Text) -->
	  <div id="caption"></div>
	</div>
{!!Form::close()!!}
<script>
 $(window).load(function(){

 $(function() {
  $('#imagen').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
  });

 // Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('imgSalida');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("cerrar")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<script>
	setInterval( function() { 
    if( haCambiado() );
}, 100);
	var valueAnterior=document.getElementById("preciov").value; 
    function haCambiado() { 

        if(document.getElementById("preciov").value!=valueAnterior) { 
            document.getElementById("preciov").value= number_format(document.getElementById("preciov").value,0); 
            return true; 
        } 
        else  
        return false; 
    }
function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}
</script>
@endsection