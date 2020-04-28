var students = [];
$.ajax({
    url:'https://localhost:8000/citys/lists',
    type:'GET',
    success:function(data){
        dataCity = JSON.parse(data);
        var dataCity = JSON.parse(data);
        students['datas'] = students.concat(dataCity);
    }
});
function printList (list) {
    console.log(list);
    /*for (var i = 0; i < list.length; i++) {
        for (var student in list) {
            console.log(list[student].colors)
        }
    }*/
}

console.log(students);
students.forEach(function(item) {
    console.log(item);
})
printList(students.['datas']) // Tu fais appel de ta fonction en lui passant ta liste