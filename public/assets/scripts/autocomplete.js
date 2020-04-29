var students = [];
var classes = [];
$.ajax({
    url:'https://localhost:8000/citys/lists',
    type:'GET',
    success:function(data){
        dataCity = JSON.parse(data);
        var dataCity = JSON.parse(data);
        dataCity.forEach(function (element){
            students.push(element.villes);
        });
    }
});

$(document).ready(function(){
    $('input#city').autocomplete({
        source: students
    })
})