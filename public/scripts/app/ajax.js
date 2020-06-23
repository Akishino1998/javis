// $('document').ready(function(){
//     var teknisi = $('#teknisi').val();
//     $.ajax({
//         url: window.location.origin + '/chathtml/'+teknisi,
//         type: 'GET',
//         success: function (res) {
//             // res = JSON.parse(res);
//             $('.chat').html(res);
//             // $('.chat').animate({scrollTop: document.body.scrollHeight},"fast");
//             $('.chat').animate({ scrollTop: $('.chat').height()+99999999 }, "fast");
//         }
//     });
// });
$(".kirim").click(function(){
    var token = $('#token').val();
    var teknisi = $('#teknisi').val();
    var percakapan = $('#percakapan').val();
    if(percakapan.length!=0){
        $.ajax({
            url: window.location.origin + '/chatinput',
            type: 'POST',
            data:{
                _token:token,
                teknisi:teknisi,
                percakapan:percakapan
            },
            success: function (res) {
                $('.chat').html(res);
                $('#percakapan').val('');
                // $('.chat').animate({scrollTop: document.body.scrollHeight},"fast");
                $('.chat').animate({ scrollTop: $('.chat').height()+99999999 }, "fast");
            }
        });
    }
  });

  $(".serviceklik").click(function(e){
    var teknisi = $(e.target).attr('data');
    $('#teknisi').val(teknisi);
    $.ajax({
        url: window.location.origin + '/chathtml/'+teknisi,
        type: 'GET',
        success: function (res) {
            // res = JSON.parse(res);
            $('.chat').html(res);
            // $('.chat').animate({scrollTop: document.body.scrollHeight},"fast");
            $('.chat').animate({ scrollTop: $('.chat').height()+99999999 }, "fast");
        }
    });
  });