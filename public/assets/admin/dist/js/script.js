var csrfToken = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
  $('.tabs-link a').on('click', function () {
    const tabText = $(this).text();
    const tabLink = $(this).attr('href').replace('#', '');
    const params = new URLSearchParams(location.search);
    params.set('tab', tabLink);
    history.pushState(null, tabText, location.pathname + '?' + params.toString());
  });

  const currentParams = new URLSearchParams(location.search);
  const currentTab = currentParams.get('tab');
  const tabActive = $(`#${currentTab}-tab`);
  if (tabActive) {
    tabActive.click();
  }

  $("input[data-usemask='price']").maskMoney({ prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false });
});

function deleteRegister(data) {
  const element = $(`#${data.id}`);

  if (!confirm('Remove esse registro?')) return;

  $.ajax({
    url: data.url,
    type: 'DELETE',
    data: { _token: csrfToken },
    beforeSend: function () {
      element.addClass('table-danger').css({ opacity: .5 })
    },
    success: function (response) {
      element.remove();
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: response.message,
        timer: 1500,
        toast: true,
      })
    },
    error: function () {

    }
  });
}

$(function () {
  $('[data-select="selectpicker"]').selectpicker();
  $('input[data-usemask="cep"]').mask('00000-000');
  $('input[data-usemask="phone"]').mask('(00) 00000-0000');

  $('.my-colorpicker2').on('colorpickerChange', function (event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
  });

  $("input[data-bootstrap-switch]").each(function () {
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });

});

// Delete Register Ajax
$('.deleteRegisterAjax').on('click', function () {
  if (!confirm('Remover esse registro?')) return false;

  $(this).attr('disabled', true);

  const url = $(this).data('url');
  const id = $(this).data('target');
  const element = $(`[data-element="${id}"]`);
  const _token = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
    url,
    type: 'DELETE',
    data: {
      _token
    },
    success: function () {
      element.fadeOut();
    },
    beforeSend: function () {
      element.css('opacity', .8);
    }
  });
})

$('.nav-sidebar li a').each(function () {
  const pathname = location.pathname;

  if ($(this).attr('href') === pathname) {
    $(this).addClass('active');

    if ($(this).parent().parent().hasClass('nav-treeview')) {
      $(this).parent().parent().show();
      // $(this).parent().parent().parent().find('.has-tree').addClass('active');
    }
  }

});