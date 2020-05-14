$(document).ready(function (){
    $(".form-sending").hide();
});
function sendingData(){
    let regex = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
    let regexEtage = /^[0-9]$/;
    let phone = $("#phone");
    let etage = $("#etages");
    if(regex.test(phone.val()) ){
        if(phone.hasClass('error')){
            $("#phone").removeClass("error");
        }
        $(document).ready(function() {
            let Habitation = $("#commande_forms_residences").val();
            let phone =  $("#phone").val();
            console.log(phone);
            let city = ($("#city").val()).split(' ');
            if(Habitation === 'Maison') {
                $.ajax({
                    url : 'https://localhost:8000/fr/appoint/getData',
                    type : 'POST',
                    data :{
                        logement: Habitation,
                        tel: (phone),
                        villes: $("#city").val(),
                        zone: city[6]
                    },
                    success:function(){
                        $('.form-sending').empty().append(`
                            <div class="form-sending alert alert-success text-center">
                                Message envoyé
                            </div>
                        `);
                    }
                });
            }else if(Habitation === 'Appartements') {
                $.ajax({
                    url : 'https://localhost:8000/fr/appoint/getData', // La ressource ciblée
                    type : 'POST', // Le type de la requête HTTP.
                    data :{
                        logement: Habitation,
                        tel: phone,
                        etage: etage.val(),
                        ascenseur: $("#ascenseur:checked").val(),
                        hasDigicode: $("#digicodeGood:checked").val(),
                        codeDigicode: $("#numberDigicode").val(),
                        villes: $("#city").val(),
                        zone: city[6]
                    },
                    success:function(){
                        if($('.form-error-sending').length){
                            $(".form-error-sending").remove();
                        }
                        $('.form-sending').empty().append(`
                            <div class="form-sending alert alert-success text-center">
                                Message envoyé
                            </div>
                    `);
                    },
                });
            }
        });
    }else{
        $("#phone").addClass("error");
        $('.form-sending').empty().append(`
            <div class="form-error-sending alert alert-danger text-center">
                Oups error
            </div>
        `);
    }
}