var base_url = $('#base_url').val();
var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';



function savePay(){

const cars = new Array();


    var totalNum = $("#client").val();

    for(var i=0;i<totalNum;i++){    
        $.ajax({
            url: base_url+'admin/savePay',
            type: 'POST',
            data:{ 
                rep_id: $('#rep_name').find(":selected").val(),
                rep_name: $('#rep_name').find(":selected").text(),
                month: $('#month').find(":selected").val(),
                week: $('#week').find(":selected").val(),
                year: $('#year').find(":selected").text(),
                bonus: $('#bonus').val(),
                clientname: $("#clientname"+i).val(),
                commission: $("#commission"+i).val()
            },
            success: (res)=>{ 
                cars.push(res)
                console.log(cars.length.toString());
                console.log("num"+totalNum);  
                console.log(cars)
                if(cars.length.toString() === totalNum){
                     window.location.href = base_url + "admin/toPDF?pay_id="+cars.toString()+"&rep_id="+$('#rep_name').find(":selected").val(); 
                }
            }
        }); 
    }
  
}
function onlyNumberKey(evt) {
         
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
}

function fill(){
    // Number of inputs to create
    var number = document.getElementById("client").value;

    // Container <div> where dynamic content will be placed
    var container = document.getElementById("client-group");
    
    // Clear previous contents of the container
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }


    for (i=0;i<number;i++){

        var input = document.createElement("input");
        input.type = "text";
        input.name = "client" + i;
        input.id = "clientname" + i;
        input.placeholder = "Client Name    " + (i+1);
        input.className= "form-control mb-1"
        container.appendChild(input);

        var input2 = document.createElement("input");
        input2.type = "text";
        input2.name = "commission" + i;
        input2.id = "commission" + i;
        input2.placeholder = "Onlinesure Commission " + (i+1);
        input2.className= "form-control mb-1"
        container.appendChild(input2);
        
        container.appendChild(document.createElement("br"));

    }

}