<?php 

$menu = array(
			array(
				'menu_link' 	=> 'page1', 
				'menu_title' 	=> 'Page 1'
			),
			array(
				'menu_link' 	=> 'page2', 
				'menu_title' 	=> 'Page 2'
			),
			array(
				'menu_link' 	=> 'page3', 
				'menu_title' 	=> 'Page 3'
			)
);

$counter 		= 0;
$total_items 	= count($menu);
?>
<ul class="menu">
<?php foreach ($menu as $item) :
	$item_class = ($page == $item['menu_link']) ? "active " : "";
	if($total_items - 1 == 0) {
		$item_class .= "orphan ";
	} else {
		$item_class .= ($counter == 0) ? "first " : "";
		$item_class .= ($counter == $total_items - 1) ? "last " : "";
	}
	$item_class .= "item";
?>
	<li class="<?php echo $item_class?>"><a href="<?php echo base_url() . $item['menu_link']?>"><span class="item"><?php echo $item['menu_title']?></span></a></li>
<?php 
$counter++;
endforeach; 
?>
</ul>