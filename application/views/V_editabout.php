<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?= base_url()?>">Dashboard</a>
				</li>
				<li class="current">
					<a href="" title="">About</a>
				</li>
			</ul>

		</div>
		<!-- /Breadcrumbs line -->
		<div class="page-header">
			<div class="page-title">
				<h3><b>About US</b></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="widget box">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i>Update About US</h4>
					</div>
					<div class="widget-content">
						<div class="tabbable tabbable-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1_1" data-toggle="tab">About</a></li>
								<li class=""><a href="#tab_1_2" data-toggle="tab">Preview</a></li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_1">
									<form class="form-horizontal row-border" action="#" id="form">
										<input type="hidden" value="1" name="idtitle" id="idtitle"> 
										<div class="alert alert-success fade in none" id="alert">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Success!</strong> The about has been successfully update.
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Title:</label>
											<div class="col-md-4">
												<input class="form-control" type="text" name="title" id="title" value="">
											 <span class="help-block"></span>
											</div>
										</div>										
										<div class="form-group">
											<label class="col-md-2 control-label">Content:</label>
											<div class="col-md-8">
												<textarea rows="5" name="content" class="form-control default" ></textarea>
											 <span class="help-block"></span>
											</div>
										</div>
										
										<div class="form-actions">
											<button class="btn btn-primary pull-right" id="btn_update">Update</button>
											<button  class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
										</div>
									</form>
								</div>

								<div class="tab-pane" id="tab_1_2">
									
									<div class="col-md-12 ">
										<div class="embed-responsive">
											<iframe class="embed-responsive-item" src="http://localhost/blogs/about" width="100%" height="600"></iframe>
										</div>
									</div>
									
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>


<script type="text/javascript">
$(document).ready(function() {
	show_about();
});
	//function show about
    function show_about(){
       	var id=$('#idtitle').val();
        $.ajax({
            type  : 'POST',
            url   : base_url_js +'__show_about',
            async: false,
            cache: false,
            data:{id:id},
            dataType : 'json',
            success : function(data){
                	$('#idtitle').val(data.ID_AboutUS);
		            $('input[name="title"]').val(data.Title);
		            $('[name="content"]').val(data.Description);
		            // redirect(base_url());
            },  
            error: function (data)
		        {
		            alert('Get data error ajax');		            		 
		        }
        });
    }

	//function UPDATE about
    $('#btn_update').on('click',function(){

    		$('#btn_update').text('Update...'); //change button text
    		$('#btn_update').attr('disabled',true); //set button disable

    		var formData = new FormData($('#form')[0]);
	       	var content = tinyMCE.get('content');

            $.ajax({
                type : "POST",
                url  : base_url_js +'__update_about',
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,
                dataType : "JSON",
                data : {formData:formData,content:content},
                success: function(data){

			       	if(data.status) //if success close modal and reload ajax table
		            {
		                $('#btn_update').text('Update'); //change button text
            			$('#btn_update').attr('disabled',false); //set button enable 
            			$('#alert').addClass('active');
            			$('#alert').removeClass('none');
		            }
		            else
		            {
		                for (var i = 0; i < data.inputerror.length; i++) 
		                {
		                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
		                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
		                }
		            }
			       	$('#btn_update').text('Update'); //change button text
            		$('#btn_update').prop('disabled',false); //set button enable 

			    },
			    error: function (data)
		        {
		            
		            $('#btn_update').text('Update'); //change button text
		            $('#btn_update').prop('disabled',false); //set button enable 
		 
		        }
            });
            return false;
        });


</script>