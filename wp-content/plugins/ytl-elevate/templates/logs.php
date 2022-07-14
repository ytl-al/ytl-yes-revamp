 <style>
	 .page-links {
		text-align: center;
		margin: 10px -2px -4px;
	}
	.page-links .page-numbers{
		display: inline-block;
		line-height: 32px;
		border: 1px solid rgba(0,0,0,.1);
		padding: 0 13px;
		border-radius: 2px;
	}
	.page-links>span {
		background: #08f;
		border-color: #08f;
		color: #fff;
	}
 </style>
<div class="wrap">
    <div class="head">
        <h1 class="wp-heading-inline">API Call Logs</h1>

    </div>
    <hr class="wp-header-end"/>
	
	<div style="display:flex;width:100%">
		<div style=" width:50%">
		<form action="admin.php?page=elevate-log">
			<table><tr>
			<td><input type="text" name="keyword" value="<?php echo $_GET['keyword']?>" placeholder="Keyword"/></td>
			<td>
			<?php $aryCode = array(200,204,400,401,404,500);?>
			<select name="status">
				<option value="">All</option>
				<?php foreach( $aryCode as $code){?><option <?php ($code == $_GET['status'])?'selected':''?>><?php echo $code;?></option><?php }?>
			</select></td>
			<td><input type="submit" name="cmd" value="Search"/></td>
			</tr></table>
		</form>
		</div>
		<div style="text-align:right; width:50%">
			<a onclick="return confirm('Do you want to clear all logs?');" href="admin.php?page=elevate-log&act=clear" style="display:inline-block; padding:5px 15px; border:1px solid #ccc; border-radius:3px; background:#fff;"> Clear All </a>
		</div>
	</div>

    <div class="clear" style="height:20px;"></div>
    <table id="estimate_table" width="100%" class="wp-list-table widefat fixed striped table-view-list" style="margin-top: 20px;">
        <thead>
        <tr style="background-color:#ddd;">
            <th width="50">ID</th> 
            <th>API</th>
            <th width="100">Status</th>
            <th width="120">Call at</th>
            <th width="120">Action</th> 
        </tr>
        </thead>
        <tbody> 
          <?php if(count($api_logs)){
			  foreach($api_logs as $item){
			  ?>
				<tr>
					<td width="50"><?php echo $item->id?></td> 
					<td><?php echo $item->api?></td>
					<td width="100"><?php echo $item->status?></td>
					<td width="120"><?php echo $item->created?></td>
					<td width="120"><a href="?page=elevate-log&act=detail&id=<?php echo $item->id?>">View</a></td> 
				</tr>
		  
		  <?php 
			}
			}else{?>
			<tr><td colspan="5">No record.</td></tr>
		  <?php }?>
        </tbody>
    </table>
</div>
 <div class="row">
<div class="page-links">
	<?php
	$limit = 50; // number of rows in page
	$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
	$offset = ( $pagenum - 1 ) * $limit;
	 
	$num_of_pages = ceil( $total_log / $limit );
	$page_links = paginate_links( array(
    'base' => add_query_arg( 'pagenum', '%#%' ),
    'format' => '',
    'prev_text' => __( '&laquo;', 'text-domain' ),
    'next_text' => __( '&raquo;', 'text-domain' ),
    'total' => $num_of_pages,
    'current' => $pagenum
	) ); 
	echo $page_links;
	?>
</div>
</div>
