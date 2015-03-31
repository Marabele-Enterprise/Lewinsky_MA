<div class="container" >       
	<div class="row">
		<h2>Message</h2>
		<div id="feedback">
		</div>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createMessage" >
			<span class="glyphicon glyphicon-plus"></span> New Message
		</button>
	</div>
</div>

<div class="modal-rows">

	<div class="modal fade" id="createMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Message</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmAddMessage" role="form"  onsubmit="return false" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="title">Subject</label>
							<div class="col-xs-10">
								<input id="subj" type="text" id="title" name="title" placeholder="Title" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="messageText">Message</label>
							<div class="col-xs-10">
							    <textarea id="messageText" rows="5"  cols='3' class="form-control"></textarea>
							</div>
						</div>															
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>doctor" >
					</div>
					<div class="modal-footer">
						<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="save" type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.modal rows-->

<div class="modal-rows">

	<div class="modal fade" id="editMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">New Message</h4>
				</div>
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<form class="form-horizontal" id="frmEditMessage" role="form"  onsubmit="return false" method="post" enctype="multipart/form-data"  >
					<div class="modal-body">
						<div id="e_feedback"></div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="title">Subject</label>
							<div class="col-xs-10">
								<input id="e_subj" type="text" id="title" name="title" placeholder="Title" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-2 control-label" for="e_messageText">Message</label>
							<div class="col-xs-10">
							    <textarea id="e_messageText" rows="5"  cols='3' class="form-control"></textarea>
							</div>
						</div>															
						<!-- The genericCreate controller requires you to specify the table you are inserting to -->
						<input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>message" >
					</div>
					<div class="modal-footer">
						<img src="<?php echo URL;?>public/img/loading.gif" class="loadingImg loader1" >
						<button id = "e_close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id = "e_save" type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.modal rows-->





<div class="modal-rows">

	<div class="modal fade" id="viewMessage">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- 
					*If you have select a create task, you can use a combination of the generic controller and jquery forms to simplify
					*the submitting of data to the database. Below is an example of how to use it. The input field names must
					*be the same as the attribute names in the table you are creating in. In the script tags, there is a jquery.forms
					*function for this form to make it use ajax. If your create requires multiple inserts, then you are gonna have to
					*create a new controller and model function to handle the process the way you want.
				-->				
				<div class="thumbnail">
				<table class="table table-bordered">
					<tr class="active"><td><b>Subject:</b></td><td id="v_subj" class="generic" data-field="title" data-set="innertext"></td></tr>
					<tr class="active"><td><b>Message:</b></td><td id="v_messageText" class="generic" data-field="initials" data-set="innertext"></tr>
                                        <tr class="active"><td><b>Date:</b></td><td id="v_date" class="generic" data-field="initials" data-set="innertext"></td></tr>
				</table>
                                    
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                
                        <br></div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.modal rows-->



<div class="container-fluid" >       
	<div class="row messageContainer">
		<!-- .doctorsContainer is the container the generic class will print in -->
		<div class="messageDesign col-xs-12 col-sm-4 col-md-4 col-lg-3" id="message_board">
			<!-- 
				.doctorDesign is the design for each row in the database. The generic class will print data 
				in the tags that have class="generic". The attribute data-field tells the system what field
				from the database you want to print in that tag. The attribute data-set tells it what to print
				to. Possible values for dataset=(innertext, value, src, href, ...).
			-->
	<!--		<div class="thumbnail">
				<table class="table table-bordered">
					<tr class="active"><td><b>Subject:</b></td><td id="m_subject" class="generic" data-field="title" data-set="innertext"></td>
					<td><b>Date:</b></td><td id="m_date" class="generic" data-field="initials" data-set="innertext"></td></tr>
				</table>
				<button class="btn btn-default btnEditMessage btn-sm" type="button" data-toggle="modal" data-target="#editMessage">Edit</button>
				<button class="btn btn-default btnDeleteMessage btn-sm" type="button">Delete</button>
			<br></div>-->
		</div>	
	</div>
</div>



<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/plugins/slick/slick.css">
<script type="text/javascript" src="<?php echo URL; ?>public/plugins/slick/slick.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/generic.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.2.min.js"></script>


    <!--?php $sr = Session::get("user_id");
        echo "<script>alert($sr)</srcipt>";
    ?-->
<script>
    
    var delivery = "";
    var handler = "../../Lewinsky_MA/application/controllers/functions.php";
    var save_id = "";
    var mtab = {"instruction":"get-table", "query":get_table("ms_text_message","")};
            


    
    
    $("#save").click(function(){
      //  alert($("#messageText").val());
        var message ="'"+$("#messageText").val()+"'"; var sub_ = "'"+$("#subj").val()+"'";
        var qu = "ms_text_message (message_subject, message_text, message_date)";
        if (sub_ == "") 
            sub_ = "NO SUBJECT";
        
        var quer = insert(qu,sub_+","+message+",NOW()");
        var msg = {"instruction":"insert", "query":quer}
        //alert("sec "+msg.query);
        ajax_call(msg,false);
       // alert("ayoo");
        window.location.reload();
        //alert(delivery);
//        window.location = handler;
        
        
    });
    /*
    var msg_ = {"instruction":"get-table", "query":get_table("ms_text_message","")}
        
    ajax_call(msg_,false);
    msg_ = "";*/
    
    //alert(delivery['1'][1]);
   
