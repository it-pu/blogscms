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
					<a href="<?= base_url('content/banner')?>" title="">Banner</a>
				</li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="page-title">
				<h3><b>Banner</b></h3>
				
			</div>

		</div>
		<!-- /Page Header -->

		<!--=== Page Content ===-->
		<div class="row">
			<div class="col-md-12">
				<dl>
					<a data-toggle="modal" href="#myModal"><button class="btn btn-primary"><i class="icon-plus"></i> New Banner</button></a>
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
						<h4><i class="icon-reorder"></i> Banner Table </h4>
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
									<th data-class="expand"  style="width:32%;">Title</th>
									<th >Link</th>
									<th>Author</th>
									<th data-hide="phone">Create Date</th>	
									<th> Action </th>
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

<!-- ======== add banner modal ======= -->
<div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">New banner Form</h3>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal row-border" action="#" id="form">
					<div class="alert alert-success fade in none" id="alert">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> The banner has been successfully added.
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Title:</label>
						<div class="col-md-9"><input class="form-control" type="text" name="title" id="title" placeholder="Title" required="required">
						 <span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label">Images Upload:</label>
						<div class="col-md-9">

							<input type="file" name="photo" class="required" accept="image/*" data-style="fileinput" data-inputsize="medium" >
							<p class="help-block">* Max size 2MB</p>
							<p class="help-block">* Images only (image/jpg/jpeg/png*) and 515px width X 460px height</p>
							<span for="photo" class="error help-block" id="error" generated="true" ></span>
							<!-- <span class="help-block"></span> -->
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Url:</label>
						<div class="col-md-9"><input type="text" name="url" id="url" placeholder="https://example.com/" class="form-control" required="required">
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

<!-- ======== edit banner modal ======= -->
<div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit Banner Form</h3>
            </div>
           
            <div class="modal-body form">
                 <form class="form-horizontal row-border" action="#" id="form1">
                	<input class="form-control" type="hidden" name="idtitle_edit" id="idtitle_edit" placeholder="Title">
					<div class="alert alert-success fade in none" id="alert1">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> The banner has been successfully update.
					</div>
					<div class="alert alert-danger fade in none" id="alert2">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Failed!</strong> The banner has been failed update.
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Title:</label>
						<div class="col-md-9"><input class="form-control" type="text" value="" name="title_edit" id="title_edit" placeholder="Title" >
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
							<p class="help-block">Images only (image/jpg/jpeg/png*) and 515 width X 460px height</p>
							<div for="photo" class="error help-block" id="error-edit" generated="true" ></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Url:</label>
						<div class="col-md-9"><input type="text" name="url_edit" id="url_edit" placeholder="https://example.com/" class="form-control">
						</div>
					</div>
					
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary pull-right" type="Submit" id="btn_update" style="margin-left:30px"> Update</button> 
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Banner</h5>
        
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
		show_banner();
	}); 	

	// ===== View List Data ==== //
	//function show all banner

    function show_banner(){
        $.ajax({
            type  : 'ajax',
            url   : base_url_js +'__load_banner',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){

                    html += '<tr><td>'+data[i].Title_Banner+'</td>'+
                    		'<td>'+data[i].Link+'</td>'+
                            '<td>'+data[i].CreateBY+'</td>'+
                            '<td>'+data[i].CreateAT+'</td>'+
                            '<td style="text-align:left;">'+
                                '<a href="#modal_edit" id="show_edit_banner"  data-toggle="modal"  class="btn btn-info btn-sm " data-idtitle="'+data[i].ID_Banner+'" data-images="'+data[i].Img+'" data-title="'+data[i].Title_Banner+'" data-url="'+data[i].Link+'">Edit</a>'+' '+
                                '<a href="#modal_delete" data-toggle="modal" class="btn btn-danger btn-sm item_delete" data-idtitle="'+data[i].ID_Banner+'">Delete</a>'+
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
	$('#show_data').on('click','#show_edit_banner',function(){
			var id = $(this).data('idtitle');
			var title = $(this).data('title');
			var url = $(this).data('url');
			var images = $(this).data('images');
		    //Ajax Load data from ajax
		    		 		
            $('[name="idtitle_edit"]').val(id);
            $('[name="title_edit"]').val(title);
            $('[name="url_edit"]').val(url); 
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
		
   // ====== Save ===== //

    //function add all banner
    $('#btn_save').on('click',function(){

    		$('#btn_save').text('saving...'); //change button text
    		$('#btn_save').attr('disabled',true); //set button disable
    		
            var formData = new FormData($('#form')[0]);

            $.ajax({
                type : "POST",
                url  : base_url_js +'__save_banner',
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
                		show_banner();
                		location.reload(); 
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
    //function edit banner
    
    $('#btn_update').on('click',function()
		{
    		$('#btn_update').text('saving...'); //change button text
    		$('#btn_update').attr('disabled',true); //set button disable
    		

    		var formData = new FormData($('#form1')[0]);
            $.ajax({
                type : "POST",
                url  : base_url_js +'__update_banner',
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
            					$('#modal_edit').modal('hide');
            				 }, 1000);
            			
                		show_banner();
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
            url :  base_url_js +'__delete_banner',
            type: "POST",
            dataType: "JSON",
            data:{id:id},
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_delete').modal('hide');
                show_banner();
            },
            error: function (data)
            {
                alert('Error deleting data');
            }
        });
	 	return false;
	});
   

</script>