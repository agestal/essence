@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
</script>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Clientes</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header">
              </div>
              <div class="box-body">
                <table class="table table-stripped">
                  <thead>
                    <th> Nombre </th>
                    <th> Tlf </th>
                    <th> Email </th>
                    <th> Comentarios </th>
                    <th> Eliminar </th>
                  </thead>
                  <tbody>
                  @foreach ( $datos as $d )
                    <tr>
                      <td> {{ $d->nombre }} </td>
                      <td> {{ $d->movil }} </td>
                      <td> {{ $d->email }} </td>
                      <td> {{ $d->comentarios }} </td>
                      <td> <input type="button" class="btn btn-danger" value="ELIMINAR" /> </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@include('admin.footer')
