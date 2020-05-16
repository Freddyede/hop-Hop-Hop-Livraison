$(document).on('change','#commande_forms_residences',function(){
    if($('#commande_forms_residences').val() === 'Appartements'){
        $("#select").after(`
            <div class="form-group row" id="otherQuestions">
                <div class="col-sm-6 col-lg-6 text-center">
                    <p class="text-orange">
                        A quel étage :
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <input type="text" class="form-control" name="stage" id="etages" />
                </div>
            </div>
            <div class="form-group row" id="otherQuestions1">
                <div class="col-sm-6 col-lg-6 text-center">
                    <p class="text-orange">
                        Avez-vous un ascenseur :
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="ascenseur" id="ascenseur" value="true" />
                            <label class="form-check-label text-orange" for="exampleRadios1">
                                Oui
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="ascenseur" id="ascenseur" value="false" />
                            <label class="form-check-label text-orange" for="exampleRadios1">
                                Non
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="otherQuestions2">
                <div class="col-sm-6 col-lg-6 text-center">
                    <p class="text-orange">
                        Avez-vous un digicodes :
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="digicodeGood" id="digicodeGood" value="true" />
                            <label class="form-check-label text-orange" for="exampleRadios1">
                                Oui
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="radio" name="digicodeGood" id="digicodeGood" value="false" />
                            <label class="form-check-label text-orange" for="exampleRadios1">
                                Non
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="otherQuestions3">
                <div class="col-sm-6 text-center">
                    <p class="text-orange">
                        Code digicode :
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <input
                        id="numberDigicode"
                        type="number" class="form-control"
                        name="digicode_number" min="0"
                    />
                </div>
        </div>
        `)
    }else{
        $("#otherQuestions").remove();
        $("#otherQuestions1").remove();
        $("#otherQuestions2").remove();
        $("#otherQuestions3").remove();
    }
});