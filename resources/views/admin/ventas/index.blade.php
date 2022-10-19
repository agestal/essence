@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
    $(document).ready(function() {
        $(".eliminar").on('click', function() {
            var confirm = confirm("Seguro que quieres eliminar la venta por compelto?");
            if ( confirm )
            {
                var id = $(this).attr('id');
                $.ajax({
                    method: "POST",
                    headers: {"X-CSRF-TOKEN": "{{ csrf_token(); }}" },
                    url: "{{ url('/admin/ventas/delete')}}",
                    data: { id: id }
                })
                .done(function(data)
                {
                    if (data)
                    {
                        alert("Venta eliminada correctamente!");
                        location.reload();
                    }
                });
            }
        });
    });
</script>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ventas</h1>
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
                <a class="btn btn-info right mb-1" href="{{url('admin/ventas/create')}}" > Nueva Venta </a>
              </div>
              <div class="box-body">
                <table class="table table-stripped">
                  <thead>
                    <th> Cliente </th>
                    <th> Fecha </th>
                    <th> Precio </th>
                    <th> Duración </th>
                    <th> Eliminar </th>
                  </thead>
                  <tbody>
                  @foreach ( $datos as $d )
                    <tr>
                      <td> {{ $d->nombre }} </td>
                      <td> {{ $d->fecha }} </td>
                      <td> {{ $d->total }} </td>
                      <td> {{ $d->tiempo }} </td>

                      <td> <input type="button" class="btn btn-danger eliminar" value="ELIMINAR" id="{{$d->id}}" /> </td>
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
