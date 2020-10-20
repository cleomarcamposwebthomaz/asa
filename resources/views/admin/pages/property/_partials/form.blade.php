<ul class="nav nav-tabs tabs-link" id="custom-content-below-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tab-information-tab" data-toggle="pill" href="#tab-information" role="tab">
            {{ __('Informações') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-detail-tab" data-toggle="pill" href="#tab-detail" role="tab">
            {{ __('Detalhes') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-address-tab" data-toggle="pill" href="#tab-address" role="tab">
            {{ __('Endereço do Imóvel') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link{{ empty($property->id) ? ' disabled' : '' }}" id="tab-photo-tab" data-toggle="pill" href="#tab-photo" role="tab">
            {{ __('Fotos') }}
        </a>
    </li>
</ul>

<div class="tab-content" id="custom-content-below-tabContent">
    <div class="tab-pane fade show active pt-3" id="tab-information" role="tabpanel">
        @include('admin.pages.property._partials.tabs.information')
    </div>

    <div class="tab-pane fade pt-3" id="tab-detail" role="tabpanel">
        @include('admin.pages.property._partials.tabs.detail')
    </div>

    <div class="tab-pane fade pt-3" id="tab-photo" role="tabpanel">
        @include('admin.pages.property._partials.tabs.photo')
    </div>

    <div class="tab-pane fade pt-3" id="tab-address" role="tabpanel">
        @include('admin.pages.property._partials.tabs.address')
    </div>
</div>
