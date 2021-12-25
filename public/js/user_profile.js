$("#send_message").click(function (){
    $('#exampleModal').modal('show');
});

$('#send_but').click(function (){
    let text = $('#exampleModal textarea').val();
    let addressee_id = window.location.href.split('/').pop();
    let data = {'text' : text , 'addressee_id' : addressee_id}
    $.ajax({
        type: "POST",
        url: "sendMessage",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: data,
    }).done(function( comment ) {
        console.log(comment);
    });
});
$("#exampleModal").on('hide.bs.modal', function(){
    $('#exampleModal textarea').val('');
});

