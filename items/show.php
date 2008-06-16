<?php head(array('title' => h($item->title),'bodyid'=>'items','bodyclass' => 'show')); ?>

<!-- The following code snippet makes this page Zotero compatible -->
<?php
if (function_exists('COinS')):
    COinS($item);
endif;
?>
<div id="primary">
	<h2><?php if($item->title) echo h($item->title); else echo 'Untitled'; ?></h2>
	<?php //echo simpleratings_form($item); ?>
	<?php //echo iteminexhibit_list($item->id); ?>
	

	<div id="item-metadata">
		<script type="text/javascript">
		function ReSize(imgobj){
		// Area = width*height
		// AspectRatio = width/height
		// Area=width*width/AspectRatio
		// width= square root(Area*AspectRatio)
		longside = 558;

		if (imgobj.width > imgobj.height )  {

			area=imgobj.width/imgobj.height;

			imgobj.width=longside;
			var newHeight =longside/area;


			imgobj.height=newHeight;

		} else { // portrait & square

			area=imgobj.height/imgobj.width;

			imgobj.height=longside;

			var newWidth =longside/area;



			imgobj.width=newWidth;


		}

		}


		function resizeThumbs() {
			if(!document.getElementsByTagName || !document.getElementById || !document.getElementsByTagName("img")) return;
			var itemimage = $("item-image");
			ReSize(itemimage);
		}

		Event.observe(window,'load',function() {
			resizeThumbs();
		});
		</script>

		<div id="item-images">
		<?php 

		$files = $item->Files;

		$first_file = $files[0];

		if($first_file->hasThumbnail()) {
			$html = fullsize($first_file,array('id'=>'item-image'));
		}

		if(count($files)>1) {
			$html .= '<div id="item-images-thumbs">';
			foreach($files as $file) {
				if($file->hasThumbnail()) {
					$html .= '<a href="'.file_download_uri($file).'" class="download-file">';
					$html .= square_thumbnail($file, array('class'=>'thumb'));
					$html .= '</a>';
				}

			}
			$html .= '</div>';
		} else {
			$html = display_files($first_file);
		}
		
		echo $html;

		?>
		</div>
