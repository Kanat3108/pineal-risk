<?php 
	include_once('m/riskes.php');
	$riskes = riskes_all();

?>

<div class="wrap">
	<h1 class="wp-heading-inline">Risk Warnings</h1>
	<a href="<?php $_SERVER['PHP_SELF']?>?page=pineal_riskes&c=add" class="page-title-action">Add Risk Warning</a>
	<hr class="wp-header-end">
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<a><span>Risk Language</span></a>
				</th>
				<th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
					<a><span>Risk description</span></a>
				</th>

				
			</tr>
		</thead>
		<tbody id="the-list">
			<?php foreach ((array) $riskes as $rs) : ?>
			<tr id="" >
				<td>
					<strong><a href="<?=$_SERVER['PHP_SELF'] ?>?page=pineal_riskes&c=edit&id=<?=$rs['id_risk'] ?>"><?=$rs['code_risk']?></a></strong>
				</td>
				<td>
					<strong><a href="<?=$_SERVER['PHP_SELF'] ?>?page=pineal_riskes&c=edit&id=<?=$rs['id_risk'] ?>"><?=$rs['text_risk']?></a></strong>
				</td>
				
				
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>














