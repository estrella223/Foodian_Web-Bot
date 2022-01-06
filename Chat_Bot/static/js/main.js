$(function(){
  setPop();
});


// 팝업 세팅
function setPop() {
  var popOpenBtn = $('.popOpenBtnCmmn');

  //팝업 열기
  popOpenBtn.on('click',function(){
    var clickNum = $(this).attr('data-num');

    $('#popUp_'+clickNum).fadeIn(200);
  })

  //팝업 닫기
  $('.buttons, .chat-header-button pull-right').on('click',function(){
    var clickNum = $(this).attr('data-num');

    $('#popUp_1').fadeOut(200);
  })
}

function sendMessage(text, message_side) {
    let $messages, message;
    $('.message_input').val('');
    $messages = $('.messages');
    message = new Message({
        text: text,
        message_side: message_side
    });
    message.draw();
    $messages.animate({scrollTop: $messages.prop('scrollHeight')}, 300);
}


function greet() {
    setTimeout(function () {
        return sendMessage("안녕하세요. 저는 Foodian 봇이에요.", 'left');
    }, 1000);}


function send(){
    $('#divbox').append('<div class="msg_box send"><span>'+$('#input1').val()+'<span></div>');
    $("#divbox").scrollTop($("#divbox")[0].scrollHeight);
    console.log("serial"+$('form').serialize())
    $.ajax({
        url:  'http://127.0.0.1:8000/chat_service/',
        type: 'post',
        dataType: 'json',
        data: $('form').serialize(),
        success: function(data) {
            <!--$('#reponse').html(data.reponse);-->
            $('#divbox').append('<div class="msg_box receive"><span>'+ data.response +'<span></div>');
            $("#divbox").scrollTop($("#divbox")[0].scrollHeight);
        }
    });
    $('#input1').val('');
}