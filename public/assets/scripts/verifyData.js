function verifyData(logement, digicode, codeDigicode, tel, ville){
    var regex = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
    var error;
    var error2;
    switch (logement) {
        case 'Maison':
            // Tout good on retourne true;
            if(regex.test(tel) && ville !== ''){
                return true;
            }
            // Tout non renseigné
            else if(regex.test(tel) === false && ville !== ''){
                error = 'tel',
                error2 = 'city';
                addError('tel', $("#tel"), null, typeof $("#tel"),null);
            }
            // Ville non renseignée
            else if (regex.test(tel) === true && ville === ''){
                error = 'city';
                addError('tel', $("#tel"), null, typeof $("#tel"),null);
            }
            // Tel non renseigné
            else if (regex.test(tel) === false && ville !== ''){
                error = 'tel';
                addError('tel', $("#tel"), null, typeof $("#tel"),null);
            }
            break;
        case 'Appartements':
            // Tout good on retourne true;
            if(
                regex.test(tel) && 
                ville !== '' && 
                digicode !== null && 
                codeDigicode !== null
            ) {
                return true;
            }
            // Tout non renseignée
            else if(
                regex.test(tel) === false && 
                ville !== '' && 
                digicode !== null && 
                codeDigicode !== null
            ) {
                [error = 'tel',
                error2 = 'city'];
                addError('city', [typeof $("#city"), $("#city")]);
                addError([error,error2], null,  [typeof $("#city"), $("#city")], null,[typeof $("#city"), typeof $("#city")]);
            }
            // Ville non renseignée
            else if (
                regex.test(tel) === true && 
                ville === '' && 
                digicode !== null && 
                codeDigicode !== null
            ) {
                error = 'city';
                addError('city', $("#city"), null, typeof $("#city"),null);
            }
            // Tel non renseigné
            else if (
                regex.test(tel) === false && 
                ville !== '' && 
                digicode !== null && 
                codeDigicode !== null
            ) {
                error = 'tel';
                addError('tel', $("#tel"), null, typeof $("#tel"),null);
            }
            // digicode non renseigné
            else if (
                regex.test(tel) === true &&
                ville !== '' && 
                digicode === null && 
                codeDigicode !== null
            ){
                error = 'digicode';
                addError('digicode', $("#digicodeGood"), null, typeof $("#digicodeGood"),null);
            }
            // codeDigicode non renseigné
            else if (
                regex.test(tel) === true && 
                ville !== '' &&
                digicode !== null && 
                codeDigicode === null
            ) {
                error = 'codeDigicode';
                addError('codeDigicode', $("#numberDigicode"), null, typeof $("#numberDigicode"),null);
            }
            break;
        
        default:
            addError(null, "#commande_forms_residences");
            break;
    }
}