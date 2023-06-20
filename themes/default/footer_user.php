	<div class="row-fluid" style="padding:0">

	<?php 
		$menu_kat = modules::run('navigation/menu_kategori');
		if(is_array($menu_kat) && !empty($menu_kat)):
			foreach ($menu_kat as $kat) :
	?> 
		<div class="dabox span4">
		<table class="table">
			<thead>
				<tr class="btn-inverse"><th style="text-transform:uppercase"><i class="<?php echo $kat['icon']; ?> icon-white"></i> <?php echo $kat['caption']; ?></th></tr>
			</thead>
			<tbody>
			<?php foreach ($kat['submenu'] as $sub) : ?>
				<tr><td><i class="icon-chevron-right"></i>&nbsp;&nbsp;&nbsp;<a href="<?=$sub['uri']?>"><?=$sub['caption']?></a></td></tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	<?php 
			endforeach; 
		endif;
	?>

	</div>
    <?php if ( ! isset($show) || $show == true) : ?>
    <hr />
    <footer class="footer">
        <div class="container">
            <p>Powered by <a href="http://naikbhinneka.co.id" target="_blank">IT Department PT. BST</a></p>
        </div>
    </footer>
    <?php endif; ?>
	<div id="debug"><!-- Stores the Profiler Results --></div>
</body>
</html>