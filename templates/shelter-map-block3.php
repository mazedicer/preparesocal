<?php 
$mc_shelter_block3 = '<section style="margin-top:0px; margin-bottom:50px;">
    <a name="shelter-map-block3"></a>
    <div class="gcbBG gcbBG13140 ">
        <div class="container-fluid gcb shelter-map-block3 ID13140">
            <div class="row">
                <h3>Shelter FAQ</h3>
            </div>
        </div>
    </div>
</section>';
echo $mc_shelter_block3;
//custom fields from FAQ, FAQ2, FAQ3 groups 
while(have_posts()){
    the_post();
    while( have_rows('faq_page') ){
        the_row();
        echo get_sub_field('faq_title')."<br>";
        echo get_sub_field('faq_section_1')."<br>";
        echo get_sub_field('faq_image')."<br>";
    }
}
?>