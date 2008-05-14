<?php head(array('title'=>h($exhibit->title),'bodyid'=>'exhibits','bodyclass' => 'show')); ?>
<div id="primary">
	<h2><?php echo h($exhibit->title); ?></h2>

<<<<<<< .mine
	<div id="exhibit-nav">
		<?php echo section_nav();?>
		<?php echo page_nav();?>
	</div><!-- end exhibit-nav -->
=======
<div>
	<?php echo section_nav();?>
</div><!-- end secondary-nav -->
<div>
	<?php echo page_nav();?>
</div><!-- end pagination -->
>>>>>>> .r2219

<div id="exhibit-show">
	<?php echo flash(); ?>
	<?php render_exhibit_page(); ?>
	
</div><!-- end exhibit-show -->

</div><!-- end primary -->

<?php foot(); ?>