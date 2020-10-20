<div class="modal fade" id="{{ $id }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>

      <div class="modal-footer justify-content-between">
        @if (!empty($back))
          <button type="button" class="btn btn-default" data-dismiss="modal">{{  }}</button>
        @endif
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->