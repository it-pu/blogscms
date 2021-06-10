<?php $AuthDivisionCrud = array(16,12); ?>
<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Content</a>
				</li>
				<li class="current">
					<a href="<?= base_url('content/article')?>" title="">Article</a>
				</li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="page-title">
				<h3><b>Article</b></h3>
				
			</div>

		</div>
		<!-- /Page Header -->

		<!--=== Page Content ===-->
		<div class="row">
			<div class="col-md-12">
				<dl>
					<a data-toggle="modal" href="#myModal"><button class="btn btn-primary"><i class="icon-plus"></i> New Article</button></a>
					<!-- <?php if (in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)): ?>
					<button class="btn btn-success btnSubmitTopic"> Submit Topic</button>
					<?php endif ?> -->
				</dl>
			</div>
		</div>

		<!--=== Responsive DataTable ===-->
		<div class="row">
			<div class="col-md-12">
				<div class="widget box">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i> Article Table </h4>
						<div class="toolbar no-padding">
							<div class="btn-group">
								<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
							</div>
						</div>
					</div>
					<div class="widget-content no-padding">
						<table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable">
							<thead>
								<tr>
									<?php if (in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)): ?>
									<th class="">
										Show Topic
									</th>
									<?php endif ?>
									<th data-class="expand"  style="width:32%;">Title</th>
									<th>Author</th>
									<th style="width:5%;">Visit</th>
									<th data-hide="phone">Create Date</th>
									<th data-hide="phone,tablet">Status</th>
									<th> Action </tr>
								</tr>
							</thead>
							<tbody id="show_data">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /Responsive DataTable -->
		<!-- /Page Content -->
	</div>
	<!-- /.container -->

</div>

