
<?php 
$full_template_sample='<section style="margin-top:0px; margin-bottom:50px;">
    <a name="shelter-map-block3"></a>
    <div class="gcbBG gcbBG13140 ">
        <div class="container-fluid gcb shelter-map-block3 ID13140">
            <div class="row">
                <h3>Shelter FAQ</h3>
                <!-- block3 starts here -->
                <div class="container-fluid faq-container">
                    <div class="row faq-content">
                        <div class="faq-body">
                            <div class="col-md-5 faq-image-container">
                                <img class="faq-image" src="../wp-content/themes/persuader-child/assets/img/SHELTER-MAP/who-is-elligible.jpg" alt="who is eligible"/>    
                            </div>
                            <div class="col-md-7 faq-topics">
                                <!-- parent -->
                                <h4>Who Is Eligible?</h4>
                                <div id="faq_accordion" data-children=".item">
                                    <!-- child item -->
                                    <div class="item">
                                        <a data-toggle="collapse" data-parent="#faq_accordion" href="#faq_accordion1" aria-expanded="true" aria-controls="faq_accordion1">
                                            Who can stay in a Red Cross shelter?
                                        </a>
                                        <div id="faq_accordion1" class="collapse show" role="tabpanel">
                                            <p class="faq-item-text mb-3">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium lorem non vestibulum scelerisque. Proin a vestibulum sem, eget tristique massa. Aliquam lacinia rhoncus nibh quis ornare.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- child item -->
                                    <div class="item">
                                        <a data-toggle="collapse" data-parent="#faq_accordion" href="#faq_accordion2" aria-expanded="false" aria-controls="faq_accordion2">
                                            No need for a reservation, just show up
                                        </a>
                                        <div id="faq_accordion2" class="collapse" role="tabpanel">
                                            <p class="faq-item-text mb-3">
                                                Donec at ipsum dignissim, rutrum turpis scelerisque, tristique lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus nec dui turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
$shelter_map_block3_template = '<section style="margin-top:0px; margin-bottom:50px;">
                                    <a name="shelter-map-block3"></a>
                                    <div class="gcbBG gcbBG13140 ">
                                        <div class="container-fluid gcb shelter-map-block3 ID13140">
                                            <div class="row">
                                                <h3>Shelter FAQ</h3>
                                                <!-- block3 starts here -->
                                                {faq_containers}
                                            </div>
                                        </div>
                                    </div>
                                </section>';
$faq_container_section_template='<div id="faq_accordionp{faq_index}" data-children=".item">
                                    <!-- child item -->
                                    <div class="item">
                                        <a data-toggle="collapse" data-parent="#faq_accordionp{faq_index}" href="#faq_accordion{faq_index}" aria-expanded="true" aria-controls="faq_accordion{faq_index}">
                                            {faq_section}
                                        </a>
                                        <div id="faq_accordion{faq_index}" class="collapse show" role="tabpanel">
                                            <p class="faq-item-text mb-3">
                                                {faq_section_content}
                                            </p>
                                        </div>
                                    </div>
                                </div>';
$faq_container_template='<div class="container-fluid faq-container">
                    <div class="row faq-content">
                        <div class="faq-body">
                            <div class="col-md-5 faq-image-container">
                                <img class="faq-image" src="{faq_image_url}" alt="{faq_title}"/>    
                            </div>
                            <div class="col-md-7 faq-topics">
                                <!-- parent -->
                                <h4>{faq_title}</h4>
                                {faq_container_sections}
                            </div>
                        </div>
                    </div>
                </div>';

echo $mc_shelter_block3;
//custom fields from FAQ, FAQ2, FAQ3 groups 
while(have_posts()){
    the_post();
    $faq_index=1;
    $faq_containers='';
    while( have_rows('faq_page') ){
        the_row();
        $faq_container='';
        $faq_sections='';
        $faq_image=get_sub_field('faq_image');
        $faq_title=get_sub_field('faq_title');
        $faq_section_1=get_sub_field('faq_section_1');
        $faq_section_1_content=get_sub_field('faq_section_1_content');
        $faq_section_2=get_sub_field('faq_section_2');
        $faq_section_2_content=get_sub_field('faq_section_2_content');
        $faq_section_3=get_sub_field('faq_section_3');
        $faq_section_3_content=get_sub_field('faq_section_3_content');
        $section_1=isThereSection($faq_section_1,$faq_section_1_content);
        if(is_array($section_1)){
            //add section 1
            $faq_sections.=str_replace(['{faq_index}','{faq_section}','{faq_section_content}'],[$faq_index,$section_1[0],$section_1[1]],$faq_container_section_template);
            $faq_index++;
        }
        $section_2=isThereSection($faq_section_2,$faq_section_2_content);
        if(is_array($section_2)){
            //add section 2
            $faq_sections.=str_replace(['{faq_index}','{faq_section}','{faq_section_content}'],[$faq_index,$section_2[0],$section_2[1]],$faq_container_section_template);
            $faq_index++;
        }
        $section_3=isThereSection($faq_section_3,$faq_section_3_content);
        if(is_array($section_3)){
            //add section 3
            $faq_sections.=str_replace(['{faq_index}','{faq_section}','{faq_section_content}'],[$faq_index,$section_3[0],$section_3[1]],$faq_container_section_template);
            $faq_index++;
        }
        $faq_container=str_replace(['{faq_image_url}','{faq_title}','{faq_container_sections}'],[$faq_image,$faq_title,$faq_sections],$faq_container_template);
        $faq_containers.=$faq_container;
    }
    $final_content=str_replace('{faq_containers}',$faq_containers,$shelter_map_block3_template);
    echo $final_content;
}
function isThereSection($faq_section,$faq_section_content){
    if($faq_section!==''){
        return array($faq_section,$faq_section_content);
    }
}
?>