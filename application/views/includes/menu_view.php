<?php
/* 
// menu_link 	= url
// menu_page 	= used to match $page set in controller to set active state and set the class
// menu_title	= text that will show up in link
*/
$menu = array(
			array(
				'menu_link' 	=> base_url() . 'dashboard',	
				'menu_page' 	=> 'dashboard',
				'menu_title' 	=> 'My Dashboard'
				),
			array(
				'menu_link' 	=> base_url() . 'goals',
				'menu_page' 	=> 'goals',
				'menu_title' 	=> 'MagicGoals'
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
	<li class="<?php echo $item_class?>"><a href="<?php echo base_url() . $item['menu_link']?>"><?php echo $item['menu_title']?></a></li>

<?php 
$counter++;
endforeach; 
?>
</ul>