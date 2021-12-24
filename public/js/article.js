$('.add_comment button').click(function (){
    let id = window.location.href.split('/').pop();
    let text = $('.add_comment textarea').val().trim()
    $.ajax({
        type: "POST",
        url: "addComment/"+id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { text: text }
    }).done(function( comment ) {
        console.log(comment);
        if(comment) {
            $(".comments").prepend(comment);
        }
    });

})
