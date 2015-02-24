<link href="/static/css/board_gallery.css" rel="stylesheet">

<link rel="stylesheet" href="/static/lib/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="/static/lib/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/lib/wookmark/jquery.wookmark.min.js" type="text/javascript" charset="utf-8"></script>

<!-- CSS Reset -->
<link rel="stylesheet" href="../css/reset.css">

<!-- Global CSS for the page and tiles -->
<link rel="stylesheet" href="/static/lib/wookmark/css/main.css">

<script type="text/javascript" charset="utf-8">
<!--
$(document).ready(function(){
  $("a[rel^='prettyPhoto']").prettyPhoto();
  
  $('#gallery-list li').wookmark({
      // Prepare layout options.
      autoResize: true, // This will auto-update the layout when the browser window is resized.
      container: $('#gallery-main'), // Optional, used for some extra CSS styling
      offset: 5, // Optional, the distance between grid items
      outerOffset: 10, // Optional, the distance to the containers border
      itemWidth: 310 // Optional, the width of a grid item
  });
});
//-->
</script>
<div class="container__">

<div id="gallery-wrap">
	<div id="gallery-main">
		<ul id="gallery-list">

<?php 
$bid = $data['bid'];
$page = $data['page'];
$total = $data['total'];
$cntPerPage = $data['cntPerPage'];

$row = $total - (($page-1) * $cntPerPage);

foreach($data['items'] as $item){
	echo("			<li><div><a href=\"".$item['PICTURE']."\" rel=\"prettyPhoto[pp_gal]\" title=\"You can add caption to pictures.\"><img src=\"".$item['THUMBNAIL']."\" class=\"img-polaroid\" width=\"300\"></a></div><div class=\"subject\">".$item['SUBJECT']."</div></li>\n");
}
?>
	</div>
	<div class="" style="text-align: center;">
<?php 
$total_page = ceil($total / $cntPerPage);
if($page == 1)
	$pre = 1;
else
	$pre = $page-1;
if($page == $total_page)
	$next = $total_page;
else
	$next = $page+1;

if($page > 5 && $total_page > 10)
	$start_page = $page - 5;
else 
	$start_page = 1;
?>
		<div class="pagination">
		  <ul>
		    <li><a href="/index.php/board/list/<?php echo($bid);?>/<?php echo($pre);?>">Prev</a></li>
<?php 
for($i = $start_page, $cnt = 1 ; $i <= $total_page && $cnt <= 10 ; $i++, $cnt++){
	$cls = ($i == $page)?"active":"";
	echo("<li class=\"$cls\"><a href=\"/index.php/board/list/$bid/$i\">$i</a></li>");
}
?>
		    <li><a href="/index.php/board/list/<?php echo($bid);?>/<?php echo($next);?>">Next</a></li>
		  </ul>
		</div>
	</div>
	<div class="" style="text-align: right;">
		<a href="/index.php/board/write/<?php echo($bid);?>/" class="btn">추가</a>
	</div>
</div>


</div>