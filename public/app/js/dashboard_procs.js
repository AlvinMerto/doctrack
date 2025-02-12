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

            
            if (getwhat == "docdetails") {
                var atts = $(document).find("#thefiles").val();
                display_atts(atts);
            }

            var divisionid   = $(document).find("#offices").val();
            getpersonnel(divisionid);
        }
    });
}

function display_atts(atts) {
    var files = JSON.parse(atts);
    // console.log(files);
    for(var i = 0; i <= files.length-1; i++) {
        $("<li id="+i+"_attp_text"+"> <i class='la la-chevron-right'></i> <p data-fileloc="+JSON.stringify(files[i].thefilelocation)+"> "+files[i].thefile+" </p></li>").appendTo("#attachments_ul");
    }

    display_to_embed(files[files.length-1].thefilelocation, files.length-1+"_attp_text");
}

function display_to_embed(src, count) {
    var embedfile  = $(document).find("#theembed_file");
    var asset      = embedfile.data('asset'); // asset
    
    embedfile.attr({
        src : asset+"/"+src
    });

    $(document).find("#attachments_ul li").removeClass("selected_p");
    $(document).find("#"+count).addClass("selected_p");
}

function getpersonnel(divisionid) {
    // alert(url);
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

function provideupdate(update, docid, complete , somefunction = false) {
    //alert(complete); return;
    $.ajax({
        url     : url+"/provideupdate",
        type    : "post",
        data    : { update : update , docid : docid , complete : complete },
        dataType: "json",
        success : function(data) {
            //if (data) {
                alert("Update successfully saved");

                if (somefunction != false) {
                    somefunction();
                }
            //}
        }, error : function() {
            alert("error providing update");
        }
    });
}

function bookmarkthis(documentid, dis) {
    $.ajax({
        url         : url+"/bookmarkthis",
        type        : "post",
        data        : { docid : documentid },
        dataType    : "json",
        beforeSend  : function() {
            $("<small class='bookmarking'> Bookmarking... </small>").appendTo(dis);
        }, success  : function(data) {
            if (data) {
               // alert("Bookmarked Successfully");
            } else {
               // alert("Already added to bookmark");
            }

            getbookmarks("bookmarkslist");
            $(document).find(".bookmarking").remove();
        }
    })
}

function getbookmarks(displayto) {
    $.ajax({
        url        : url+"/getbookmarks",
        type       : "get",
        data       : { },
        dataType   : "html",
        beforeSend : function() {
            $(document).find("#"+displayto).children().remove();
            $("<small> Loading your bookmarks...</small>").appendTo("#"+displayto);
        }, success : function(data) {
            $(document).find("#"+displayto).children().remove();
            $(document).find("#"+displayto).html(data);
        }
    })
}

function get_alldocs(action, displayto = "docslist") {
    $.ajax({
        url      : url+"/alldocs",
        type     : "post",
        data     : { action : action },
        dataType : "html",
        beforeSend : function() {
            
        },
        success  : function(data) {
            $(document).find("#"+displayto).children().remove();
            $(document).find("#"+displayto).html(data);
        } 
    });
}

function get_done_docs(action, displayto = "docslist") {
    $.ajax({
        url      : url+"/donedocs",
        type     : "post",
        data     : { action : action },
        dataType : "html",
        beforeSend : function() {
            
        },
        success  : function(data) {
            $(document).find("#"+displayto).children().remove();
            $(document).find("#"+displayto).html(data);
        } 
    })
}

function removebookmark(did) {

    $.ajax({
        url         : url+"/removebookmark",
        type        : "post",
        data        : { did : did },
        dataType    : "json",
        beforeSend  : function() {

        }, success  : function(data) {
            getbookmarks("bookmarkslist");
        }
    });
}

function print_div(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}