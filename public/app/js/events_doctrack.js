$(document).on("click",".tab_link_big", function(){
    tab_action($(this).data("action"),1);
})

$(document).on("click","#docslist tr", function(){
    $(document).find("#dialog_window").show();

    $.ajax({
        url     : url+"/display_data",
        type    : "get",
        data    : {},
        dataType: "html",
        success  : function(data) {
            $(document).find("#display_here").children().remove();

            $(data).appendTo("#display_here");
        }
    });
});

$(document).on("click","#forwarddoc", function(){
    $(document).find("#dialog_window").show();

    $.ajax({
        url     : url+"/forwarddocs",
        type    : "get",
        data    : {},
        dataType: "html",
        success  : function(data) {
            $(document).find("#display_here").children().remove();

            $(data).appendTo("#display_here");
        }
    });
});

$(document).on("click",".close_window", function(){
    $(document).find("#display_here").children().remove();
    $(document).find("#dialog_window").hide();
});

$(document).on("click",".getwindow", function(){
    var getwhat   = $(this).data("getwhat");
    var displayto = $(this).data("displayto"); 

    $.ajax({
        url     : url+"/"+getwhat,
        type    : "get",
        data    : {},
        dataType: "html",
        success  : function(data) {
            $(document).find("#"+displayto).children().remove();

            $(data).appendTo("#"+displayto);
        }
    });
});

