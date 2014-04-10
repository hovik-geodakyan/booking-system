<section class="row m-b-md">
</section>

<?php 

?>


<!-- 	Outlets -->
	<ul class="nav nav-tabs settings_tabs">
		<li class="active"><a href="<?php echo(URL.'outlet'); ?>">Outlet</a></li>
		<li><a href="<?php echo(URL.'user'); ?>">Users</a></li>
	</ul>
	<div id="_settings" class="settings">
		<div class="settings_header">
			<div class="crud">
				<a href="<?php echo(URL.'outlet/newout'); ?>" type="button" class="btn btn-primary btn-sm">Add</a>
				<a href="<?php echo URL; ?>" type="button" class="btn btn-default btn-sm">Back</a>
			</div>
			<h3 class="m-b-xs text-black">Exisiting Outlets</h3>
		</div>
		<div class="settings_content table-responsive">
			<table class="table table-striped b-t b-light" id="outlet_table">
				<thead>
					<tr>
						<th class="th-sortable" data-toggle="class">#</th>						
						<th class="th-sortable" data-toggle="class">Name</th>						
						<th class="th-sortable" data-toggle="class">Seats</th>						
						<th class="th-sortable" data-toggle="class">Tables</th>						
						<th class="th-sortable" data-toggle="class">Open time</th>
						<th class="th-sortable" data-toggle="class">Break time</th>													
						<th class="th-sortable" data-toggle="class">Day Off</th>
						<th class="th-sortable" data-toggle="class">Residence time</th>							
						<th class="th-sortable" data-toggle="class">Season</th>
						<th>Bookable</th>
						<th width="30">Delete</th>
					</tr>
                    </thead>
                    <tbody>
                    <?php 
						$i=1;
						foreach($outlets as $out){
							
							switch($out["outlet_day_off"]){
								case 1: $out["outlet_day_off"]="Monday";    break;
								case 2: $out["outlet_day_off"]="Tuesday";   break;
								case 3: $out["outlet_day_off"]="Wednesday"; break;
								case 4: $out["outlet_day_off"]="Thursday";  break;
								case 5: $out["outlet_day_off"]="Friday";    break;
								case 6: $out["outlet_day_off"]="Saturday";  break;
								case 7: $out["outlet_day_off"]="Sunday";    break;
							}

							echo "<tr>";
							echo "<td>".$i."</td>"; $i++;
							echo "<td><a href='".URL."outlet/edit/".$out["outlet_id"]."'>".$out["outlet_name"]."</a></td>";
							echo "<td>".$out["outlet_capacity"]."</td>";
							echo "<td>".$out["outlet_tables"]."</td>";
							echo "<td>".$out["outlet_open_time"]."</td>";
							echo "<td>".$out["outlet_break_start_time"]."-".$out["outlet_break_end_time"]."</td>";
							echo "<td>".$out["outlet_day_off"]."</td>";
							echo "<td>".$out["outlet_avg_duration"]."</td>";
							echo "<td>".$out['outlet_season_start']."-".$out['outlet_season_end']."</td>";
							
							$check="";
							if($out['outlet_if_bookable']==1){
								$check="checked";
							}

							echo '<td class="i-checks" style="text-align:center"><input type="checkbox" '.$check.' disabled><i></i></td>';
							echo '<td><a href="'.URL."outlet/delete/".$out["outlet_id"].'" class="confirm"><div class="delete_button" style="background-image:url('.IMG.'/delete.png)"></div></a></td>';
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	
<script src="<?php echo(JS.'outlet/remove.js'); ?>"></script>

<!-- Modal -->
<div class="modal fade custom-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Are yo sure?</h4>
			</div>
			<div class="modal-body">
				<button type="button" id="confirm_remove" class="btn btn-primary">Yes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->