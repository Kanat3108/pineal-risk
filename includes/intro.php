<?php 
include_once('m/riskes.php');
//include_once( ABSPATH . WPINC . '/feed.php' );
  $code_risk = ICL_LANGUAGE_CODE;
$riskes = riskes_current($code_risk);
?>

<div id="pineal_risk_warning" style="background-color: <?=$riskes['bg_risk']?>;">
	<div id="pineal_risk_warning_inner" style="color: <?=$riskes['font_risk']?>"><?php 
	$text = stripcslashes($riskes['text_risk']);
echo $text;
	

	?>
	
	</div>

	<div style="clear:both"></div>

</div>








