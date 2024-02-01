$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// Form Submit with AJAX Request Start
  $("#submitBtn").on('click', function (e) {
    $(e.target).attr('disabled', true);
    $(".request-loader").addClass("show");

    if ($(".iconpicker-component").length > 0) {
      $("#inputIcon").val($(".iconpicker-component").find('i').attr('class'));
    }

    let ajaxForm = document.getElementById('ajaxForm');
    let fd = new FormData(ajaxForm);
    let url = $("#ajaxForm").attr('action');
    let method = $("#ajaxForm").attr('method');


    if ($("#ajaxForm .summernote").length > 0) {
      $("#ajaxForm .summernote").each(function (i) {
        let content = $(this).summernote('code');

        fd.delete($(this).attr('name'));
        fd.append($(this).attr('name'), content);
      });
    }

    $.ajax({
      url: url,
      method: method,
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        $(e.target).attr('disabled', false);
        $('.request-loader').removeClass('show');

        $('.em').each(function () {
          $(this).html('');
        });
        if (data.status == 'success') {
           $('#phoneNumber').text(data.data.phone);
           $('#varifyModel').modal('show');
        }
      },
      error: function (error) {
        $('.em').each(function () {
          $(this).html('');
        });

        for (let x in error.responseJSON.errors) {
          document.getElementById('err_' + x).innerHTML = error.responseJSON.errors[x][0];
        }
        for (let x in error.responseJSON.c_errors) {
          document.getElementById('err_' + x).innerHTML = error.responseJSON.c_errors[x];
        }
        $('.request-loader').removeClass('show');
        $(e.target).attr('disabled', false);
      }
    });
  });
  $("#otpConfirm").on('click',function(e){
    e.preventDefault();
     let otp = $('.optcode').val();
     if(!otp){
      $('.error_otp').text('Otp code ia Required *');
      return false;
     }else{
      $(e.target).attr('disabled', true);
      $(".request-loader").addClass("show");
      $('.error_otp').text('');
      url = $(this).attr('data-url');
      $.ajax({
        url: url,
        method: 'POST',
        data:{
          otp: otp,
        },
        success: function (data) {
          if(data.status == 'warning'){
            $(e.target).attr('disabled', false);
            $(".request-loader").removeClass("show");
            $('.error_otp').text('Otp is Not match');
          }else{
            window.location.reload();
          }
        },
      });
     }
  });
  $("#otpCancel").on('click',function(e){
    e.preventDefault();
    url = $(this).attr('data-url');
    $.ajax({
      url: url,
      method: 'GET',
      success: function (data) {
        $('#varifyModel').modal('hide');
      },
    });


  });
//already send otp

