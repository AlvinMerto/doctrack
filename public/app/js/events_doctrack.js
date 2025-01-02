var big_link    = "";
var small_link  = "";
var accttype    = "";
var load        = "";
var empslist    = [];

var documentid  = null;

$(document).ready(function(){
    var divisionid   = $(document).find("#offices").val();
    getpersonnel(divisionid);

    // load default
    big_link   = "incomming";
    small_link = 1;
    tab_action(big_link,small_link);

    accttype = $(document).find("#accttype").val();
    loa      = $(document).find("#loa").val();
    
    func_extbtn(loa, big_link);

    // theexternallink_needsaction
});

$(document).on("click",".tab_link_big", function(){
    big_link = $(this).data("action");

    tab_action(big_link,small_link);

    // func_extbtn(accttype, big_link);
    func_extbtn(loa, big_link);
   
});

$(document).on("click","#docslist .item_row", function(){
    empslist = [];
    $(document).find("#dialog_window").show();

    documentid = $(this).data("did");
    $.ajax({
        url     : url+"/display_data",
        type    : "get",
        data    : { docid : documentid },
        dataType: "html",
        success  : function(data) {
            $(document).find("#display_here").children().remove();

            $(data).appendTo("#display_here");

            getwindow("docdetails",documentid,"details_div");
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
    empslist = [];

    $(document).find("#display_here").children().remove();
    $(document).find("#dialog_window").hide();
});

$(document).on("click",".getwindow", function(){
    var getwhat   = $(this).data("getwhat");
    var displayto = $(this).data("displayto"); 

    empslist = [];
    getwindow(getwhat,documentid,displayto);
});

$(document).on("change","#offices", function(){
    var divisionid   = $(this).val();
    getpersonnel(divisionid);
});

    
    
// add employee to recipient's list
    $(document).on("click","#addemployee", function(){
        // if (empslist.length > 0) {
        //     alert("In the meantime, adding multiple employees to route the document to is not allowed.");
        //     return;
        // }

        var theemp_id     = $(document).find("#personnel :selected").val();
        var theemp_name   = $(document).find("#personnel :selected").text();

        empslist.push(theemp_id);

        //recipients 
        $("<li data-id='"+theemp_id+"'>"+theemp_name+"</li>").appendTo("#recipients");
    });

    $(document).on("click","#recipients li", function(){
        var conf = confirm("Are you sure you want to delete this item?");

        if (!conf) {
            return;
        }

        var empid = $(this).data("id");
     
        empslist.splice( empslist.indexOf(empid),1 );

        $(this).remove();
    });
// end 

$(document).on("click","#senddocument", function(){
    var values      = new Object();

    // var documentid  = $(this).data("did");
    var f_appro_act = $(document).find("#f_appro_act").is(":checked");
    var f_info      = $(document).find("#f_info").is(":checked");
    var f_ref       = $(document).find("#f_ref").is(":checked");
    var f_gd        = $(document).find("#f_gd").is(":checked");
    var f_rev_eval  = $(document).find("#f_rev_eval").is(":checked");
    var f_app_sig   = $(document).find("#f_app_sig").is(":checked");
    var f_inst      = $(document).find("#f_inst").is(":checked");

    var offices     = $(document).find("#offices").val();
    var office_name = $(document).find("#offices :selected").text();
    var about       = $(document).find("#about").val();

    // alert(office_name);
    // return;
    // forwarddocs :: endpoint
    
        values.actions  =  [];

        if (f_appro_act) {
            values.actions.push( $(document).find("#f_appro_act").val() );
        }

        if (f_info) {
             values.actions.push( $(document).find("#f_info").val() );
        }

        if (f_ref) {
             values.actions.push( $(document).find("#f_ref").val() );
        }

        if (f_gd) {
             values.actions.push( $(document).find("#f_gd").val() );
        }

        if (f_rev_eval) {
             values.actions.push( $(document).find("#f_rev_eval").val() );
        }

        if (f_app_sig) {
             values.actions.push( $(document).find("#f_app_sig").val() );
        }

        if (f_inst) {
             values.actions.push( $(document).find("#f_inst").val() );
        }

        values.offices      = offices;
        values.about        = about;
        values.emps         = empslist;
        values.documentid   = documentid;
        values.officename   = office_name;
        // console.log(values); return;
        // var vals = JSON.stringify(values);
        // console.log(vals);
        // console.log(values.serialize()); return;

        $.ajax({
            url      : url+"/forwarddocs",
            type     : "post",
            data     : {vals: JSON.stringify(values)},
            dataType : "json",
            success  : function(data) {
                if (data == true || data == "true") {
                    alert("File has been forwarded successfully!");
                    empslist = [];
                }
            }, error : function() {
                alert("error forwarding");
            }
        });
});

$(document).on("focus",".searchbox_div", function(){
    $(this).parent().parent().parent().parent().addClass("width_it");
}).focusout(function(){
    $(this).parent().parent().parent().parent().removeClass("width_it");
});

$(document).on("click",".small_link_click",function(){
    var status = $(this).data("status");
    small_link = status;

    tab_action(big_link, small_link);
});

$(document).on("change", "#typeofdoc", function(){
    if ( $(this).val() == "external" ) {
        $(document).find("#external_entry").show();
        $(document).find("#office_division").hide();
        $(document).find("#outgoing_div").hide();
    } else if ($(this).val() == "internal") {
        $(document).find("#external_entry").hide();
        $(document).find("#office_division").show();
        $(document).find("#outgoing_div").hide();
    } else if ( $(this).val() == "outgoing") {
        $(document).find("#external_entry").hide();
        $(document).find("#office_division").show();
        $(document).find("#outgoing_div").show();
    }

}); 

$(document).on("click","#completebtn", function(){
    var conf = confirm("Are you sure you want to proceed?");

    if (!conf) {
        return;
    }

    $.ajax({
        url      : url+"/completeroute",
        type     : "post",
        data     : { docid : documentid },
        dataType : "json",
        success  : function(data){
            if (data) {
                $(document).find("#display_here").children().remove();
                $(document).find("#dialog_window").hide();
            }
        }, error : function() {
            alert("error completing the document")
        }
    });
});

$(document).on("change","input[name=thefile]", function() {

    $('#uploadingtext').show();

    let fileData = new FormData();
        fileData.append('thefile', this.files[0]);
        fileData.append("docid",documentid);
        
        $.ajax({
            url: url+'/autoupload', // Laravel route
            method: 'POST',
            data: fileData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#uploadingtext').html('Uploading...');
            },
            success: function (response) {
                $('#uploadingtext').html('File uploaded successfully!');
            },
            error: function (xhr) {
                $('#uploadingtext').html('Error uploading file: ' + xhr.responseText);
            }
        });
});

$(document).on("keyup","#m_quicksearch_input", function() {
    var value = $(this).val().toLowerCase();
    $("#documents_list_table #docslist tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
 });

 $(document).on("click","#provideupdate", function(){
    $(document).find(".updatediv").show();
 });

 $(document).on("click",".close_this_window",function(e){
    e.preventDefault();
    
    var whatwindow = $(this).data("window");

    $(document).find("#"+whatwindow).hide();
 });

 $(document).on("click","#provideupdate_btn", function(){
    // alert( $(document).find("#completedcheck").is(":checked") );
    provideupdate( $(document).find("#updatebox").val() , documentid , $(document).find("#completedcheck").is(":checked"));
 });

 $(document).on("click","#dialog_window", function(){
   
 })