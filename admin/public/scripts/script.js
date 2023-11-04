$(function () {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  $('.swalDefaultSuccess').click(function () {
    Toast.fire({
      icon: 'success',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });
  $('.swalDefaultError').click(function () {
    Toast.fire({
      icon: 'error',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });
  $('.swalDefaultWarning').click(function () {
    Toast.fire({
      icon: 'warning',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });

  $('#showing-edit-btn').click(() => {
    $('#button-aksi #btn-edit-data').toggleClass('show-btn');
    $('#button-aksi #btn-hapus-data').removeClass('show-btn');
  })

  $('#showing-hapus-btn').click(() => {
    $('#button-aksi #btn-hapus-data').toggleClass('show-btn');
    $('#button-aksi #btn-edit-data').removeClass('show-btn');
  })

  $('.form-group #show-password-input').click(() => {
    $('.form-group .password-input').toggleClass('show-btn');
  })

})