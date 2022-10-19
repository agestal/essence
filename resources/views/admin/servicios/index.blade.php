@include('admin.header')
@include('admin.top')
@include('admin.menu')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Servicios</h1>
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
                    <th> Precio </th>
                    <th> Duración </th>
                    <th> Categoría </th>

                    <th> Cita Previa? </th>

                    <th> Eliminar </th>
                  </thead>
                  <tbody>
                  @foreach ( $datos as $d )
                    <tr>
                      <td> {{ $d->nombre }} </td>
                      <td> {{ $d->precio }} </td>
                      <td> {{ $d->duracion }} </td>
                      <td> {{ $d->categoria }} </td>

                      @if ( $d->cita_previa == True )
                        <td> Si </td>
                      @else
                        <td> NO </td>
                      @endif

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
