
<form action="{{ url('/almacen/'.$almacen->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}

@include('almacen.form',['modo'=>'Editar']);

</form>