<!-- The following is dublin core metadata.  You can remove these fields if you do not wish
    to display that data on the public theme -->

	    <?php if($item->publisher): ?>
	        <div id="item-publisher" class="field">
            <h3>Publisher</h3>
            <div class="field-value"><?php echo nls2p(h($item->publisher)); ?></div> 
            </div>   
	    <?php endif; ?>
	
	    <?php if($item->creator): ?>
	        <div id="item-creator" class="field">
            <h3>Creator</h3>
            <div class="field-value"><?php echo nls2p(h($item->creator)); ?></div>
            </div>
	    <?php endif; ?>
	
        <?php if($item->description): ?>
            <div id="item-description" class="field">
            <h3>Description</h3>
            <div class="field-value"><?php echo nls2p(h($item->description)); ?></div>
            </div>
        <?php endif; ?>
	    	    
	    <?php if($item->relation): ?>
	        <div id="item-relation" class="field">
            <h3>Relation</h3>
            <div class="field-value"><?php echo nls2p(h($item->relation)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->spatial_coverage): ?>
	        <div id="item-spatial-coverage" class="field">
            <h3>Spatial Coverage</h3>
            <div class="field-value"><?php echo nls2p(h($item->spatial_coverage)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->rights): ?>
	        <div id="item-rights" class="field">
            <h3>Rights</h3>
            <div class="field-value"><?php echo nls2p(h($item->rights)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->source): ?>
	        <div id="item-source" class="field">
            <h3>Source</h3>
            <div class="field-value"><?php echo nls2p(h($item->source)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->subject): ?>
	        <div id="item-subject" class="field">
            <h3>Subject</h3>
            <div class="field-value"><?php echo nls2p(h($item->subject)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->additional_creator): ?>
	        <div id="item-additional-creator" class="field">
            <h3>Additional Creator</h3>
            <div class="field-value"><?php echo nls2p(h($item->additional_creator)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->format): ?>
	        <div id="item-format" class="field">
            <h3>Format</h3>
            <div class="field-value"><?php echo nls2p(h($item->format)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->contributor): ?>
	        <div id="item-contributor" class="field">
            <h3>Contributor</h3>
            <div class="field-value"><?php echo nls2p(h($item->contributor)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->rights_holder): ?>
	        <div id="item-rights-holder" class="field">
            <h3>Rights Holder</h3>
            <div class="field-value"><?php echo nls2p(h($item->rights_holder)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->provenance): ?>
	        <div id="item-provenance" class="field">
            <h3>Provenance</h3>
            <div class="field-value"><?php echo nls2p(h($item->provenance)); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->date): ?>
	        <div id="item-date" class="field">
            <h3>Date</h3>
            <div class="field-value"><?php echo nls2p(date('m.d.Y', strtotime($item->date))); ?></div>
            </div>
	    <?php endif; ?>
	    
	    <?php if($item->temporal_coverage_start): ?>
			<div id="temporal-coverage" class="field">
			<h3>Temporal Coverage</h3>
			<div>
			<p><?php echo $item->temporal_coverage_start; ?><?php if(!empty($item->temporal_coverage_end)) echo '&ndash;'.$item->temporal_coverage_end; ?></p>
			</div>
			</div>
	    <?php endif; ?>
	    
	    <div id="item-date-added" class="field">
        <h3>Date Added</h3>
        <div class="field-value"><?php echo nls2p(date('m.d.Y', strtotime($item->added))); ?></div>
	    </div>
	    
	    <?php if ( has_collection($item) ): ?>
    	    <div id="item-collection" class="field">
            <h3>Collection</h3>
            <div class="field-value"><?php echo link_to_collection($item->Collection); ?> </div>
            </div>
    	<?php endif; ?>
	
	</div><!-- end item-metadata (Dublin Core metadata) -->
	<!--  The following is extended metadata that is assigned based on the Type that is assigned to an item -->

	<div id="extended-metadata">
	    <?php if(has_type($item)): ?>
	        <div id="item-type" class="field">
            <h3>Item Type</h3>
            <div class="field-value"><?php echo nls2p(h($item->Type->name)); ?></div>
            </div>

            <!-- This loop outputs all of the extended metadata -->
            <?php foreach( $item->TypeMetadata as $field => $text ): ?>
                <div id="<?php echo text_to_id($field); ?>" class="field">
                    <h3><?php echo h($field); ?></h3>
                    <div class="field-value"><?php echo nls2p(h($text)); ?></div>
                </div>
            <?php endforeach; ?>

	    <?php endif; ?>

	</div><!-- end extended-metadata -->
		
	<?php if(count($item->Files)): ?>
	<div id="item-files" class="field">
		<h3>Files</h3>
		<div class="field-value">
			<ul>
			<?php foreach($item->Files as $file){
				
			echo '<li><a href="'. file_download_uri($file). '" class="download-file">'. $file->original_filename. '</a></li>';
			
		}	?>
		</ul>
		</div>
	</div>
	<?php endif; ?>

	<?php if(count($item->Tags)): ?>
		<?php $tagcount = count($item->Tags); ?>
	<div id="item-tags" class="field">
		<h3>Tags</h3>
		<div class="field-value">
		<ul class="tags">
		<?php foreach ($item->Tags as $key=>$tag): ?>
			<li><a href="<?php echo uri('items/browse/tag/'.urlencode($tag->name)); ?>" rel="tag"><?php echo h($tag->name); ?></a><?php if($tagcount > 1 && $key != $tagcount -1) echo ', '; ?></li>
		<?php endforeach; ?>
		</ul>
		</div>
	</div>
	<?php endif;?>
	
	<div id="item-citation" class="field">
    	<h3>Citation</h3>
    	<div class="field-value"><?php echo nls2p($item->getCitation()); ?></div>
	</div>

	<ul class="item-pagination navigation">
	<li id="previous-item" class="previous">
		<?php echo link_to_previous_item($item,'Previous Item'); ?>
	</li>
	<li id="next-item" class="next">
		<?php echo link_to_next_item($item,'Next Item'); ?>
	</li>
	</ul>
	
</div><!-- end primary -->

<?php foot(); ?>