<!-- ======== add article modal ======= -->
<div class="modal fade bs-example-modal-lg" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">New Article Form</h3>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal row-border" action="#" id="form">
					<div class="alert alert-success fade in none" id="alert">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> The article has been successfully added.
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Title:</label>
						<div class="col-md-9"><input class="form-control" type="text" name="title" id="title" placeholder="Title">
						 <span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">Category:</label>
						<div class="col-md-9">
							
							<select class="form-control" name="category" id="category">
								<option value="">Select</option>
							</select>
							 <span class="help-block"></span>
								
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Images Upload:</label>
						<div class="col-md-9">

							<input type="file" name="photo" class="required" accept="image/*" data-style="fileinput" data-inputsize="medium" >
							<p class="help-block">* Max size 2MB</p>
							<p class="help-block">* Images only (image/jpg/jpeg/png*) and 1000px width X 600px height</p>
							<p class="help-block">*<a href="https://compressjpeg.com/" target="_blank"> Compress Images Online</a></p>
							<span for="photo" class="error help-block" id="error" generated="true" ></span>
							<!-- <span class="help-block"></span> -->
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-md-2 control-label">Url:</label>
						<div class="col-md-9"><input type="text" name="url" id="url" placeholder="https://www.youtube.com/watch?v=xsxxxxx" class="form-control">
						 <span class="help-block"></span>
						</div>
					</div> -->
					<div class="form-group">
						<label class="col-md-2 control-label">Content:</label>
						<div class="col-md-9">
							<textarea rows="5" name="content" id="Description1" class="form-control"></textarea>
						 <span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">Status:</label>
						<div class="col-md-9">
						
							<select class="form-control" name="status" id="status">
								<option value="">Select</option>
								<option value="Published">Published</option>
								<option value="Draft">Draft</option>
							</select>
							 <span class="help-block"></span>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Post To:</label>
						<div class="col-md-9">
							<?php $AS = (!in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)) ? $this->session->userdata('AS') : $Arr_ASmaster  ?>
							<select class="form-control" name="ID_master_group" id="PostTo">
								<?php for ($i=0; $i < count($AS) ; $i++): ?>
									<?php $selected = ($AS[$i]['ID_master_group'] == 0) ? 'selected' : '' ?>
									<option value="<?php echo $AS[$i]['ID_master_group'] ?>"><?php echo $AS[$i]['MasterGroupName'] ?></option>
								<?php endfor ?>
							</select>
							 <span class="help-block"></span>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Sub Post:</label>
						<div class="col-md-9">	
							<select class="form-control" name="ID_set_group" id="PostSub">
								<option value="">Select</option>	
							</select>
							<span class="help-block"></span>
						</div>
					</div>
				
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary pull-right" id="btn_save" style="margin-left:30px">Save</button> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- ======== edit article modal ======= -->
<div class="modal fade bs-example-modal-lg" id="modal_edit" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Article Form</h3>
            </div>
           
            <div class="modal-body form">
                 <form class="form-horizontal row-border" action="#" id="form1">
                	<input class="form-control" type="hidden" name="idtitle_edit" id="idtitle_edit" placeholder="Title">
					<div class="alert alert-success fade in none" id="alert1">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> The article has been successfully update.
					</div>
					<div class="alert alert-danger fade in none" id="alert2">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Failed!</strong> The article has been failed update.
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Title:</label>
						<div class="col-md-9"><input class="form-control" type="text" value="" name="title_edit" id="title_edit" placeholder="Title">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">Category:</label>
						<div class="col-md-9">
						
							<select class="form-control" name="category_edit" id="category_edit">

								
							</select>
							
						</div>
					</div>
					<div class="form-group" id="photo-preview">
                        <label class="col-md-2 control-label">Photo</label>
                        <div class="col-md-9">
                            (No photo)
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">Image Upload:</label>
						<div class="col-md-9">

							<input type="file" name="photo" id="photo_edit"  accept="image/*" data-style="fileinput" data-inputsize="medium">
							<p class="help-block">Images only (image/jpg/jpeg/png*) and 1000px width X 600px height</p>
							<div for="photo" class="error help-block" id="error-edit" generated="true" ></div>
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-md-2 control-label">Url:</label>
						<div class="col-md-9"><input type="text" name="url_edit" id="url_edit" placeholder="https://www.youtube.com/watch?v=xsxxxxx" class="form-control">
						</div>
					</div> -->
					<div class="form-group">
						<label class="col-md-2 control-label">Content:</label>
						<div class="col-md-9">
							<textarea rows="5"  name="content_edit" id="Description2" class="form-control "></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">Status:</label>
						<div class="col-md-9">
							
							<select class="form-control" name="status_edit" id="status_edit">
								<option value="">Select</option>
								<option value="Published">Published</option>
								<option value="Draft">Draft</option>
							</select>
								
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-md-2 control-label">AS:</label>
						<div class="col-md-9">
							<?php $AS = (!in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)) ? $this->session->userdata('AS') : $Arr_AS  ?>
							<select class="form-control" name="ID_set_group" id="ID_set_group">
								<?php for ($i=0; $i < count($AS) ; $i++): ?>
									<?php $selected = ($AS[$i]['ID_set_group'] == 0) ? 'selected' : '' ?>
									<option value="<?php echo $AS[$i]['ID_set_group'] ?>"><?php echo $AS[$i]['GroupName'] ?></option>
								<?php endfor ?>
							</select>
							 <span class="help-block"></span>
							
						</div>
					</div> -->

					<div class="form-group">
						<label class="col-md-2 control-label">Post To:</label>
						<div class="col-md-9">
							<?php $AS = (!in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)) ? $this->session->userdata('AS') : $Arr_ASmaster  ?>
							<select id="PostToEdit" onclick="Post_onclik()" class="form-control" name="EditID_master_group" >
								<?php for ($i=0; $i < count($AS) ; $i++): ?>
									<?php $selected = ($AS[$i]['ID_master_group'] == 0) ? 'selected' : '' ?>
									<option value="<?php echo $AS[$i]['ID_master_group'] ?>"><?php echo $AS[$i]['MasterGroupName'] ?></option>
								<?php endfor ?>
							</select>
							 <span class="help-block"></span>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Sub Post:</label>
						<div class="col-md-9">	
							<select id="PostSubEdit" class="form-control" name="EditID_set_group" >
								<option value="">No Select</option>	
							</select>
							<span class="help-block"></span>
						</div>
					</div>
					<!-- <div class="form-actions">
						<button class="btn btn-primary pull-right" id="btn_save"><i class="icon-check"></i> Submit</button>
					</div> -->
				
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary pull-right" type="Submit" id="btn_update" style="margin-left:30px"> Save</button> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--MODAL DELETE-->
<form>
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Delete Article</h5>
        
      </div>
      <div class="modal-body">
           <strong>Are you sure to delete this record?</strong>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="idtitle" id="idtitle" class="form-control">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" type="submit" id="btn_delete" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--END MODAL DELETE-->