//    var arr = JSON.parse(delivery);
    populate();
    /*for(var i = 0; i < arr.length; i++)
    {
        msg_ += "--"+arr[i];
    }*/
    $("#m_subject").html(delivery[0][1]);
    $("#m_date").append(delivery[0][3]);
    
    //alert(delivery);
    //alert(delivery[0][0] +' --- '+delivery[0].length+" "+delivery.length);
    function populate()
    {
        var mtmp = {"instruction":"get-table", "query":get_table("ms_text_message","")}
            
        ajax_call(mtmp,false);
        mtmp = "";
        $('#messageBoard').html("");
        for(var i = 0; i < delivery.length; i++)
        {
            $("#message_board").append("<br>"+create_div(delivery[i][0],delivery[i][1],delivery[i][3]));    
        }
    }
    $(".btn.btn-default.btnEditMessage.btn-sm").click(function(){
       save_id = this.getAttribute("id");
       var arr = save_id.split("-");
        var m_id = arr[1];
        m_id= getIndex(m_id);
        $("#e_subj").val(delivery[m_id][1]);
       $("#e_messageText").val(delivery[m_id][2]);
       
       
    });
    $(".btn.btn-default.btnDeleteMessage.btn-sm").click(function(){
        save_id = this.getAttribute("id");
       var arr = save_id.split("-");
       
        var m_id = arr[1];
      //  alert(m_id-1);
        //$("#e_subj").val(delivery[m_id-1][1]);
        var hlp = delete_row("ms_text_message","WHERE message_id="+m_id);
        ajax_call(hlp,false);
     //   alert(delivery +" * "+ m_id);
        window.location.reload();
//        $("")
        //this.hide();
       //alert(delivery);
       //$("#e_messageText").val(delivery[m_id-1][2]);    
    });
    $("#e_save").click(function(){
        var arr = save_id.split("-");
        var m_id = arr[1];
        var esub = $("#e_subj").val();
        var mst = $("#e_messageText").val();
        
        var query = update("ms_text_message","message_date=NOW(), message_text = '"+mst+"', message_subject = '"+esub+"' ", "WHERE message_id="+m_id+" ");
        
        var tmp = {"instruction":"update","query":query};
        //alert(m_id+" - "+mst);
        //alert(delivery);
        
        ajax_call(tmp,false);
        window.location.reload();
        
        //alert(delivery)
    });
    
    $(".btn.btn-default.btnViewMessage.btn-sm").click(function(){
        save_id = this.getAttribute("id");
        var arr = save_id.split("-");
       
        var m_id = arr[1];
        m_id = getIndex(arr[1]);
        var hlp = get_table("ms_text_message","");
        hlp = {"instruction":"get-table", "query":hlp};
        ajax_call(hlp,false);
        $("#v_subj").html(delivery[m_id][1]);
        $("#v_messageText").html(delivery[m_id][2]);
        $("#v_date").html(delivery[m_id][3]);
    //    alert(delivery +" * "+ m_id);
       // window.location.reload();
//      
    });
    
    function getIndex(_id) {
        ajax_call(mtab,false);    
        for(var i = 0; i < delivery.length; i++)
        {
            if (delivery[i][0] == _id) {
                return i;
            }
        }
        return -1;
    }
    
//    alert("jjj");
    
    function insert(_TABLE, _LIST)
    {
        var query = "INSERT INTO "+_TABLE+" VALUES ("+_LIST+")";
        return query;
    }
    
    function update(_TABLE, _LIST, _CONDITION) {
        var query = "UPDATE "+_TABLE+" SET "+_LIST+" "+_CONDITION;
        return query;
    }
    
    function delete_row(_TABLE,_CONDITION) {
        var query  = "DELETE FROM "+_TABLE+" "+_CONDITION;
        query = {"instruction":"update","query":query};
        return query;
    }
    
    function get_table(_TABLE, _CONDITION)
    {
        var query = "SELECT* FROM "+_TABLE+" "+_CONDITION;
        return query;
    }
    
    
    
    //ajax function call
    function ajax_call(sample,_async)
    {
	//alert("first");
	$.ajax({
		url:handler,
		type:"post",
		dataType:"json",
		async:_async,
		data:sample,
		success:function(response){
			delivery = response;
		},
		error:function(jqXHR, textStatus, errorThrown){
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
	///alert("now");
    }
    function create_div(_mid,_subject,_date)
    {
   //     alert("khuliso");
   
             var _block = //'<table class="table table-bordered">'+'<tr id="msg_'+_mid+'">;
                            '<div class="thumbnail">'
                            +'<table id= "msg_'+_mid+'" class="table table-bordered">'
                                    +'<tr class="active"><td><b>Subject:</b></td><td id="m_subject-'+_mid+'" class="generic" data-field="title" data-set="innertext">'+_subject+'</td><tr>'                                   
                                    +'<tr class="active"><td><b>Date:</b></td><td id="m_date-'+_mid+'" class="generic" data-field="initials" data-set="innertext">'+_date+'</td></tr>' 
                            +'</table>'
                            +'<button id="edit-'+_mid+'" class="btn btn-default btnEditMessage btn-sm" type="button" data-toggle="modal" data-target="#editMessage">Edit</button>'
                            +'<button id="delete-'+_mid+'" class="btn btn-default btnDeleteMessage btn-sm" type="button" >Delete</button>'
                            +'<button id="view-'+_mid+'" class="btn btn-default btnViewMessage btn-sm" type="button" data-toggle="modal" data-target="#viewMessage">View</button>'
                            +'</div>';
//       alert("plural");
        return _block;
    }
    

    
</script>