<div class="wrap">
    <div class="head">
        <h1 class="wp-heading-inline">API Call Logs</h1>

    </div>
    <hr class="wp-header-end"/>

    <div class="clear" style="height:20px;"></div>
    <table id="estimate_table" width="100%" class="wp-list-table widefat fixed striped table-view-list" style="margin-top: 20px;">
         
        <tbody> 
			<tr><th width="150">ID</th> <td><?php echo $logItem->id?></td> </tr> 
			<tr><th width="150">Call at</th> <td><?php echo $logItem->created?></td> </tr> 
			<tr><th width="150">API</th> <td><?php echo $logItem->api?></td> </tr> 
			<tr><th width="150">Response Code</th> <td><?php echo $logItem->status?></td> </tr> 
			<tr><th width="150">Payload</th> <td><?php echo $logItem->payload?></td> </tr> 
			<tr><th width="150">Response</th> <td><?php echo $logItem->response?></td> </tr> 
			<tr><th width="150">Body</th> <td><?php echo $logItem->body?></td> </tr> 
        </tbody>
    </table>
	<p style="text-align:center">
	<a href="admin.php?page=elevate-log" style="display:inline-block; padding:5px 15px; border:1px solid #ccc;"> Back </a>
	</p>
</div>
 