<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Cadastro</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Editar Cadastro</h2><br  />
        <form method="post" action="{{action('VeiculoController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" value="{{$veiculo->nome}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="marca">Marca</label>
              <input type="text" class="form-control" name="marca" value="{{$veiculo->marca}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="categoria">Categoria:</label>
              <input type="text" class="form-control" name="categoria" value="{{$veiculo->categoria}}">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Ano:</label>
              <input type="text" class="form-control" name="number" value="{{$veiculo->ano}}">
            </div>
          </div>
          <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <input type="file" name="foto" value="{{$veiculo->foto}}">    
      </div>
    </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Atualizar</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>