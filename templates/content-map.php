<?php
/* Display Advanced Hero Section */
$AHS=do_shortcode( '[AHS]' );
$pc_ahs="";
if($AHS==""){
    $pc_ahs='<div id="noAHS"></div>';
} else {
    $pc_ahs=$AHS;
}
$pageID=get_the_ID();
$breadcrumbs=PageBreadcrumbs( $pageID );
$defaultPageTitleQ=get_field( 'defaultPageTitleQ', $pageID );
/* Check if normal or build by content blocks */
$defaultTypeofPage=get_field( 'defaultTypeofPage', $pageID );
/* Page is build by normal Wysiwyg editor */
if ( $defaultTypeofPage == "normal" ) {
    /* default template advanced custom fields */
    $mainContentBlockOption = get_field( 'mainContentBlockOption', $pageID );
    if ( $mainContentBlockOption == "over" ) {
        $mainContentOverHero  = get_field( 'mainContentOverHero', $pageID );
        $mainContentOverEdges = get_field( 'mainContentOverEdges', $pageID );
        $mainContentBGColor   = get_field( 'mainContentBGColor', $pageID );
        if ( $mainContentBGColor == "" ) {
            $mainContentBGColor = "transparent";
        }
        /* set variable with the css needed to make the main content over the hero */
        $mainContentClass = "container";
        if ( $mainContentOverEdges == "softened" ) {
            $mainContentCSS = "border-radius:15px; background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
        } elseif ( $mainContentOverEdges == "round" ) {
            $mainContentCSS = "border-radius:45px; background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
        } elseif ( $mainContentOverEdges == 'circle' ) {
            $mainContentCSS="background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; border-top-right-radius: 99999px; border-top-left-radius: 99999px;";
        } else {
            $mainContentCSS = "background:" . $mainContentBGColor . "; position:relative; z-index:2; display:block; min-height:200px; margin-top: -" . $mainContentOverHero . "vh;";
        }
    }
    $defaultContentEditor = get_field( "defaultContentEditor", $pageID );
    $main_template=file_get_contents(get_stylesheet_directory_uri().'/templates/view/normal.php');
    $section_find_open_shelters=file_get_contents(get_stylesheet_directory_uri().'/templates/view/section-find-open-shelters.php');
    $section_faq=file_get_contents(get_stylesheet_directory_uri().'/templates/view/section-faq.php');
    $sections=$section_find_open_shelters.$section_faq;
    $replace=['{ahs}','{mainContentCSS}','{breadcrumbs}','{defaultContentEditor}','{sections}'];
    $replace_with=[$pc_ahs,$mainContentCSS,$breadcrumbs,$defaultContentEditor,$sections];
    $content=str_replace($replace,$replace_with,$main_template);
    echo $content;
}
if ( $defaultTypeofPage == "gcbs" ) {
    echo "General content blocks are disabled on this template";
}
?>