<?php 
	include_once('m/riskes.php');

	if (!empty(riskes_check_lang())){
		$db_languages = riskes_check_lang();
	 	foreach ($db_languages as $db_language) {
	 		foreach ($db_language as $value) {
	 			echo $value;
	 		}
	 	}
	 }


	if(!empty($_POST)){
		

		if(riskes_add($_POST['code'], stripslashes($_POST['text']), $_POST['font'], $_POST['bg'])){

			die ('<div class="wrap">risk saved successfully</div>');
			}else{
				die ('<div class="wrap">risk saved successfully</div>');
		};
		$code = $_POST['code'];
		$text = stripslashes($_POST['text']);
		$font = $_POST['font'];
		$bg = $_POST['bg'];
		
		$error = true;
	}else{
		$code = '';
		$text = '';
		$font = '';
		$bg = '';
		$error = false;
	}

	if ( function_exists('icl_object_id') ) {
		$langs = icl_get_languages();
	}else{
		echo 'Please, install WPML plugin';
		exit;
	}
	 
?>

<div class="wrap">
	<h1 class="wp-heading-inline">New risk warning</h1>
	<a class="page-title-action" href="<?php $_SERVER['PHP_SELF']?>?page=pineal_riskes&c=all">All risk warnings</a>
	
	<form method="post">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="postbox-container-1" class="postbox-container">
					<div id="side-sortables" class="meta-box-sortables ui-sortable">
						<div id="submitdiv" class="postbox ">
							<button type="button" class="handlediv" aria-expanded="true">
								<span class="screen-reader-text">Toggle panel: Save Feed Source</span>
								<span class="toggle-indicator" aria-hidden="true"></span>
							</button>
							<h2 class="hndle ui-sortable-handle"><span>Save risk warning</span></h2>
							<div class="inside">
								<div class="submitbox" id="submitpost">
									<div id="major-publishing-actions">
										<div id="publishing-action">
											<span class="spinner"></span>
											<input name="original_publish" type="hidden" id="original_publish" value="Publish Feed">
											<input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Publish risk">
										</div>
										<div class="clear"></div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div id="postbox-container-2" class="postbox-container">
					<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<div id="custom_meta_box" class="postbox">
							<button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Feed Source Details</span><span class="toggle-indicator" aria-hidden="true"></span></button>
							<h2 class="hndle ui-sortable-handle"><span>Risk Warning Details</span></h2>
							<div class="inside">
								<table class="form-table wprisk-form-table">
									<tbody>
										<tr>
											<th>
												<label for="title">Language</label>
											</th>
											<td>
												<select type="text" name="code" id="wprisk_url" placeholder="" class="wprisk-text-input" required>
													<?php 
														foreach ($langs as $lang => $value) {
															//echo $value;
															/*if (!empty(riskes_check_lang())){
																$db_languages = riskes_check_lang();
															 	foreach ($db_languages as $db_language) {
															 		foreach ($db_language as $value) {
															 			if ($value == $lang) {
															 				echo '<option value="'.$lang.'" disabled>'.$lang.'</option>';
															 			}else{
															 				echo '<option value="'.$lang.'" >'.$lang.'</option>';
															 			}
															 			
															 		}
															 	}
															}
															elseif(empty(riskes_check_lang())){
															 				echo '<option value="'.$lang.'" >'.$lang.'</option>';
															 			}*/
															 			echo '<option value="'.$lang.'" >'.$lang.'</option>';
														} 
													 ?>
												</select>
											</td>
										</tr>
										<tr>
											<th>
												<label for="content">Text</label>
											</th>
											<td>
												<?= wp_editor($content_to_load,'text');?>
												
												
											</td>
										</tr>
										<tr>
											<th>
												<label for="font">Font Color</label>
											</th>
											<td>
												<input type="color" value="#fff" name="font" class="color-field" />
												
											</td>
										</tr>
										<tr>
											<th>
												<label for="bg">Background Color</label>
											</th>
											<td>
												<input type="color" value="#1F2C51" name="bg" class="color-field" />
												
											</td>
										</tr>
										
									</tbody>
									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		




		
	</form>
</div>