@include('header')
@include('top')
<section class="u-clearfix u-image u-shading u-section-8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-black u-container-style u-layout-cell u-left-cell u-right-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-valign-middle-sm u-valign-middle-xs">
                  <div class="u-align-center-md u-align-center-sm u-border-1 u-border-white u-container-style u-group u-group-1">
                    <div class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-top-lg u-valign-top-xl u-valign-top-xs u-container-layout-2">
                      <h2 class="u-align-center-lg u-align-center-xl u-align-center-xs u-text u-text-1">Pide tu vez!</h2>
                      <div class="u-border-3 u-border-white u-line u-line-horizontal u-line-1"></div>
                      <p class="u-text u-text-2"> Si no quieres volver a esperar nunca más en una sala de espera de una peluquería, aquí tienes la solución. Pide vez y nosotr@s te avisamos 10 minutos antes de que te toque!</p>
                      <div class="u-form u-form-1">
                        <form action="{{ url('pedirvez') }}" method="POST" class="u-block-5d41-12 u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <div class="u-form-group u-form-name">
                            <label class="u-form-control-hidden u-label">Nombre</label>
                            <input type="text" placeholder="Dinos tu nombre" name="nombre" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                          </div><!-- always visible -->
                          <div class="u-form-email u-form-group">
                            <label class="u-form-control-hidden u-label">Email</label>
                            <input type="email" placeholder="Tu correo electrónico ( Email )" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                          </div>
                          <div class="u-form-tlf u-form-group">
                            <label class="u-form-control-hidden u-label">Teléfono</label>
                            <input type="number" placeholder="Tu teléfono móvil" name="tlf" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                          </div>
                          <div class="u-align-left u-form-group u-form-submit u-form-group-4">
                            
                            <input type="submit" value="Pedir Vez!" class="u-btn u-btn-submit u-button-style u-palette-4-base u-btn-1">
                          </div>
                          <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                          <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('footer')