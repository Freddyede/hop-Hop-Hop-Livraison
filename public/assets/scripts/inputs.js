function verificationNumber(){
    var inputNumber = $("#phone").val();
    var regex = /[0-9]{10}/;
    if(regex.test(inputNumber)){
        alert("true");
    }else{
        alert("false");
    }
}

$(document).ready(function(){
    $('a#links').click(function() {
        return $('div.navbar-collapse.collapse').hide(1000);
    });
    $('button.navbar-toggle').click(function(){
        return $('div.navbar-collapse.collapse').toggle(1000);
    });
})
