<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    location.href = 'https://api.whatsapp.com/send?phone=34{{$siguiente->tlf}}&text=Hola {{$siguiente->nombre}}! Te recordamos que tienes vez en nuestro salón de belleza. Tendrás tu sitio disponible en 10 minutos aproximadamente. Gracias por confiar en nosotros!';
});
</script>