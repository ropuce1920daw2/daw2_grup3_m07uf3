<!DOCTYPE >
<html>
<head>
<title>Añadir Canal</title>
</head>
<body>
@if(\Session::has('Exit'))
        <div class="alert alert-success">
          <p>{{\Session::get('Exit')}}</p>
        </div>
      @endif
<form action="{{url('canals')}}" method="POST">
{{csrf_field()}}
<br>
<b>Introduce Un canal de Television<br><br>
</b>
Nombre
<input type="text" name="nom_canal">
<br>
</b>
<input value="Enviar datos" type="submit">
</form>
</body>
</html>

