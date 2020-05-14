function sending(Habitation, radio, phone, citys){
    if(Habitation === 'Maison' && radio === null) {
        if($('.form-error-sending').length){
            $( ".form-error-sending" ).remove();
        }
        $.ajax({
            url : 'https://localhost:8000/fr/appoint/getData',
            type : 'POST',
            data :{
                logement: Habitation,
                tel: (phone),
                villes: citys[0],
                zone: citys[2]+citys[3]
            },
            success:function(){
                $('#headerwrap').after(`
                    <div class="form-sending alert alert-success text-center mt-2 mb-2">
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
                hasDigicode: $("#digicodeGood:checked").val(),
                codeDigicode: $("#numberDigicode").val(),
                villes: citys[0],
                zone: citys[2]+citys[3]
            },
            success:function(){
                if($('.form-error-sending').length){
                    $(".form-error-sending").remove();
                }
                if($("div.form-sending.alert").hasClass('alert-danger')){
                    $("div.form-sending.alert").removeClass('alert-danger');
                }
                $("div.form-sending.alert").addClass('alert-success');
                $('.alert-success').after(`
                    <div class="row">
                        <div class="col-12 text-center">
                            Informations Envoyés
                        </div>
                    </div>
                `);
            },
        });
    }
}