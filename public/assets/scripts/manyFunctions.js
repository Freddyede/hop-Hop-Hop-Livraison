function haveLogement (logement, elLogement){
    if(logement !== null){
        return true;
    }else{
        return addError([
            'vous n\'avez pas ou mal renseignez votre type d\'habitation (Maison / Appartements)'
        ],[
            elLogement
        ]);
    }
}
function acceptDigicode(digicode, elDigicode){
    switch (digicode){
        case '':
            
            addError(['vous n\'avez pas ou mal renseignez si vous aviez un digicode'],[elDigicode]);
            
            break;
        default :
            
            true;
            
            break;
    }
}


function acceptCodeDigicode(codeDigicode, elCodeDigicode){
    switch (codeDigicode){
        case '':
            
            addError([
                'Vous n\'avez pas ou mal renseignez votre code du digicode'
            ],[
                elCodeDigicode
            ]);
            
            break;
        default :
            
            true;
        break;
    }
}

function acceptTel(tel,elTel){
    var regex = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
    if(regex.test(tel)){
        return true;
    }
    addError([
        'vous n\'avez pas ou mal renseigné votre numéro de téléphone'
    ],[elTel]);
}