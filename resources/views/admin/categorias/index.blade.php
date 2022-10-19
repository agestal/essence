@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
    $(document).ready(function() {
        $(".eliminar").on('click', function() {
            var id = $(this).attr('id');
            $.ajax({
                method: "POST",
                headers: {"X-CSRF-TOKEN": "{{ csrf_token(); }}" },
                url: "{{ url('/admin/categorias/delete')}}",
                data: { id: id }
            })
            .done(function(data)
            {
                if (data)
                {
                    alert("Categoria eliminada correctamente!");
                    location.reload();
                }
            });
        });
    });
</script>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categorias</h1>
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
                <a class="btn btn-info right mb-1" href="{{url('admin/categorias/create')}}" > Nueva Categoria </a>
              </div>
              <div class="box-body">
                <table class="table table-stripped">
                  <thead>
                    <th> Nombre </th>
                    <th> Estetica </th>
                    <th> Cita Previa? </th>
                    <th> Eliminar </th>
                  </thead>
                  <tbody>
                  @foreach ( $datos as $d )
                    <tr>
                      <td> {{ $d->nombre }} </td>
                      @if ( $d->estetica == True )
                        <td> Si </td>
                      @else
                        <td> NO </td>
                      @endif
                      @if ( $d->cita_previa == True )
                        <td> Si </td>
                      @else
                        <td> NO </td>
                      @endif
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
