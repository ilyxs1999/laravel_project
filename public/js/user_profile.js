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
            timeout: 60000,
            data: data,
        }).done(function(  ) {
            showSuccessAlert();
        }).error(function (){
            showErrorAlert();
        });
});
$("#exampleModal").on('hide.bs.modal', function(){
    $('#exampleModal textarea').val('');
});

function showSuccessAlert(){
    let div = document.createElement('div');
    div.className = "alert alert-success alert-dismissible fade show";
    div.innerHTML = "Сообщение успешно отправлено!";
    console.log(div);
    $('#alert_container').prepend(div);
    setTimeout( function (){
        div.remove()
    }, 2000);
}

function showErrorAlert(){
    let div = document.createElement('div');
    div.className = "alert alert-success alert-dismissible fade show";
    div.innerHTML = "Ошибка при отправке!";
    console.log(div);
    $('#alert_container').prepend(div);
    setTimeout( function (){
        div.remove()
    }, 2000);
}




