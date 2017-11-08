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
//if ( $defaultTypeofPage == "normal" ) {
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
    /*pull shelter data*/
    $wpgm_array=[];
    $the_query = new WP_Query( 'post_type=Shelters' );
    if ( $the_query->have_posts() ) {
        $location=array();
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $id=get_the_ID();
            $title=get_the_title();
            $address=get_field('shelter_address',$id);
            $status=get_field('shelter_status',$id);
            $phone_number=get_field('shelter_phone_number',$id);
            $capacity=get_field('shelter_capacity',$id);
            $services=get_field('shelter_services',$id);
            /*if(is_array($services)){
                foreach($services as $service){
                    
                }
            }*/
            $location['ID']=$id;
            $location['Title']=$title;
            $location['Address']=$address;
            $location['Latitude']="";
            $location['Longitude']="";
            $location['Status']=$status;
            $location['Phone Number']=$phone_number;
            $location['Capacity']=$capacity;
            $location['Services']=$services;
            array_push($wpgm_array,$location);
            $location=array();
        }
    }
    $wpgm='<script>var addresses='.json_encode($wpgm_array).';</script>';
    $main_template=file_get_contents(get_stylesheet_directory_uri().'/templates/view/normal.php');
    $section_find_open_shelters=file_get_contents(get_stylesheet_directory_uri().'/templates/view/section-find-open-shelters.php');
    $section_googlemap_pre=file_get_contents(get_stylesheet_directory_uri().'/templates/view/section-googlemap.php');
    $driving_directions=file_get_contents(get_stylesheet_directory_uri().'/templates/view/driving-directions.php');
    $section_googlemap=str_replace('{directions}',$driving_directions,$section_googlemap_pre);
    $section_faq=file_get_contents(get_stylesheet_directory_uri().'/templates/view/section-faq.php');
    $sections=$section_find_open_shelters.$section_googlemap.$section_faq;
    $replace=['{ahs}','{mainContentCSS}','{breadcrumbs}','{defaultContentEditor}','{wpgm}','{sections}'];
    $replace_with=[$pc_ahs,$mainContentCSS,$breadcrumbs,$defaultContentEditor,$wpgm,$sections];
    $content=str_replace($replace,$replace_with,$main_template);
    echo $content;
//}
if ( $defaultTypeofPage == "gcbs" ) {
    echo "General content blocks are disabled on this template";
}
?>