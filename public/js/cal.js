function calculateTotal() {
  var tot = 0
  $('input.myprice').each(function () {
    tot += Number($(this).val())
  })
  $("#total_value").text(tot);
  $("#value_total").val(tot);

  var total = 0
  $('input.myprice').each(function () {
    total += Number($(this).val())
  })
  $("#total_weight").text(total * 7); 
  $("#weight_value").val(total * 7);
}
$('.cubic_feet , .myprice').prop('readonly', true)

$(function () {
  $('.quantity , .cubic_feet').on('change keyup', calculateTotal)
})
$('.btn-toggle-show').click(toggleText('.inner-content'))

function toggleText(element) {
  return function (e) {
    $(this).parent().find(element).slideToggle(300)
    $(this).parent().find(element).toggleClass('para-hide')
    $(this).find('i').toggleClass('rotate')
  }
}
$('input').each(function (eq, el) {
  el = $(el)
  if (typeof el.attr('id') === 'undefined') {
    el.prop('id', 'id-' + eq)
    console.log(el.prop('id'))
  }
})

$('.quantity, .cubic_feet').on('input', function () {
  var quantity =
    parseFloat($(this).closest('.row').find('.quantity').val()) || 0
  var cubic_feet =
    parseFloat($(this).closest('.row').find('.cubic_feet').val()) || 0
  $(this)
    .closest('.row')
    .find('.myprice')
    .val(quantity * cubic_feet)
})

$('#print').click(function () {
  // alert($('.quantity').val() + '\n' + $('.cubic_feet').val()  + '\n' + $('.myprice').val());
  window.print()
})

{
  $('.child').hide()
  $('.parent')
    .children()
    .click(function () {
      $(this).children('.child').slideToggle('milliseconds')

      //select all the `.child` elements and stop the propagation of click events on the elements
    })
    .children('.child')
    .click(function (event) {
      $(this).children('.child').slideToggle('milliseconds')
      event.stopPropagation()
    })
}
