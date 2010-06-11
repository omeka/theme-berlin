<?php 
// Use this file to define customized helper functions, filters or 'hacks' defined
// specifically for use in your Omeka theme. Note that helper functions that are
// designed for portability across themes should be grouped into a plugin whenever
// possible. Ideally, you should namespace these with your theme name.

add_filter(array('Display', 'Item', 'Dublin Core', 'Title'), 'berlin_show_untitled_items');

function berlin_show_untitled_items($title)
{
    // Remove all whitespace and formatting before checking to see if the title 
    // is empty.
    $prepTitle = trim(strip_formatting($title));
    if (empty($prepTitle)) {
        return '[Untitled]';
    }
    return $title;
}

/**
 * This function checks the Logo theme option, then returns either an
 * image tag with the logo as the src, or returns null.
 *
 **/
function berlin_display_logo()
{
    if(function_exists('get_theme_option')) {
        
        $logo = get_theme_option('Logo');
        
        $logoPath = WEB_THEME_UPLOADS.DIRECTORY_SEPARATOR.$logo;
        
	    $siteTitle = $logo ? '<img src="'.$logoPath.'" title="'.settings('site_title').'" />' : null;
	
	    return $siteTitle;
    }
    
    return null;
}

function berlin_show_item_metadata(array $options = array(), $item = null)
{
    if (!$item) {
        $item = get_current_item();
    }
	if ($dcFieldsList = get_theme_option('display_dublin_core_fields')) {
	    $html = '';
	    $dcFields = explode(',', $dcFieldsList);
	    foreach ($dcFields as $field) {
	        $field = trim($field);
	        if ($fieldValue = item('Dublin Core', $field)) {
	            $html .= '<h3>'.$field.'</h3>';
	            $html .= $fieldValue;
	        }
	    }
	    $html .= show_item_metadata(array('show_element_sets' => array('Item Type Metadata')));
	    return $html;
	} else {
	    return show_item_metadata($options, $item); 
    }
}

function berlin_public_nav_header()
{    
    if ($customHeaderNavigation = get_theme_option('custom_header_navigation')) {
        $navArray = array();
        $customLinkPairs = explode("\n", $customHeaderNavigation);
        foreach ($customLinkPairs as $pair) {
            $pair = trim($pair);
            if ($pair != '') {
                $pairArray = explode('|', $pair, 2);
                if (count($pairArray) == 2) {
                    $link = trim($pairArray[0]);
                    $url = trim($pairArray[1]); 
                    if (!string_begins_with($url, 'http://') && !string_begins_with($url, 'https://')){
                        $url = uri($url);
                    }
                }
                $navArray[$link] = $url;
            }
        }
        return nav($navArray);
    } else {
        $navArray = array('Browse Items' => uri('items'), 'Browse Collections'=>uri('collections'));
        return public_nav_main($navArray);
    }
}

// General helpers
function string_begins_with($string, $search)
{
    return (strncmp($string, $search, strlen($search)) == 0);
}