<script type="text/javascript">
	// var save_method;
	$(document).ready(function () {	
		show_article();
		show_category();
		show_category_edit();
	});
	$('#Description1').summernote({
            placeholder: 'Text your announcement',
            tabsize: 2,
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            fontsize: '14',
            callbacks: {
                  onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text');
                    e.preventDefault();
                    var div = $('<div />');
                    div.append(bufferText);
                    div.find('*').removeAttr('style');
                    setTimeout(function () {
                      document.execCommand('insertHtml', false, div.html());
                    }, 10);
                  }
                }
        });
	$('#Description2').summernote({
            placeholder: 'Text your announcement',
            tabsize: 2,
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            fontsize: '14',
            callbacks: {
              	onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text');
                    e.preventDefault();
                    var div = $('<div />');
                    div.append(bufferText);
                    div.find('*').removeAttr('style');
                    setTimeout(function () {
	                      document.execCommand('insertHtml', false, div.html());
	                    }, 10);
                  	}
                }
        });
 	// ===== Category ====== //
	function show_category(){
        $.ajax({
            type  : 'ajax',
            url   : base_url_js +'show_category',
            async : true,
            dataType : 'json',
            success : function(data){
            	var html = '';
            	// var i;
            	for(i=0; i<data.length; i++){
            	 	html += '<option value="'+data[i].ID_category+'">'+data[i].Name+'</option>';
				}
                $('#category').html(html);
            }
        });
	}
	function show_category_edit(){
        $.ajax({
            type  : 'ajax',
            url   : base_url_js +'show_category',
            async : true,
            dataType : 'json',
            success : function(data){
            	var html = '';
            	// var i;
            	for(i=0; i<data.length; i++){
            	 	html += '<option value="'+data[i].ID_category+'">'+data[i].Name+'</option>';
				}
                $('#category_edit').html(html);
            }
        });
	}

	// ======== change Post to ======= //
		
		$('#PostTo').on('change', function() {
		  var ID_master_group = $('#PostTo').val();
		  if(ID_master_group != '')
		  {
			$.ajax({
				type  : 'ajax',
				url   : base_url_js +'c_content/change_post_to',
				method:"POST",
				data:{ID_master_group:ID_master_group},
				success:function(data)
				{
				 	$('#PostSub').html(data);
				}
			});
		  }
		  else
		  {
		   $('#PostSub').html('<option value="">Selected</option>');
		  }
	 	});
	/// ===========
	function Post_onclik(){
	 	$('#PostToEdit').on('change', function() {
		  var ID_master_group = $('#PostToEdit').val();
		  if(ID_master_group != '')
		  {
			$.ajax({
				type  : 'ajax',
				url   : base_url_js +'c_content/change_post_to',
				method:"POST",
				data:{ID_master_group:ID_master_group},
				success:function(data)
				{
				 	$('#PostSubEdit').html(data);
				}
			});
		  }
		  else
		  {
		   $('#PostSubEdit').html('<option value="">Selected</option>');
		  }
	 	});
	 }
	// ===== View List Data ==== //
	//function show all article

	function show_op_topic(dt){
		var Arr_Topic = <?php echo $Arr_Topic ?>;
		var html = '<select class = "form-control opTopic">';
		var bool = false;
		var ID_topicSelected = '';
		if (dt.length > 0) {
			for (var i = 0; i < Arr_Topic.length; i++) {
				var ID_topic = Arr_Topic[i].ID_topic;
				for (var j = 0; j < dt.length; j++) {
					if (ID_topic == dt[j].ID_topic) {
						ID_topicSelected = ID_topic;
						bool = true;
						break;
					}
				}

			}
		}

		for (var i = -1; i < Arr_Topic.length; i++) {
			if (i==-1) {
				var selected = (!bool) ? 'selected' : '';
				html += '<option value = "" '+selected+' >--None--</option>';
			}
			else
			{
				var selected = (Arr_Topic[i].ID_topic == ID_topicSelected) ? 'selected' : '';
				html += '<option value = "'+Arr_Topic[i].ID_topic+'" '+selected+' >'+Arr_Topic[i].Name_topic+'</option>';
			}
		}

		html += '</select>';
		return html;
	}

    function show_article(){
        $.ajax({
            type  : 'ajax',
            url   : base_url_js +'__load_article',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var url_article = base_url_js +'edit_article';
                for(i=0; i<data.length; i++){
                	var show_topic = data[i].show_topic;
                	var OPhtmlTopic = show_op_topic(show_topic);
                	var tdTitle = data[i].Title;
                	// <?php if (in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)): ?>
                	// 	tdtopic = '<td><div class ="col-md-12 btnSubmitTopic">'+OPhtmlTopic+'</div></td>';
                	// 	// tdTitle = '<div class="col-md-8>">'+data[i].Title+'</div>';
                	// <?php endif ?>

                    html += '<tr idtitle = "'+data[i].ID_title+'">';

						<?php if (in_array($this->session->userdata('DivisionID') , $AuthDivisionCrud)): ?>

                    html +=	'<td><div class ="col-md-12 btnSubmitTopic">'+OPhtmlTopic+'</div></td>';

						<?php endif ?>                       

                    html += '<td>'+data[i].Title+'</td>'+
                            '<td>'+data[i].UpdateBY+' As '+data[i].GroupName+'</td>'+
                            '<td><span style="    font-size: 12px; color: #bd362f;font-weight: 600;"><i class="glyphicon glyphicon-eye-open"></i> ' +data[i].Tot_Visit+' Kali</span></td>'+
                            '<td>'+data[i].CreateAT+' </td>'+
                            '<td><span class="label '+data[i].Status+'">'+data[i].Status+' </span> </td>'+
                            '<td style="text-align:left;">'+
                                '<a href="#modal_edit" id="show_edit_article"  data-toggle="modal"  class="btn btn-info btn-sm " data-idtitle="'+data[i].ID_title+'" data-category="'+data[i].ID_category+'" data-content="'+jwt_encode(data[i].Content,'UAP)(*')+'" data-images="'+data[i].Images+'" data-title="'+data[i].Title+'" data-url="'+data[i].Url+'" data-status="'+data[i].Status+'" data-ID_master_group = "'+data[i].ID_master_group+'" data-ID_set_group = "'+data[i].ID_set_group+'" data-GroupName = "'+data[i].GroupName+'" onClick="edit_artikel()">Edit</a>'+' '+
                                '<a href="#modal_delete" data-toggle="modal" class="btn btn-danger btn-sm item_delete" data-idtitle="'+data[i].ID_title+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                    // content +=''+data[i].Content+'';

                }
                $('#show_data').html(html);
                // $('a').attr('data-content', content);
            }

        });
    }

    	// ===== View Data Edit ====== //
    function edit_artikel(){
		$('#show_data').on('click','#show_edit_article',function(){

			var id = $(this).data('idtitle');
			var title = $(this).data('title');
			var category = $(this).data('category');
			var content = jwt_decode($(this).attr("data-content"));
			var url = $(this).data('url');
			var status = $(this).data('status');
			var images = $(this).data('images');
			var id_master_group = $(this).data('id_master_group');
			var id_set_group = $(this).data('id_set_group');
			var groupname = $(this).data('groupname');
			
		    //Ajax Load data from ajax
            $('[name="idtitle_edit"]').val(id);
            $('[name="title_edit"]').val(title);
            $('[name="EditID_master_group"]').val(id_master_group).trigger('change');
            // $('[name="EditID_set_group"]').val(id_set_group).trigger('change');
            $('select[name="EditID_set_group"]').append('<option value="'+ id_set_group +'" selected>'+ groupname +'</option>').trigger('change');

            // $('[name="category_edit"]').val(category);
            $("#category_edit option").filter(function() {
               //may want to use $.trim in here
               return $(this).val() == category; 
            }).prop("selected", true);
            
            // $("#PostTo option").filter(function() {
            //    //may want to use $.trim in here
            //    return $(this).val() == ID_master_group; 
            // }).prop("selected", true);

            // $("#PostSubEdit option").filter(function() {
            //    //may want to use $.trim in here
            //    return $(this).val() == id_set_group; 
            // }).prop("selected", true);

            // $('#show_cat_edit_edit').append('<option value="'+category+'" selected>'+category+'</option>');
            $('[name="content_edit"]').summernote("code",content);
            // $('[name="content_edit"]').val(content);
            $('[name="url_edit"]').val(url);
            $('[name="status_edit"]').val(status);
            // $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
            // $('.modal-title').text('Edit Article Form'); // Set title to Bootstrap modal title
 
            $('#photo-preview').show(); // show photo preview modal
 
            if(images !=='')
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url_js+'upload/'+images+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<div class="hide"><input type="checkbox" name="remove_photo" value="'+images+'" checked/> Remove photo when saving</div>'); // remove photo
 
            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }

            // set default alert none
            $('#alert1').addClass('none');
            $('#alert1').removeClass('active');

        });
	}
   // ====== Save ===== //

    //function add all article
    $('#btn_save').on('click',function(){
    		
    		$('#btn_save').text('saving...'); //change button text
    		$('#btn_save').attr('disabled',true); //set button disable
    		
            var formData = new FormData($('#form')[0]);
            formData.append("summernote", $('.note-editable').text() );
            $.ajax({
                type : "POST",
                url  : base_url_js +'__save_article',
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,
                dataType : "JSON",
                data : formData,
                success: function(data){
                  
			       if(data.status) //if success close modal and reload ajax table
		            {
		                $('#btn_save').text('save'); //change button text
            			$('#btn_save').attr('disabled',false); //set button enable 
            			document.getElementById("form").reset();

            			$('#alert').addClass('active');
            			$('#alert').removeClass('none');
            			$('#myModal').modal('hide');
                		show_article();
                		edit_artikel();
                		window.location.reload();
		            }
		            else
		            {

		                for (var i = 0; i < data.inputerror.length; i++) 
		                {
		                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
		                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
		                    $('#error').text(data.error_string[i]);  
		                }

		            }
		            // $('.error').text(data.error_string[i]);	
			       	$('#btn_save').text('save'); //change button text
            		$('#btn_save').prop('disabled',false); //set button enable 

			    },
			    error: function (data)
		        {
		            
		            $('#btn_save').text('save'); //change button text
		            $('#btn_save').prop('disabled',false); //set button enable 
		 
		        }
            });
            return false;
        });

    // ===== Update ====== //
    //function edit article
    
    $('#btn_update').on('click',function()
		{
    		$('#btn_update').text('saving...'); //change button text
    		$('#btn_update').attr('disabled',true); //set button disable
    		

    		var formData = new FormData($('#form1')[0]);
    		formData.append("summernote", $('.note-editable').text() );
            $.ajax({
                type : "POST",
                url  : base_url_js +'__update_article',
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,
                dataType : "JSON",
                data : formData,
                // async:false,
                success: function(data){
                	// console.log(data);
			       	if(data.status) //if success close modal and reload ajax table
		            {
            			$('#alert1').addClass('active');
            			$('#alert1').removeClass('none');
            			$('#error').removeClass('error');
            			setTimeout(function(){ 
				                $('#btn_update').text('Save'); //change button text
		            			$('#btn_update').attr('disabled',false); //set button enable 
		            			document.getElementById("form1").reset();

		            			$('[name="idtitle_edit"]').val("");
					            $('[name="title_edit"]').val("");
					            $('[name="url_edit"]').val("");
					            $('[name="status_edit"]').val("");
            					$('#modal_edit').modal('hide');
            				 }, 1000);
            			
                		show_article();
                		edit_artikel();
                		window.location.reload();
		            }
		            else
		            {
		                for (var i = 0; i < data.inputerror.length; i++) 
		                {
		                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
		                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
		                    $('#error-edit').text(data.error_string[i]);
		                }

		                $('#alert1').addClass('active');
            			$('#alert1').removeClass('none');

				       	$('#btn_update').text('Save'); //change button text
	            		$('#btn_update').prop('disabled',false); //set button enable 
		            }
		            $('#error').removeClass('error');
			    },
			    error: function (data)
		        {

		            $('#btn_update').text('Save'); //change button text
		            $('#btn_update').prop('disabled',false); //set button enable 
		 
		        }
            });
            return false;
        });

 	//get data for delete record
    $('#show_data').on('click','.item_delete',function(){
        var idtitle = $(this).data('idtitle');
         
        // $('#modal_delete').modal('show');
        $('[name="idtitle"]').val(idtitle);
    });

     // ======= Delete ======= //
    $('#btn_delete').on('click',function()
	{
		var id =  $('#idtitle').val();
        $.ajax({
            url :  base_url_js +'__delete_article',
            type: "POST",
            dataType: "JSON",
            data:{id:id},
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_delete').modal('hide');
                show_article();
            },
            error: function (data)
            {
                alert('Error deleting data');
            }
        });
	 	return false;
	});

    $(document).off('change', '.btnSubmitTopic').on('change', '.btnSubmitTopic',function(e) {
    	var selectorbtn = $(this);
    	var arr = [];
    	$('.opTopic').each(function(e){
    		var v = $(this).find('option:selected').val();
    		var idtitle = $(this).closest('tr').attr('idtitle');
    		if (v != '') {
    			var temp = {
    				ID_article : idtitle,
    				ID_topic : v,
    			}

    			arr.push(temp);
    		}
    		
    	})
    	if (confirm('Are you sure ? ')) {
    		loading_button2(selectorbtn);
    		var url = base_url_js+"__show_topic";
    		var token = jwt_encode(arr,'UAP)(*');
    		AjaxSubmit(url,token).then(function(response){
    		    if (response.status == 1) {
    		    	show_article();
    		    	toastr.success('Success');
    		    }
    		    else
    		    {
    		        toastr.error(response.msg);
    		        end_loading_button2(selectorbtn,'Submit');
    		    }
    		     end_loading_button2(selectorbtn,'Submit');
    		}).fail(function(response){
    		   toastr.error('Connection error,please try again');
    		   end_loading_button2(selectorbtn,'Submit');     
    		})
    	}

    })
	

</script>