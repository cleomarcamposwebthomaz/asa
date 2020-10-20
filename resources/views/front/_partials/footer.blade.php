<footer id="footer" class="bg-white pt-2 pt-md-5 pb-2 pb-md-5 shadow border-top">
  <div class="container">
      <div class="row">

          <div class="col-sm-3 attendance">
              <h3 class="text-uppercase">{{ $appSetting['phones']['public_name'] }}</h3>
              {!! nl2br($appSetting['phones']['value']) !!}
          </div>

          <div class="col-sm-3 links">
              <h3 class="text-uppercase">{!! nl2br($appSetting['attendance']['public_name']) !!}</h3>
              {!! nl2br($appSetting['attendance']['value']) !!}
          </div>

          <div class="col-sm-3 links">
              <h3 class="text-uppercase">Matriz</h3>
              {{ $appSetting['address']['value'] }}
          </div>

          <div class="col-sm-3 links social">
              <h3 class="text-uppercase">REDES SOCIAIS</h3>
              <div class="block-social">
                <a href="https://www.facebook.com/asaimob/" target="_blank" class="hvr-float-shadow"">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/asaimob/" target="_blank" class="hvr-float-shadow"">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://api.whatsapp.com/send?phone=5545991517120&amp;text=" target="_blank" class="hvr-float-shadow"">
                    <i class="fab fa-whatsapp"></i>
                </a>
              </div>
          </div>
      </div>

      <div class="text-center mt-4 mb-md-4">
          <img src="{{ asset('img/logo-footer.png') }}" alt="">
      </div>

      <h5 class="text-center text-dark">
          <strong>CRECI:</strong> J06330
      </h5>

      <div class="text-center">
        {!! nl2br($appSetting['copyright']['value']) !!}
      </div>

      <div class="text-center mt-3 mt-md-5 mb-4">
          <img src="{{ asset('img/webthomaz.png') }}" alt="">
      </div>
  </div>
</footer>