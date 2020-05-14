function addError(errors, el){
        $('#headerwrap').after(`
            <div class="row">
                <div class="col-12 text-center">
                    Oups ${ errors }
                </div>
            </div>
        `);
        $('div.form-sending').show();
    el.forEach(element => {
        $(element).addClass('error');
    });
}