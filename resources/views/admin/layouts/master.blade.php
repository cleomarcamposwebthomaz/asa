<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | @yield('title')</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}" />
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  
  <!-- plugins -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/style.css') }}" />

  <!-- jQuery -->
  <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('admin._partials.navbar')

  @include('admin._partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="float-sm-right">
                @yield('breadcrumb')
            </div>
        </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        @include('includes.flash-message')

        @yield('content')

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin._partials.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
<!-- plugins -->
<script src="{{ asset('assets/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
{{-- <script src="{{ asset('assets/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script> --}}
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@master/dist/latest/bootstrap-autocomplete.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script src="{{ asset('assets/admin/plugins/tinymce_languages/langs/pt_BR.js') }}"></script>
<script src="{{ asset('assets/admin/dist/js/script.js?v='. time()) }}"></script>

<script>
  var editor_config = {
    route_prefix: '',
    path_absolute : "/",
    selector: "textarea.text-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons paste textcolor colorpicker textpattern"
    ],
    // plugins: [
    //   "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    //   "searchreplace wordcount visualblocks visualchars code fullscreen",
    //   "insertdatetime media nonbreaking save table contextmenu directionality",
    //   "emoticons template paste textcolor colorpicker textpattern"
    // ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    remove_script_host : false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

@stack('scripts')
</body>
</html>
