<?php 
	include('m/riskes.php');

	
	$id= (int)$_GET['id'];

	if($id == 0)
		die('Error, ID of risk is incorrect');

	if(!empty($_POST)){
		if (isset($_POST['save'])) {
			if(riskes_edit( $_POST['code'], $_POST['text'], $_POST['font'], $_POST['bg'], $id)){
				die ('<div class="wrap">risk saved successfully. </div>');
			}else{
				die ('<div class="wrap">risk saved successfully. </div>');
			}
		}elseif (isset($_POST['delete'])) {
			if(riskes_delete($id)){
				die ('risk deleted successfully');
			}
		}
			$code = $_POST['code'];
			$text = stripslashes($_POST['text']);
			$font = $_POST['font'];
			$bg = $_POST['bg'];
			$error = true;
	}else{
		$risk = riskes_get($id);
		$code = $risk['code_risk'];
		$text = $risk['text_risk'];
		$font = $risk['font_risk'];
		$bg = $risk['bg_risk'];
		$error = false;
	}

	$langs = icl_get_languages();
?>

<div class="wrap">
	<h1 class="wp-heading-inline">Edit Risk Warning</h1>
	<a class="page-title-action" href="<?php $_SERVER['PHP_SELF']?>?page=pineal_riskes&c=all">All Risk Warnings</a>
	
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
							<h2 class="hndle ui-sortable-handle"><span>Save Risk Warning</span></h2>
							<div class="inside">
								<div class="submitbox" id="submitpost">
									<div id="major-publishing-actions">
										<div id="publishing-action">
											<span class="spinner"></span>
											<input type="submit" name="save" value="Save" class="button button-primary button-large">
											<input type="submit" name="delete" value="Delete" class="button button-primary button-large">
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
												<label for="title">Language Code</label>
											</th>
											<td>
												<select type="text" name="code" id="wprisk_url" placeholder="" class="wprisk-text-input" required>
													<?php 
														foreach ($langs as $lang=>$value) {
															/*if (!empty(riskes_check_lang())){
																$db_languages = riskes_check_lang();
															 	foreach ($db_languages as $db_language) {
															 		foreach ($db_language as $value) {
															 			if ($value == $lang) {
															 				echo '<option value="'.$lang.'" disabled>'.$lang.'</option>';
															 			}else*/if($lang == $code){
																			echo '<option value="'.$lang.'" selected>'.$lang.'</option>';
																		} else {
															 				echo '<option value="'.$lang.'">'.$lang.'</option>';	
															 			}
															 		/*}
																}
															}*/
														} 
													 ?>
												</select>
											</td>
										</tr>
										<tr>
											<th>
												<label for="content">Risk Warning Text</label>
											</th>
											<td>

												<?= wp_editor($text,'text');?>
											</td>
										</tr>
										<tr>
											<th>
												<label for="font">Font Color</label>
											</th>
											<td>
												<input type="text" value="<?= $font ?>" name="font" class="color-field" />
											</td>
										</tr>
										<tr>
											<th>
												<label for="bg">Background Color</label>
											</th>
											<td>
												<input type="text" value="<?= $bg ?>" name="bg" class="color-field" />
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








