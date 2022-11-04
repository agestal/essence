@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
    $(document).ready(function() {
        $("#guardar").on('click', function() {
            var nombre = $("#nombre").val();
            var ape1 = $("#ape1").val();
            var ape2 = $("#ape2").val();
            var mail = $("#email").val();
            var tlf = $("#tlf").val();
            $.ajax({
                method: "POST",
                headers: {"X-CSRF-TOKEN": "{{ csrf_token(); }}" },
                url: "{{ url('/admin/clientes/store')}}",
                data: { nombre: nombre, ape1: ape1, ape2: ape2, email: mail, tlf: tlf }
            })
            .done(function(data)
            {
                if (data)
                {
                    alert("Cliente creado correctamente!");
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
            <h1 class="m-0">Cliente Nuevo</h1>
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
                            <label> Appelido 1 </label>
                            <input type="text" class="form-control" id="ape1" />
                        </div>
                        <div class="form-group">
                            <label> Appelido 1  </label>
                            <input type="text" class="form-control" id="ape2" />
                        </div>
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" class="form-control" id="email" />
                        </div>
                        <div class="form-group">
                            <label> Tlf </label>
                            <input type="text" class="form-control" id="tlf" />
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
