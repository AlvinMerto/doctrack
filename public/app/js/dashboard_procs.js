$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function tab_action(bigbutton , action) {
   $.ajax({
        url      : url+"/getdocs",
        type     : "post",
        data     : { bigbutton : bigbutton, action : action },
        dataType : "html",
        success  : function(data) {
            $(document).find("#docslist").children().remove();
            $(data).appendTo("#docslist");
        },
        error : function() {
            alert("error");
        }
   })
}