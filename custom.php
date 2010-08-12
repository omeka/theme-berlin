<?php 
// Use this file to define customized helper functions, filters or 'hacks' defined
// specifically for use in your Omeka theme. Note that helper functions that are
// designed for portability across themes should be grouped into a plugin whenever
// possible. Ideally, you should namespace these with your theme name.

add_filter(array('Display', 'Item', 'Dublin Core', 'Title'), 'berlin_show_untitled_items');

require_once 'functions.php';