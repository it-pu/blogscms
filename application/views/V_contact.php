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
					<a href="pages_calendar.html" title="">Contact</a>
				</li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="page-title">
				<h3><b>Contact</b></h3>
				
			</div>

		</div>
		<!-- /Page Header -->

		<!--=== Page Content ===-->
		<!-- <div class="row">
			<div class="col-md-12">
				<dl>
					<a data-toggle="modal" href="#myModal"><button class="btn btn-primary"><i class="icon-plus"></i> New Contact</button></a>
				</dl>
			</div>
		</div> -->

		<!--=== Responsive DataTable ===-->
		<div class="row">
			<div class="col-md-12">
				<div class="widget box">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i> Contact Table </h4>
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
									<th class="checkbox-column">
										<input type="checkbox" class="uniform">
									</th>
									<th data-class="expand">Name</th>
									<th>Email</th>
									<th data-hide="phone">Message</th>
									<th data-hide="phone,tablet">Number</th>
									<!-- <th> Action </tr> -->
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

<script type="text/javascript">
	// var save_method;
	$(document).ready(function () {	
		show_contact();
	});
	// ===== View List Data ==== //
	//function show all contact
    function show_contact(){
        $.ajax({
            type  : 'ajax',
            url   : base_url_js +'__load_contact',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                // var url_contact = base_url_js +'edit_contact';
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                    		'<td class="checkbox-column">'+
									'<input type="checkbox" class="uniform">'+
							'</td>'+
                            '<td>'+data[i].Name+'</td>'+
                            '<td>'+data[i].Email+'</td>'+
                            '<td>'+data[i].Message+'</td>'+
                            '<td><span class="label label-success">'+data[i].Phone+'</span></td>'+
                            // '<td style="text-align:left;">'+
                            //     '<a href="#modal_edit" id="show_edit_contact"  data-toggle="modal"  class="btn btn-info btn-sm " data-idtitle="'+data[i].ID_title+'" data-category="'+data[i].Category+'" data-content="'+data[i].Content+'"  data-images="'+data[i].Images+'" data-title="'+data[i].Title+'" data-url="'+data[i].Url+'" data-status="'+data[i].Status+'">Edit</a>'+' '+
                            //     '<a href="#modal_delete" data-toggle="modal" class="btn btn-danger btn-sm item_delete" data-idtitle="'+data[i].ID_title+'">Delete</a>'+
                            // '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

</script>

