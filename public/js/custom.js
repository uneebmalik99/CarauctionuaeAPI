
window.onload = function () {
   
    // Echo.join('user_status')
    // .here((users) => {
    //     for($i=0; $i < users.length; $i++) {
    //         $('#'+ users[$i].id + '_status').removeClass('offline_status');
    //         $('#'+ users[$i].id + '_status').addClass('online_status');
    //         $('#'+ users[$i].id + '_status').text('Online');
    //       }
    // })
    // .joining((user) => {
    //     $('#'+ user.id + '_status').removeClass('offline_status');
    //     $('#'+ user.id + '_status').addClass('online_status');
    //     $('#'+ user.id + '_status').text('Online');
    // })
    // .leaving((user) => {
    //     $('#'+ user.id + '_status').removeClass('online_status');
    //     $('#'+ user.id + '_status').addClass('offline_status');
    //     $('#'+ user.id + '_status').text('Offline');
    // })
    // .listen('UserStatusEvent', (data) => {
    // });

   
};

$(document).ready(() => {
    $(".chat_list").click(function () {
        $(".msg_history").html("");
        $(".msg_history").css("display", "block");
        receiver_id = $(this).attr("data-id");
    });

    $("#send_message").on("submit", function (e) {
        e.preventDefault();
        var message = $("#message").val();
        $.ajax({
            url: "/send_messages",
            type: "POST",
            data: {
                message: message,
                sender_id: sender_id,
                receiver_id: receiver_id,
            },
            success: function (data) {
                console.log(data);
            },
        });
    });
});
