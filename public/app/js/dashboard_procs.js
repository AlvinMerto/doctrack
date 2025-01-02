$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function tab_action(bigbutton , action) {
   $(document).find("#docslist").children().remove();
   $("<tr> <td> Loading... </td> </tr>").appendTo("#docslist");

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

function getwindow(getwhat,documentid, displayto) {
    $.ajax({
        url     : url+"/"+getwhat,
        type    : "get",
        data    : { docid : documentid },
        dataType: "html",
        success  : function(data) {
            $(document).find("#"+displayto).children().remove();

            $(data).appendTo("#"+displayto);
        }
    });
}

function getpersonnel(divisionid) {
        $.ajax({
            url     : url+"/getpersonnel",
            type    : "get",
            data    : { divid : divisionid },
            dataType: "html",
            success  : function(data) {
                $(document).find("#personnel").children().remove();
                $(data).appendTo("#personnel");
            }, error : function(){
                alert("error getting personnel")
            }
        });
}

function forwarddocs(values) {
    
}

function func_extbtn(accttype, big_link) {
    if (accttype == 1) { // || accttype == 2 || accttype == 3 || accttype == 4
        $(document).find("#theexternallink_needsaction").show();
    } else if (accttype != 1 && big_link == "needsaction"){
        $(document).find("#theexternallink_needsaction").hide();
    } else if (accttype != 1 && big_link == "incomming"){
        $(document).find("#theexternallink_needsaction").show();
    } else if (accttype != 1 && big_link == "inprocess"){
        $(document).find("#theexternallink_needsaction").hide();
    }
}

function provideupdate(update, docid, complete ) {
    $.ajax({
        url     : url+"/provideupdate",
        type    : "post",
        data    : { update : update , docid : docid , complete : complete },
        dataType: "json",
        success : function(data) {
            if (data) {
                alert("Update successfully saved");
            }
        }, error : function() {
            alert("error providing update");
        }
    });
}