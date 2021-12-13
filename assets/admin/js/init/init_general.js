var base_url = $('#base_url').val();

function logout(){
    swal({
        title: "Logout?",
        text: "Do you want to logout?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Logout!",
        closeOnConfirm: false,
        confirmButtonColor: "#e11641",
        showLoaderOnConfirm: true,
    },
    ()=>{
        window.location.href = base_url+"admin/logout";
    });
}