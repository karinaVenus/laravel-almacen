<h1>{{ $modo }} almacen</h1>

<label for="descripcion">Descripcion</label>
<input type="text" name="descripcion" value="{{isset($almacen->descripcion)?$almacen->descripcion:''}}" id="descripcion"><br>

<label for="estado">Estado</label>
<input type="text" name="estado" value="{{isset($almacen->estado)?$almacen->estado:''}}" id="estado"><br>

<label for="ubicacion">Ubicacion</label>
@if(isset($almacen->ubicacion))
<!-- {{$almacen->ubicacion}} //Ruta de imagen-->
<img src="{{asset('storage').'/'.$almacen->ubicacion}}" width="80" alt="">
@endif
<input type="file" name="ubicacion" value="" id="ubicacion"><br>

<input type="submit" value="{{ $modo }} datos"><br>

<a href="{{url('almacen/')}}">Regresar a lista almacen</a>