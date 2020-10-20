{!! Form::open(['method' => 'get']) !!}
<div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="search" class="form-control float-right" placeholder="Buscar"
        autofocus="autofocus"
        value="{{ Request::get('search') }}"
    >

    <div class="input-group-append">
    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
    </div>
</div>
{!! Form::close() !!}
