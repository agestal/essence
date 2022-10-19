@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
    $(document).ready(function() {
        $("#guardar").on('click', function() {
            var cliente = $("#cliente").val();
            $.ajax({
                method: "POST",
                headers: {"X-CSRF-TOKEN": "{{ csrf_token(); }}" },
                url: "{{ url('/admin/ventas/store')}}",
                data: { cliente: cliente }
            })
            .done(function(data)
            {
                if (data)
                {
                    alert("Venta creada correctamente!");
                    var url = "{{ url('admin/ventas/contenido')";
                    location.href = url+"/"+data;
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
            <h1 class="m-0">Categoria Nueva</h1>
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
                            <label> Cliente </label>
                            <select class="form-control" id="cliente">
                                @foreach ( $clientes as $c )
                                    <option value="{{$c->id}}"> {{ $c->nombre }} {{ $c->apellido1 }} {{ $c->apellido2 }} </option>
                                @endforeach
                            </select>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#cliente").select2();
                            });
                        </script>
                        <div class="form-group">
                            <input type="button" class="btn btn-success" id="guardar" value="GUARDAR" />
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
