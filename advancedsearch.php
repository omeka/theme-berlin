<?php head(array('title'=>'Advanced Search','bodyid'=>'advancedsearch','bodyclass' => 'advanced')); ?>

<?php echo items_search_form(array('id'=>'searchform'), uri('items/browse'), false); ?>

<?php foot(); ?>