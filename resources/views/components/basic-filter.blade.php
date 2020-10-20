{!! Form::open(['url' => route('property'), 'method' => 'get', 'target' => '_blank']) !!}
    <div class="container" id="homeSearch">
        <div class="text-center block-title">
            <h1 class="text-white font-bold title d-none d-sm-block">
                Encontre aqui seu <br />
                melhor negócio
            </h1>
        </div>    

        <div class="btn-group" role="group">
            <input type="checkbox" name="offer_types[]" name="type" id="inputPropertyTypePurchase" value="1" style="display: none">
            <input type="checkbox" name="offer_types[]" name="type" id="inputPropertyTypeLocale" value="2" style="display: none">
            <button type="button" class="btn btn-danger btn-property-type shadow rounded-left type-purchase" value="purchase"
                onclick="$('.type-purchase i').toggle(); 
                $('#inputPropertyTypePurchase').prop('checked', !$('#inputPropertyTypePurchase').is(':checked'))"
            >
                <i class="fas fa-check" style="display: none;"></i>
                COMPRAR
            </button>
            <button type="button" class="btn btn-secondary btn-property-type type-location shadow" value="location"
                onclick="$('.type-location i').toggle();
                $('#inputPropertyTypeLocale').prop('checked', !$('#inputPropertyTypeLocale').is(':checked'))"
            >
                <i class="fas fa-check" style="display: none;"></i>
                ALUGAR
            </button>
        </div>        

        <div id="basicFilter" class="card shadow p-4 bg-light">

            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="" class="pb-2 text-white text-500">{{ __('Tipo de Imóvel') }}</label>
                        {!! Form::select('property_types[]', $propertyTypes, null, [
                            'data-select' => 'selectpicker',
                            'multiple' => true,
                            'data-live-search' => "true",
                            'data-title' => __('--'),
                        ]) !!}
                    </div>                
                </div>
            
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="" class="pb-2 text-white text-500">{{ __('Cidade') }}</label>
                        {!! Form::select('city', $cities, null, [
                            'data-select' => 'selectpicker',
                            'data-live-search' => "true",
                            'multiple' => false,
                            'data-title' => __('--'),
                        ]) !!}
                    </div>
                </div>

                <div class="col-sm-2 button search-buttons">
                    <button class="btn btn-secondary rounded btn-close-home-filter btn-show-home-filter d-block d-sm-none" type="button">
                        <i class="fas fa-times"></i>
                        Cancelar
                    </button>

                    <button class="btn btn-danger rounded">
                        <i class="fas fa-search"></i>
                        BUSCAR
                    </button>
                </div>

            </div>


        </div>
    </div>

{!! Form::close() !!}