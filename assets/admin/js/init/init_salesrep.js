var base_url = $('#base_url').val();
var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';

function saveRep(){
   
    console.log($('#repForm').serialize());

    if($("#full_name").val() == "" ){
        swal("Failed", "Sales Representative Name is required ", "error");
        return;
    }    

     if($("#com_per").val() > 100 || $("#com_per").val() < 0 ){
        swal("Failed", "Please input commision percentage from (0-100%) ", "error");
        return;
    }


    if($("#tax_rate").val() > 100 || $("#tax_rate").val() < 0 ){
        swal("Failed", "Please input tax rate from (0-100%)", "error");
        return;
    }



    $("#saveRep").buttonLoader('start');
   
   $.ajax({
        url: base_url+'admin/saveRep',
        type: 'POST',
        data: $('#repForm').serialize(),
        success: (res)=>{
            if(res==1){
                $("#saveComp").buttonLoader('stop');
                swal({ title: "Save", text: "Information successfully saved!",type: "success" },
                function(ret) {
                   location.replace(base_url+"admin/rep_profile");
                })
            }else{
                $("#saveEvent").buttonLoader('stop');
                swal("Failed", "Something went wrong,Please try again!", "error");
            }
        }
    });
}

function onlyNumberKey(evt) {
         
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }