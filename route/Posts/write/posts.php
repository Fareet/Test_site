<?php
include $_SERVER['DOCUMENT_ROOT'] . '/classes/SeeSelectPost.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates /header.php';
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="left-collum-index">
			<? (new SeeSelectPost)->RenderInformationAboutThisPost() ?>
		</td>
	</tr>
</table>
<? include $_SERVER['DOCUMENT_ROOT'] . './templates /footer.php' ?>