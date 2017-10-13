
<section style="margin-top:0px; margin-bottom:50px;">
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
                                <div id="exampleAccordion" data-children=".item">
                                    <!-- child item -->
                                    <div class="item">
                                        <a data-toggle="collapse" data-parent="#exampleAccordion" href="#exampleAccordion1" aria-expanded="true" aria-controls="exampleAccordion1">
                                            Who can stay in a Red Cross shelter?
                                        </a>
                                        <div id="exampleAccordion1" class="collapse show" role="tabpanel">
                                            <p class="faq-item-text mb-3">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium lorem non vestibulum scelerisque. Proin a vestibulum sem, eget tristique massa. Aliquam lacinia rhoncus nibh quis ornare.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- child item -->
                                    <div class="item">
                                        <a data-toggle="collapse" data-parent="#exampleAccordion" href="#exampleAccordion2" aria-expanded="false" aria-controls="exampleAccordion2">
                                            No need for a reservation, just show up
                                        </a>
                                        <div id="exampleAccordion2" class="collapse" role="tabpanel">
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
</section>
<?php 

$faq_container_template = '<div class="container-fluid faq-container">
                    <div class="row faq-content">
                        <div class="faq-body">
                            <div class="col-md-5 faq-image-container">
                                <img class="faq-image" src="../wp-content/themes/persuader-child/assets/img/SHELTER-MAP/who-is-elligible.jpg" alt="who is eligible"/>    
                            </div>
                            <div class="col-md-7 faq-topics">
                                <!-- parent -->
                                <h4>Who Is Eligible?</h4>
                                <div id="exampleAccordion" data-children=".item">
                                    <!-- child item -->
                                    <div class="item">
                                        <a data-toggle="collapse" data-parent="#exampleAccordion" href="#exampleAccordion1" aria-expanded="true" aria-controls="exampleAccordion1">
                                            Who can stay in a Red Cross shelter?
                                        </a>
                                        <div id="exampleAccordion1" class="collapse show" role="tabpanel">
                                            <p class="faq-item-text mb-3">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium lorem non vestibulum scelerisque. Proin a vestibulum sem, eget tristique massa. Aliquam lacinia rhoncus nibh quis ornare.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- child item -->
                                    <div class="item">
                                        <a data-toggle="collapse" data-parent="#exampleAccordion" href="#exampleAccordion2" aria-expanded="false" aria-controls="exampleAccordion2">
                                            No need for a reservation, just show up
                                        </a>
                                        <div id="exampleAccordion2" class="collapse" role="tabpanel">
                                            <p class="faq-item-text mb-3">
                                                Donec at ipsum dignissim, rutrum turpis scelerisque, tristique lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus nec dui turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';




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