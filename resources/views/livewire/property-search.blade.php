<div class="row">
    <div class="col-sm-3" >
      @include('front.pages.property._partials.filter')  
    </div> <!-- left -->

    <div class="col-sm-9" wire:ignore.self>
      <div class="row">
        @each('front.pages.property._partials.property', $properties, 'property')
  
        <div class="text-center pb-5 w-100">
          <a href="{{ route('property') }}" class="btn btn-outline-primary btn-lg text-uppercase rounded-0">
            {{ $appSetting['home_button_more_property']['value'] }}
          </a>
        </div>
      </div>
    </div> <!-- right -->
  </div>

{{-- @push('scripts') --}}

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').selectpicker();
        $('.js-example-basic-single').on('change', function (e) {
            @this.set('offer_types', $('.js-example-basic-single').selectpicker('val') );
        });
    });
</script>
{{-- @endpush --}}