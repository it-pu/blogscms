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
					<a href="pages_calendar.html" title="">Category</a>
				</li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="page-title">
				<h3><b>Category</b></h3>
				
			</div>

		</div>
		<!-- /Page Header -->

		<!--=== Page Content ===-->
		<div class="row">
			<div class="col-md-12">
				<dl>
					<a data-toggle="modal" href="#myModal"><button class="btn btn-primary"><i class="icon-plus"></i> New Category</button></a>
				</dl>
			</div>
		</div>

		<!--=== Responsive DataTable ===-->
		<div class="row">
			<div class="col-md-12">
				<div class="widget box">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i> Category Table </h4>
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
									<!-- <th class="checkbox-column">
										<input type="checkbox" class="uniform">
									</th> -->
									<th data-class="expand">Category</th>
									<th>Author</th>
									<th data-hide="phone">Create Date</th>
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

<!-- ======== add Category modal ======= -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">New category Form</h3>
            </div>
            <div class="modal-body form">
                <form class="form-horizontal row-border" action="#" id="form">
					<div class="alert alert-success fade in none" id="alert">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> The category has been successfully added.
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Title:</label>
						<div class="col-md-9"><input class="form-control" type="text" name="title" id="title" placeholder="Category Name/Titel">
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

<!-- ======== edit category modal ======= -->
<div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit category Form</h3>
            </div>
           
            <div class="modal-body form">
                 <form class="form-horizontal row-border" action="#" id="form1">
                	<input class="form-control" type="hidden" name="idtitle_edit" id="idtitle_edit" placeholder="Title">
					<div class="alert alert-success fade in none" id="alert1">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> The category has been successfully update.
					</div>
					<div class="alert alert-danger fade in none" id="alert2">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Failed!</strong> The category has been failed update.
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Title:</label>
						<div class="col-md-9"><input class="form-control" type="text" value="" name="title_edit" id="title_edit" placeholder="Title">
						</div>
					</div>					
				
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
        <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
        
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
		show_category();
	});

 	
	// ===== View List Data ==== //
	//function show all category
    function show_category(){
        $.ajax({
            type  : 'ajax',
            url   : base_url_js +'show_category',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var url_category = base_url_js +'edit_category';
                var i=1;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
       //              		'<td class="checkbox-column">'+
							// 		// '<input type="checkbox" class="uniform">'+
							// '</td>'+
                            '<td>'+data[i].Name+'</td>'+
                            '<td>'+data[i].UpdateBY+'</td>'+
                            '<td>'+data[i].CreateAT+'</td>'+
                            '<td style="text-align:left;">'+
                                '<a href="#modal_edit" id="show_edit_category"  data-toggle="modal"  class="btn btn-info btn-sm " data-idtitle="'+data[i].ID_category+'"  data-title="'+data[i].Name+'">Edit</a>'+' '+
                                '<a href="#modal_delete" data-toggle="modal" class="btn btn-danger btn-sm item_delete" data-idtitle="'+data[i].ID_category+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

    	// ===== View Data Edit ====== //
	$('#show_data').on('click','#show_edit_category',function(){
			var id = $(this).data('idtitle');
			var title = $(this).data('title');
		    //Ajax Load data from ajax
		    		 		
            $('[name="idtitle_edit"]').val(id);
            $('[name="title_edit"]').val(title);
        });
		
   // ====== Save ===== //

    //function add all category
    $('#btn_save').on('click',function(){

    		$('#btn_save').text('saving...'); //change button text
    		$('#btn_save').attr('disabled',true); //set button disable
    		
    		var formData = new FormData($('#form')[0]);

            $.ajax({
                type : "POST",
                url  : base_url_js +'__save_category',
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

    // ===== Update ====== //
    //function edit category
    
    $('#btn_update').on('click',function()
		{
    		$('#btn_update').text('saving...'); //change button text
    		$('#btn_update').attr('disabled',true); //set button disable
    		$('#alert1').addClass('none');
    		$('#alert1').removeClass('active');

    		var formData = new FormData($('#form1')[0]);
    		
            $.ajax({
                type : "POST",
                url  : base_url_js +'__update_category',
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
		                $('#btn_update').text('Save'); //change button text
            			$('#btn_update').attr('disabled',false); //set button enable 

            			$('[name="idtitle_edit"]').val("");
			            $('[name="title_edit"]').val("");
	            		$('#alert1').addClass('active');
            			$('#alert1').removeClass('none');
            			$('#modal_edit').modal('hide');
                		show_category();
		            }
		            else
		            {
		                for (var i = 0; i < data.inputerror.length; i++) 
		                {
		                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
		                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
		                }
		                $('#alert1').addClass('active');
            			$('#alert1').removeClass('none');
		            }
		            
			       	$('#btn_update').text('Save'); //change button text
            		$('#btn_update').prop('disabled',false); //set button enable 

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
         
        $('#modal_delete').modal('show');
        $('[name="idtitle"]').val(idtitle);
    });

     // ======= Delete ======= //
    $('#btn_delete').on('click',function()
	{
		var id =  $('#idtitle').val();
        $.ajax({
            url :  base_url_js +'__delete_category',
            type: "POST",
            dataType: "JSON",
            data:{id:id},
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_delete').modal('hide');
                show_category();
            },
            error: function (data)
            {
                alert('Error deleting data');
            }
        });
	 	return false;
	});
	 
</script>