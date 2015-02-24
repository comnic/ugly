<div class="container">
<div calss="span1"></div>
<div class="span10 well well-small">
<?php 
	echo($data['SUBJECT']);
?>

</div>
<div class="span10 well well-small" style="min-height: 300px;">
<?php 
	echo($data['CONTENT']);
?>

</div>
<div class="span10" style="text-align: right;">
	<a href="/index.php/board/write/<?php echo($data['BID']);?>/reply/<?php echo($data['IDX']);?>" class="btn">Reply</a>
	<a href="/index.php/board/list/001" class="btn">List</a>
</div>
<div calss="span1"></div>
</div>
