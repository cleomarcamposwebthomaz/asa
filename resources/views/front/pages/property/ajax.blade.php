<div class="col-sm-12">
  <h5 class="f-black text-dark text-uppercase pb-2">{{ $total }} Encontrados</h5>
</div>

@each('front.pages.property._partials.property', $properties, 'property')

<div class="col-sm-12">
  {{ $properties->appends(request()->query())->links() }}
</div>