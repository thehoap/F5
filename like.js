$(document).ready(function() {
    $(".heart").click(function() {
        var id=$(this).attr("title");
        var i=$(this).children("ion-icon").attr("name");
        if(i=="heart"){
            // alert("Hello! I am an alert box!!");
            $(this).children("ion-icon").attr("name","heart-outline");
            
        }else if(i=="heart-outline"){
            //alert("Hello! I am an alert box!!dfsfdsfdsfdfsdfsdfds");
            $(this).children("ion-icon").attr("name","heart");
            
        }
        $.post("getlike.php",{data:id,how:'c'});
    });
});