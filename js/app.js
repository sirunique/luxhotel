$(window).scroll(function () {
    var sticky = $('.sticky'),
        scroll = $(window).scrollTop();
    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
})


$(document).ready(function () {
    $(document).on('click', '.btn-book', function () {
        var room_id = $(this).attr('id');
        var room_name = $(this).attr('room-name');
        loadPage(room_id, room_name);

    })
})

function loadPage(room_id, room_name) {
    $.ajax({
        url: 'Admin/include/process.php?get_room',
        method: 'POST',
        data: {
            'room_id': room_id,
            'room_name': room_name
        },
        dataType: 'JSON',
        success: function (data) {
            console.log(data);
        }
    })
}