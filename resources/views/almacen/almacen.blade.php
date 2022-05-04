<!--Mostrar lista de almacenes-->

@if(Session::has('mensaje'))  <!--informar que se agrego registro-->
{{Session::get('mensaje')}}
@endif
<!--cambiooooooooo-->
<a href="{{url('almacen/create')}}">Registrar Nuevo almacen</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Ubicacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($almacenes as $almacen) <!--Consultar controlador 
        -metodo index -- se pasan a una variable llamada almacen-->
        <tr>
            <td>{{$almacen->id}}</td> <!--nombre de la tabla-->
            <td>
                <img src="{{asset('storage').'/'.$almacen->ubicacion}}" width="120" alt="">
                {{$almacen->descripcion}}
            </td>

            <td>{{$almacen->estado}}</td>
            <td>{{$almacen->ubicacion}}</td>
            <td>
            
            <a href="{{ url('/almacen/'.$almacen->id.'/edit') }}">
            Editar
            </a>
            
            <form action="{{ url('/almacen/'.$almacen->id) }}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" onclick="return confirm('Seguro de eliminar?')" value="Borrar">
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>