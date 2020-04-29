if(document.documentElement.clientWidth <= 767){
    $(document).ready(function(){
        $('a#links').click(function() {
            return $('div.navbar-collapse.collapse').hide(1000);
        });
        $('button.navbar-toggle').click(function(){
            return $('div.navbar-collapse.collapse').toggle(1000);
        });
    })    
}
