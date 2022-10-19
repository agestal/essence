@include('admin.header')
@include('admin.top')
@include('admin.menu')
<script>
$(document).ready(function() {
  $(".avisar").on('click',function() {
    var tlf = $(this).attr('tlf');
    var nombre = $(this).attr('nombre');
    window.open("https://api.whatsapp.com/send?phone=34"+tlf+"&text=Hola "+nombre+"! Te recordamos que tienes vez en nuestro salón de belleza. Tendrás tu sitio disponible en 10 minutos aproximadamente. Gracias por confiar en nosotros!","_blank");
    location.reload;
  })
});
</script>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Veces Pendientes</h1>
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
                    <th> Teléfono </th>
                    <th> Hora ( Peticion ) Vez </th>
                    <th> Avisar </th>
                    <th> Editar </th>
                    <th> Eliminar </th>
                  </thead>
                  <tbody>
                  @foreach ( $veces as $v )
                    <tr>
                      <td> {{ $v->nombre }} </td>
                      <td> {{ $v->tlf }} </td>
                      <td> {{ $v->created_at }} </td>
                      <td> <input type="button" class="btn btn-success avisar" tlf="{{$v->tlf}}" nombre="{{$v->nombre}}" value="AVISAR" /> </td>
                      <td> <input type="button" class="btn btn-info" value="EDITAR" /> </td>
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