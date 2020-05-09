function sendingData(){
    var regex = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
    if(regex.test($("#phone").val()) ){
        if($("#phone").hasClass('error')){
            $("#phone").removeClass("error");
        }
        $(document).ready(function() {
            let Habitation = $("#commande_forms_residences").val();
            let phone =  parseInt($("#phone").val());
            let city = $("#city").val();
            console.log(Habitation);
            console.log(phone);
            console.log(city);
     
        });
    }else{
        $("#phone").addClass("error");
    }
}