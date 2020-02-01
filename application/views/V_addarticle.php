<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Dashboard</a>
				</li>
				<li class="current">
					<a href="pages_calendar.html" title="">Add Article</a>
				</li>
			</ul>

			<ul class="crumb-buttons">
				<li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
				<li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="icon-tasks"></i><span>Users <strong>(+3)</strong></span><i class="icon-angle-down left-padding"></i></a>
					<ul class="dropdown-menu pull-right">
					<li><a href="form_components.html" title=""><i class="icon-plus"></i>Add new User</a></li>
					<li><a href="tables_dynamic.html" title=""><i class="icon-reorder"></i>Overview</a></li>
					</ul>
				</li>
				<li class="range"><a href="#">
					<i class="icon-calendar"></i>
					<span></span>
					<i class="icon-angle-down"></i>
				</a></li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->
		<div class="page-header">
					<div class="page-title">
						<h3><b>Add Article</b></h3>
					</div>

				</div>
		<div class="row">
			<div class="col-md-12">
				<div class="widget box">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i>Add Article</h4>
					</div>
					<div class="widget-content">
						<div class="tabbable tabbable-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1_1" data-toggle="tab">Article</a></li>
								<li class=""><a href="#tab_1_2" data-toggle="tab">Preview</a></li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1_1">

									<form class="form-horizontal row-border" action="#" id="form">
										<div class="alert alert-success fade" id="alert">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Success!</strong> The article has been successfully added.
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Title:</label>
											<div class="col-md-4"><input class="form-control" type="text" name="title" id="title" placeholder="Title">
											 <span class="help-block"></span>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-2 control-label">Category:</label>
											<div class="col-md-10">
												<div class="row">
													<div class="col-md-4">
														<select class="form-control" name="category" id="id_category">
															<option value="">Select</option>
															<option value="Tecnology">Tecnology</option>
															<option value="Art & Design">Art & Design</option>
															<option value="Travel">Travel</option>
														</select>
														 <span class="help-block"></span>
													</div>
												</div> <!--.row -->
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Images Upload:</label>
											<div class="col-md-4">

												<input type="file" name="file1" class="required" accept="image/*" data-style="fileinput" data-inputsize="medium">
												<p class="help-block">Images only (image/*)</p>
												<label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Url:</label>
											<div class="col-md-8"><input type="text" name="url" id="url" placeholder="https://www.youtube.com/watch?v=xsxxxxx" class="form-control">
											 <span class="help-block"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Content:</label>
											<div class="col-md-8"><textarea rows="5" id="summernote" name="content" class="form-control "></textarea>
											 <span class="help-block"></span>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-2 control-label">Status:</label>
											<div class="col-md-10">
												<div class="row">
													<div class="col-md-4">
														<select class="form-control" name="status" id="status">
															<option value="">Select</option>
															<option value="Published">Published</option>
															<option value="Draft">Draft</option>
														</select>
														 <span class="help-block"></span>
													</div>
												</div> <!--.row -->
											</div>
										</div>
										<div class="form-actions">
											<button class="btn btn-primary pull-right" id="btn_save"><i class="icon-check"></i> Submit</button>
										</div>
									</form>

								</div>

								<div class="tab-pane" id="tab_1_2">
									
										<div class="col-md-12 ">
											<div class="embed-responsive">
												<iframe class="embed-responsive-item" src="http://localhost/blogs/" width="100%" height="600"></iframe>
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
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
		
	//function add all article
    $('#btn_save').on('click',function(){

    		$('#btn_save').text('saving...'); //change button text
    		$('#btn_save').attr('disabled',true); //set button disable

            var formData = new FormData($('#form')[0]);
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
            			$('#alert').addClass('in');
		            }
		            else
		            {
		                for (var i = 0; i < data.inputerror.length; i++) 
		                {
		                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
		                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
		                }
		            }
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


</script>