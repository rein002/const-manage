$(function(){
    $(".button").mouseover(function(){
        $(this).css("color", "#FF773E")
                .css("border-color", "#FF773E");
    }).mouseout(function(){
        $(this).css("color", "#5D99FF")
                .css("border-color", "#5D99FF");
    });
});