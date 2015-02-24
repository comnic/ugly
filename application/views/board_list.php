<div class="container">

<div class="span1"></div>
<div class="span10 table_wrap">
	<div class="span10">
	    <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#ccc" style="border-collapse:collapse; font-size:12px;">
	      <tr>
	        <th align=center width=50>No</th>
	        <th align=center>제목</th>
	        <th align=center width=150>작성자</td>
	        <th align=center width=100>작성일</th>
	      </tr>

<?php 
$bid = $data['bid'];
$page = $data['page'];
$total = $data['total'];
$cntPerPage = $data['cntPerPage'];

$row = $total - (($page-1) * $cntPerPage);

foreach($data['items'] as $item){
?>
	      <tr>
	        <td align=center><B><?php echo($row--);?></B></td>
	        <td>
<?php 
	if($item['IDX'] != $item['PARENT']) echo(" RE]");
?>
	        	<a href="/index.php/board/read/<?php echo($item['IDX']);?>"><B><?php echo($item['SUBJECT']);?></B></a>
	        </td>
	        <td align=center><B><?php echo($item['WRITER']);?></B></td>
	        <td align=center><B><?php echo(substr($item['REG_DATETIME'], 0, 10));?></B></td>
	      </tr>
<?php 
}
?>
		</table>
	</div>
	<div class="span10" style="text-align: center;">
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
	<div class="span10" style="text-align: right;">
		<a href="/index.php/board/write/<?php echo($bid);?>/" class="btn">추가</a>
	</div>
</div>

<div class="span1"></div>

</div>