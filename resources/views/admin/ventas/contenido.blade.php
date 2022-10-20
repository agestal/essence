@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
    $(document).ready(function() {
        $("#asignar").on('click', function() {
            var servicios = $("#servicios").val();
            var venta = $("#venta").val();
            $.ajax({
                method: "POST",
                headers: {"X-CSRF-TOKEN": "{{ csrf_token(); }}" },
                url: "{{ url('/admin/ventas/store_contenido')}}",
                data: { venta:venta, servicios: servicios }
            })
            .done(function(data)
            {
                if (data)
                {
                    location.reload();
                }
            });
        });
        $(".delete").on('click', function() {
            var id = $(this).attr('id');
            $.ajax({
                method: "POST",
                headers: {"X-CSRF-TOKEN": "{{ csrf_token(); }}" },
                url: "{{ url('/admin/ventas/delete_contenido')}}",
                data: { id:id }
            })
            .done(function(data)
            {
                if (data)
                {
                    location.reload();
                }
            });
        });
    });
</script>
<input type="hidden" id="venta" value="{{$venta->id}}" />
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Venta Nº {{ $venta->id }} - Cliente:
                @if ( isset($cliente->nombre) )
                {{ $cliente->nombre }} {{ $cliente->apellido1 }} {{ $cliente->apellido2 }}
                @else
                Anónimo
                @endif
            </h1>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Servicios: </label>
                            <select multiple class="form-control" id="servicios">
                                @foreach ( $servicios as $s )
                                    <option value="{{$s->id}}"> {{ $s->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#servicios").select2();
                            });
                        </script>

                        <div class="form-group">
                            <input type="button" class="btn btn-success" id="asignar" value="ASIGNAR" />
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <table class="table table-stripped" id="servicios">
                                        <thead>
                                            <th> Servicio </th>
                                            <th> Precio </th>
                                            <th> Duración </th>
                                            <th> Eliminar </th>
                                        </thead>
                                        <tbody>
                                            @foreach ( $lineas as $l )
                                                <tr>
                                                    <td> {{ $l->nombre }} </td>
                                                    <td> <input class="form-control precio" type="text" value="{{ $l->precio }}" id="{{$l->id}}"/> </td>
                                                    <td> {{ $l->duracion }} </td>
                                                    <td> <input type="button" class="btn btn-danger delete" value="ELIMINAR" id="{{$l->id}}" />
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $precio }} €</h3>
                                <p>Importe Total</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $duracion }} minutos </h3>
                                <p> Duración Total </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@include('admin.footer')
