
<form action="{{ url('/almacen') }}" method="post" enctype="multipart/form-data">
@csrf
@include('almacen.form',['modo'=>'Nuevo']);
</form>