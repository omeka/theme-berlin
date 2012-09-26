<?php echo head(
    array(
        'title' => metadata('item',array('Dublin Core','Title')),
        'bodyid'=>'items',
        'bodyclass'=>'show item'
    )
    );
?>
<div id="primary">
    <!-- primary item title -->
   <h1><?php echo metadata('item', array('Dublin Core','Title')); ?> </h1>
   
   <?php
    $titles = metadata('item',array('Dublin Core','Title'),array('all'));
    
    if(count($titles) > 1):
   ?>
    <h3>All Titles</h3>
    <ul class="title-list">
        <?php foreach($titles as $title): ?>
            <li class="item-title">
                <?php echo $title; ?>
            </li>
        <?php endforeach; ?>
    </ul>
   <?php endif; ?>
   
   <!-- Items metadata -->
   <h3>Files</h3>
   <div id="item-metadata">
       <?php echo all_element_texts('item'); ?>
    <div id="item-images">
      <?php echo  files_for_item();       ?>
    </div>
 

   </div> <!-- end Item metadata. -->
   <?php if(metadata('item','Collection Name')): ?>
      <div id="collection" class="element">
        <h3><?php echo __('Collection'); ?>
        <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
      </div>
   <?php endif; ?>
   
     <!-- The following prints a list of all tags associated with the item -->
    <?php if (item_has_tags()): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>
    
    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo item_citation(); ?></div>
    </div>
       <?php fire_plugin_hook('public_append_to_items_show', array('view' => $this)); ?>

    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> <!-- End of Primary. -->
<?php echo foot(); ?>
