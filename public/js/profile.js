$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let url  = window.location.href;
$(".profile_menu a[href = '"+url+"']").tab('show');

function validateEmail(email){
    const reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(email)){
        return true;
    } else {
        return "Не правильный email!"
    }
}

function validateName(name){
    if (name.length>=3){
        return true;
    } else {
        return "Не правильное имя!";
    }
}

function validateInputs($inputs){
    let validate = {"name": validateName, "email": validateEmail}
    let errors = [];

    $inputs.each(function (){
        let attrName = $(this).attr('name');
        let value = $(this).val();

        let result = validate[attrName](value);

        if (result!==true) {
            errors.push(result);
        }
    })

    if (errors.length>0) {
        return errors;
    } else {
        return true;
    }
}


function displayErrors(errors){
    $('.error_list').toggleClass('hidden');
    $container = $('.error_list ul');
    for(let error of errors){
        let el = $("<ul></ul>").text(error);
        $container.append(el);
    }
}

function cleanErrors(){
    $error_container = $('.error_list');
    if (!$error_container.hasClass('hidden')){
        $error_container.addClass('hidden');
        $('.error_list ul').empty();
    }

}

function getInputsValue($inputs){
    let info = [];
    $inputs.each(function () {
        let attrName = $(this).attr('name');
        info[attrName]=$(this).val();
    });
    return info;
}

$(document).ready(function (){

    let temp = [];
    $('.change_info img').click(function (){
        nameClass = $(this).parents("tr")[0].className
        $input = $("."+nameClass+" input");
        $input.toggleClass('edited')
        if ($input.attr('disabled')!==undefined) {
            temp[nameClass] = $input.val();
            $input.removeAttr('disabled');
            $input.val('');
            $input.focus();
        } else  {
            $input.val(temp[nameClass]);
            $input.attr('disabled','disabled');
        }
    })
    $('.save_info').click(function (){
        $edited_inputs = $('input.edited');
        let result = validateInputs($edited_inputs);
        if (result!==true) {
            cleanErrors();
            displayErrors(result);
        } else {
            cleanErrors();
            data = $edited_inputs.serialize();
            $.post('editUser', data,function (data, status){
                if(Array.isArray(data)) {
                    cleanErrors();
                    displayErrors(data);
                } else {
                    location.reload();
                }
            })
        }

    })
})

