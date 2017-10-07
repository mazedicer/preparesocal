<?php
$footerCompanyName=get_field( 'footerCompanyName', 'option' );
get_template_part( 'templates/footer', 'sections' );
$current_year=do_shortcode( '[currentyear]' );
$logo=ds_logo_color();
$privacy_policy_url="";
$terms_of_use="";
$contact_us="";
////////////////////////////////////////////////////////////////////////////////////////////////////
//FOOTER TEMPLATE
////////////////////////////////////////////////////////////////////////////////////////////////////
$mc_footer_template='<footer id="footerCustom">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div class="footer-left-content text-white">
                                        <h3>Stay in the Know</h3>
                                        <p>Be on top of what is going on in your community.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-row align-items-center">
                                        <div class="form-row align-items-center">
                                            <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="form-row align-items-center">
                                            <button type="submit" class="btn btn-danger">Sign Up</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="footerCopyright text-xs-center">
                            <p>Copyright © {current_year} The American Red Cross | Site Maintained by DesignStudio | <a href="{privacy_policy_url}">Privacy Policy</a> | <a href="{terms_of_use}">Terms of Use</a> | <a href="{contact_us}">Contact Us</a></p>
                        </div>
                    </footer>';

$mc_footer_replace=array("{current_year}","{logo}","{privacy_policy_url}","{terms_of_use}","{contact_us}");
$mc_footer_replace_with=array($current_year,$logo,$privacy_policy_url,$terms_of_use,$contact_us);
$mc_footer = str_replace($mc_footer_replace,$mc_footer_replace_with,$mc_footer_template);
echo $mc_footer;
?>