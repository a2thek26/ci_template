<?php
/* 
// menu_link 	= url
// menu_page 	= used to match $page set in controller to set active state and set the class
// menu_title	= text that will show up in link
*/
$menu = array(
			array(
				'menu_link' 	=> base_url() . 'page',	
				'menu_page' 	=> 'page',
				'menu_title' 	=> 'Page'
				),
			array(
				'menu_link' 	=> base_url() . 'page2',
				'menu_page' 	=> 'page2',
				'menu_title' 	=> 'Page 2'
				)
);

$total_items 	= count($menu);
$counter 		= 0;
$counter2 		= 0;
?>

<ul class="menu">
<?php 
foreach ($menu as $item) :
	$item_class = ($page == $item['menu_page']) ? "active " : "";
	if($total_items - 1 == 0) {
		$item_class .= "orphan ";
	} else {
		$item_class .= ($counter == 0) ? "first " : "";
		$item_class .= ($counter == $total_items - 1) ? "last " : "";
	}
	$item_class .= $item['menu_page'];
	if(!empty($item['class'])) $item_class .= " " . $item['class'];
?>
	<li class="<?php echo $item_class?>"><a href="<?php echo $item['menu_link']?>"><?php echo $item['menu_title']?></a></li>

<?php 
$counter++;
endforeach; 
?>
</ul>