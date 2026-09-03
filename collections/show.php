<?php
$collectionTitle = metadata('collection', 'display_title');
$totalItems = metadata('collection', 'total_items');
?>

<?php echo head(['title' => $collectionTitle, 'bodyclass' => 'collections show']); ?>

<h1><?php echo metadata('collection', 'rich_title', ['no_escape' => true]); ?></h1>

<?php echo all_element_texts('collection'); ?>

<div id="collection-items" class="browse">
    <h2><?php echo __('Collection Items'); ?></h2>
    <?php if ($totalItems > 0): ?>
        <?php foreach (loop('items') as $item): ?>
        <?php $itemTitle = metadata('item', 'display_title'); ?>
        <div class="item record">
            <h3><?php echo link_to_item($itemTitle, ['class' => 'permalink']); ?></h3>
            <div class="record-meta">
                <?php if (metadata('item', 'has files')): ?>
                    <?php echo link_to_item(item_image(null, ['alt' => '']), ['class' => 'image']); ?>
                <?php endif; ?>

                <?php if ($description = metadata('item', ['Dublin Core', 'Description'], ['snippet' => 250])): ?>
                <div class="item-description">
                    <?php echo $description; ?>
                </div>
                <?php endif; ?>

                <?php if (metadata('item', 'has tags')): ?>
                <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
                    <?php echo tag_string('items'); ?></p>
                </div>
                <?php endif; ?>

            </div>
        </div>
        <?php endforeach; ?>
        <?php echo link_to_items_browse(__(plural('View item', 'View all %s items', $totalItems), $totalItems), ['collection' => metadata('collection', 'id')], ['class' => 'view-items-link']); ?>
    <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>
</div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', ['view' => $this, 'collection' => $collection]); ?>

<?php echo foot(); ?>
