var base_url = $('#base_url').val();
var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';

function signIn(){
    $.ajax({
        url: base_url+'admin/signIn',
        type: 'POST',
        data: {
            login_email:$("#login_email").val(),
            login_password:$("#login_password").val()
        },
        success: (res)=>{
            console.log(res);
            if(res!=0){
                 window.location.href = base_url + "admin" 
            } else{
                swal({title: "Oops!", text: "Invalid username or password!",type: "error"})
            }
        }
    });
}



