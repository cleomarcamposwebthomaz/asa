require('./bootstrap');

$('.owl-slideshow').owlCarousel({ 
  items: 1,
  loop: true,
});

function owlCarouselPropety() {
  $('.property-images').owlCarousel({ items: 1, loop: true });
  $('.owl-property-parts').owlCarousel({ items: 3, loop: true, dots: false, nav: false });
}

$('.property-show-images').owlCarousel({ items: 1, loop: true, nav: true });

$('.owl-banner').owlCarousel({ items: 1, loop: true, dots: false, nav: false });
$('.owl-brokers').owlCarousel({
  items: 3,
  loop: true,
  dots: false,
  nav: true,
  autoplay: true,
  responsive: {
    0: {
      items: 1,
      dots: false,
      nav: false,
    },
    600: {
      items: 3
    },
    1000: {
      items: 3
    }
  }
});


$(function () {
  var nav = $('.top');
  var header = $('#header');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 150) {
      nav.addClass("d-none");
      header.addClass("fixed");
    } else {
      nav.removeClass("d-none");
      header.removeClass("fixed");
    }
  });

});

$('[data-select="selectpicker"]').selectpicker();

function verifyFilters() {
  $('#filter select').each(function () {
    const current = $(this);
    if ($(this).val()) {
      let name = $(this).attr('name');
      name = name.replace('[', '');
      name = name.replace(']', '');

      $(`label[for="${name}"]`).find('i').css('cursor', 'pointer').show();
      $(`label[for="${name}"]`).find('i').on('click', function () {
        current.val('');
        $(`select[id="filter_${name}"]`).selectpicker('refresh');

        if (name === 'state') {
          $(`select[id="filter_city"]`).val('');
          $(`select[id="filter_city"]`).empty();
          $(`select[id="filter_city"]`).selectpicker('refresh');
        }

        $(`label[for="${name}"]`).find('i').css('cursor', 'pointer').hide();
        submitPropertyFiter();
      });
    }
  });

  $('.filter-actives').html('');

  $('#filter select option:selected').each(function () {
    const current = $(this);

    if (current.val()) {
      $('.filter-actives').append(`
        <button class="btn btn-sm btn-primary mr-3 mb-3 removeFilter" data-name="${current.parent().attr('name')}" data-id="${current.val()}">
            ${current.text()}
            <i class="fas fa-times"></i>
        </button>
      `);
    }
  });

  $('.removeFilter').on('click', function () {
    let name = $(this).data('name');
    name = name.replace('[', '');
    name = name.replace(']', '');

    $(`#filter option[value="${$(this).data('id')}"]`).prop('selected', false);
    $(`#filter select[id="filter_${name}"]`).selectpicker('refresh');

    if (name === 'state') {
      $(`#filter select[id="filter_city"]`).val('');
      $(`#filter select[id="filter_city"]`).empty();
      $(`#filter select[id="filter_city"]`).selectpicker('refresh');
    }

    verifyFilters();
    submitPropertyFiter();
  });
}

verifyFilters();

const $filter = $('#filter');
$('#filter').find('select').on('change', function () {
  submitPropertyFiter();
});

$('#filter').find('select[name="state"]').on('change', function () {
  getCities($(this).val());
});

$('#filter').find('input').on('blur', function () {
  submitPropertyFiter();
});

$('#filter .button').on('click', function () {
  submitPropertyFiter();
  return false;
});

function getCities(state_id) {
  $.ajax({
    url: `/city/${state_id}`,
    success: function (result) {
      $('select[name="city"]').selectpicker('destroy');
      $('select[name="city"]').empty();

      result.forEach((city) => {
        let option = `<option value="${city.id}">${city.name}</option>`;
        $('select[name="city"]').append(option);
      });

      $('select[name="city"]').selectpicker('refresh');
    },

    beforeSend: function () {
      $('#filter').find('select[name="city"]').html('<option>Aguarde...</option>');
    }
  });
}

function submitPropertyFiter() {
  verifyFilters();
  const data = $filter.find('form').serialize();

  $.ajax({
    url: $filter.find('form').attr('action'),
    data: data,
    success: function (response) {
      $('#list-properties').html(response);
      owlCarouselPropety();
      history.pushState('', '', $filter.find('form').attr('action') + '?=' + data);
      $('.loading-property').hide();
    },
    beforeSend: function () {
      $('.loading-property').show();
    }
  });
}

owlCarouselPropety();

$("input[data-usemask='price']").maskMoney({ prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false });

$('input[data-usemask="cep"]').mask('00000-000');
$('input[data-usemask="phone"]').mask('(00) 00000-0000');

$('.btn-show-search').on('click', function () {
  $('#filter').toggle();
});

$('.btn-show-home-filter').on('click', function () {
  $('#homeSearch').toggleClass('d-flex');
});

