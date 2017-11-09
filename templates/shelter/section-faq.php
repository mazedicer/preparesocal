<?php
$main_faq_section_template='<section style="margin-top:0px; margin-bottom:50px;">
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
$faq_container_template='<div class="container-fluid faq-container">
                    <div class="row faq-content">
                        <div class="faq-body">
                            <div class="col-md-5 faq-image-container">
                                <img class="faq-image" src="{faq_image_url}" alt="{faq_title}"/>    
                            </div>
                            <div class="col-md-7 faq-topics">
                                <div class="accordions-div">
                                    <!-- parent -->
                                    <h4>{faq_title}</h4>
                                    {faq_container_sections}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
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
//custom fields from FAQs Page 
$final_faq_content='';
$faq_containers='';
/*
while(have_posts()){
    the_post();
    $faq_index=1;
    while( have_rows('faq_page') ){
        the_row();
        $faq_container='';
        $faq_sections='';
        $faq_image=get_sub_field('faq_image');
        $faq_title=get_sub_field('faq_title');
        $faqs=get_sub_field('faqs');
        if(have_rows($faqs)){
            while(have_rows($faqs)){
                the_row();
                $faq_question=get_sub_field('faq_question');
                $faq_answer=get_sub_field('faq_answer');
                $faq_sections.=str_replace(['{faq_index}','{faq_section}','{faq_section_content}'],[$faq_index,$faq_question,$faq_answer],$faq_container_section_template);
                $faq_index++;
            }
        }
        $faq_container=str_replace(['{faq_image_url}','{faq_title}','{faq_container_sections}'],[$faq_image,$faq_title,$faq_sections],$faq_container_template);
        $faq_containers.=$faq_container;
    }
    $final_faq_content=str_replace('{faq_containers}',$faq_containers,$main_faq_section_template);
}*/
?>

<!-- <section>
    <a name="shelter-map-block3"></a>
    <div class="gcbBG">
        <div class="container-fluid gcb shelter-map-block3">
            <div class="row">
                <h3>Shelter FAQ</h3>
                <div class="container-fluid faq-container"> 
                    <div class="row faq-content"> 
                        <div class="faq-body"> 
                            <div class="col-md-5 faq-image-container"> 
                                <img class="faq-image" src="/wp-content/uploads/who-is-elligible.jpg" alt="Who Is Eligible?"/> 
                            </div>
                            <div class="col-md-7 faq-topics"> 
                                <div class="accordions-div">
                                    <h4>Who Is Eligible?</h4> 
                                    <div id="faq_accordionp1" data-children=".item"> 
                                        <div class="item"> 
                                            <a data-toggle="collapse" data-parent="#faq_accordionp1" href="#faq_accordion1" aria-expanded="true" aria-controls="faq_accordion1"> Who can stay in a Red Cross shelter? </a> 
                                            <div id="faq_accordion1" class="collapse show" role="tabpanel"> 
                                                <p class="faq-item-text mb-3"> Content... </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="faq_accordionp2" data-children=".item"> 
                                        <div class="item"> 
                                            <a data-toggle="collapse" data-parent="#faq_accordionp2" href="#faq_accordion2" aria-expanded="true" aria-controls="faq_accordion2"> No need for a reservation, just show up </a> 
                                            <div id="faq_accordion2" class="collapse show" role="tabpanel"> 
                                                <p class="faq-item-text mb-3"> Content... </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="faq_accordionp3" data-children=".item"> 
                                        <div class="item"> 
                                            <a data-toggle="collapse" data-parent="#faq_accordionp3" href="#faq_accordion3" aria-expanded="true" aria-controls="faq_accordion3"> Let us know if you have special needs </a> 
                                            <div id="faq_accordion3" class="collapse show" role="tabpanel"> 
                                                <p class="faq-item-text mb-3"> content... </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid faq-container"> 
                    <div class="row faq-content"> 
                        <div class="faq-body"> 
                            <div class="col-md-5 faq-image-container"> 
                                <img class="faq-image" src="/wp-content/uploads/what-not-to-bring.jpg" alt="What to Bring(And What Not to Bring)"/> 
                            </div>
                            <div class="col-md-7 faq-topics"> 
                                <div class="accordions-div">
                                    <h4>What to Bring(And What Not to Bring)</h4> 
                                    <div id="faq_accordionp4" data-children=".item"> 
                                        <div class="item"> 
                                            <a data-toggle="collapse" data-parent="#faq_accordionp4" href="#faq_accordion4" aria-expanded="true" aria-controls="faq_accordion4"> What to pack </a> 
                                            <div id="faq_accordion4" class="collapse show" role="tabpanel"> 
                                                <p class="faq-item-text mb-3"> Content... </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="faq_accordionp5" data-children=".item"> 
                                        <div class="item"> 
                                            <a data-toggle="collapse" data-parent="#faq_accordionp5" href="#faq_accordion5" aria-expanded="true" aria-controls="faq_accordion5"> What about pets? </a> 
                                            <div id="faq_accordion5" class="collapse show" role="tabpanel"> 
                                                <p class="faq-item-text mb-3"> Content... </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid faq-container"> 
                    <div class="row faq-content"> 
                        <div class="faq-body"> 
                            <div class="col-md-5 faq-image-container"> 
                                <img class="faq-image" src="/wp-content/uploads/services-offered.jpg" alt="Services Offered"/> 
                            </div>
                            <div class="col-md-7 faq-topics"> 
                                <div class="accordions-div">
                                    <h4>Services Offered</h4> 
                                    <div id="faq_accordionp6" data-children=".item"> 
                                        <div class="item"> 
                                            <a data-toggle="collapse" data-parent="#faq_accordionp6" href="#faq_accordion6" aria-expanded="true" aria-controls="faq_accordion6"> During a disaster or emergency, you can rely on Red Cross shelters for: </a> 
                                            <div id="faq_accordion6" class="collapse show" role="tabpanel"> 
                                                <p class="faq-item-text mb-3"> Content... </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="faq_accordionp7" data-children=".item"> 
                                        <div class="item"> 
                                            <a data-toggle="collapse" data-parent="#faq_accordionp7" href="#faq_accordion7" aria-expanded="true" aria-controls="faq_accordion7"> Leaving the shelter / When you return home </a> 
                                            <div id="faq_accordion7" class="collapse show" role="tabpanel"> 
                                                <p class="faq-item-text mb-3"> Content... </p>
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
    </div>
</section> -->