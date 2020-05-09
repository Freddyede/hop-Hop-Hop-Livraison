$(document).on('change','#commande_forms_residences',function(){
    var containerAllQuestions= $("#select");
    if($('#commande_forms_residences').val() === 'Appartements'){
        containerAllQuestions.after(`
            <div class="form-group row" id="otherQuestions">
                <div class="col-sm-6 col-lg-6 text-center">
                    <p class="text-orange">
                        Avez-vous un digicodes :
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="digicodeGood" id="digicodeGood" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Oui
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="digicodeGood" id="digicodeGood" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Non
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="otherQuestions2">
                <div class="col-sm-6 text-center">
                    <p class="text-orange">
                        Code digicode :
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <input
                        id="numberDigicode"
                        type="number" class="form-control"
                        name="digicode" min="0"
                    />
                </div>
        </div>
        `)
    }else{
        $("#otherQuestions").remove();
        $("#otherQuestions2").remove();
    }
});