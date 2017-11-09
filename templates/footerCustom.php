<?php
$footerCompanyName=get_field( 'footerCompanyName', 'option' );
get_template_part( 'templates/footer', 'sections' );
$current_year=do_shortcode( '[currentyear]' );
$logo=ds_logo_color();
$privacy_policy_url="";
$terms_of_use="";
$contact_us="";
$mc_footer_template=file_get_contents(get_stylesheet_directory_uri().'/templates/footer.php');
$mc_footer_replace=array("{current_year}","{logo}","{privacy_policy_url}","{terms_of_use}","{contact_us}");
$mc_footer_replace_with=array($current_year,$logo,$privacy_policy_url,$terms_of_use,$contact_us);
$mc_footer = str_replace($mc_footer_replace,$mc_footer_replace_with,$mc_footer_template);
echo $mc_footer;
?>