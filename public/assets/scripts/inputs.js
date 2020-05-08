function verificationNumber(){
    var regex = /^(0[1-68])(?:[ _.-]?(\d{2})){4}$/;
    if(regex.test($("#phone").val()) ){
        $("#phone").removeClass("error");
        $("#myModal").modal("show");
    }else{
        $("#phone").addClass("error");
    }
}