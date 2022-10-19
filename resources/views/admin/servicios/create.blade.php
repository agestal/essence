@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
    $(document).ready(function() {
        $("#guardar").on('click', function() {
            var nombre = $("#nombre").val();
            var estetica = $("#estetica").val();
            var cita = $("#cita").val();
            $.ajax({
                method: "POST",
                headers: {"X-CSRF-TOKEN": "{{ csrf_token(); }}" },
                url: "{{ url('/admin/categorias/store')}}",
                data: { nombre: nombre, cita: cita, estetica: estetica }
            })
            .done(function(data)
            {
                if (data)
                {
                    alert("Categoria creada correctamente!");
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
            <h1 class="m-0">Servicio Nuevao/h1>
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
                            <label> Nombre </label>
                            <input type="text" class="form-control" id="nombre" />
                        </div>
                        <div class="form-group">
                            <label> Estetica </label>
                            <select class="form-control" id="categoria">
                                <option value="0"> NO </option>
                                <option value="1"> SI </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Permite Cita Previa? </label>
                            <select class="form-control" id="cita">
                                <option value="0"> NO </option>
                                <option value="1"> SI </option>
                            </select>
                        </div>
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
