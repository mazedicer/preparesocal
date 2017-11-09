<div id="faq_accordionp{faq_index}" data-children=".item">
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
</div>