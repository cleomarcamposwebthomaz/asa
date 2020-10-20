<div class="d-flex justify-content-between">
  <div>
     @if (!empty($url))
      <a href="{{ $url }}" class="btn btn-default">
          <i class="fas fa-chevron-left"></i> Voltar
      </a>
     @else 
      <a href="javascript:;" class="btn btn-default" onclick="history.back()">
          <i class="fas fa-chevron-left"></i> Voltar
      </a>
     @endif
  </div>
  
  <div>
    @if (isset($formButtons))
      @foreach ($formButtons as $button)
        <button type="submit" name="{{ $button['name'] }}" value="{{ $button['value'] }}" class="btn btn-{{ !empty($button['color']) ? $button['color'] : 'default' }} float-right save-button ml-2">
          <i class="fas fa-{{ $button['icon'] }}"></i> {{ $button['title'] }}
        </button>
      @endforeach
    @endif

    @if (isset($saveFormContinueAdd))
      <button type="submit" name="save-and-create" value="1" class="btn btn-default float-right save-button ml-2">
        <i class="fas fa-plus"></i> Salvar e cadastrar mais items
      </button>
    @endif

    
    @if (!isset($saveFormButton) || isset($saveFormButton) && $saveFormButton == true)
      <button type="submit" class="btn btn-info float-right save-button">
        <i class="fas fa-save"></i> Salvar
      </button>
    @endif
  </div>  
</div>