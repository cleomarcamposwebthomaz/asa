<div class="owl-carousel owl-theme owl-brokers">
  @foreach ($brokers as $broker)
    <div class="col-sm-12 pb-5">
      <div class="card border-0 shadow">
        <img src="{{ thumb($broker->image, ['w' => 372, 'h' => 372]) }}" alt="" class="img-fluid">
        <div class="col-sm-12">
          {{-- <h3 class="pt-3 f-black text-dark">{{ $broker->name }}</h3> --}}
          {{-- <p>{{  \Illuminate\Support\Str::limit($broker->about, 200 ) }}</p> --}}
        </div>
  
        <ul class="list-group list-group-flush contact border-0 pb-2">
          <li class="list-group-item pt-1 pb-1 border-0">
            <i class="fas fa-envelope"></i> {{ $broker->email }}
          </li>

          @if ($broker->show_whatsapp)
            <li class="list-group-item pt-1 pb-1 border-0">
              <i class="fab fa-whatsapp"></i> {{ $broker->whatsapp }}
            </li>
          @endif

          @if ($broker->show_whatsapp)
            <li class="list-group-item pt-1 pb-1 border-0">
              <i class="fas fa-phone-volume"></i> {{ $broker->phone }}
            </li>
          @endif

        </ul>
      </div>
    </div>
  @endforeach
</div>
