<style>
    .ahsContent {
        display:none !important;
    }
</style>
{ahs}
<div class="bodyContent">
    <div class="container normalPage" style="{mainContentCSS}">
        {breadcrumbs}
        {defaultContentEditor}
    </div>
    {sections}
</div>
<script>
    $(document).ready(function() {
        //fires every time window is resized
        window.addEventListener('resize', function (){
            shelterMapHeaderTitle();
        });
        //shelter-map header title
        shelterMapHeaderTitle();
        function shelterMapHeaderTitle(){
            var shelter_header=$('div.header-overlay');
            shelter_header.css("padding-right", "80px");
            var shelter_hero=$('.ahsBuild');
            var dimh=(shelter_hero.height()/2)+(shelter_header.height());
            var winw=$(window).width();
            var dimw=(winw-340)/2;
            if($(window).width()<380){
                shelter_header.css("padding-right", "40px");
                var dimhb=(shelter_hero.height()/7)+(shelter_header.height());
                shelter_header.offset({top:dimhb,left:dimw});
            }else if($(window).width()<541){
                var dimhb=(shelter_hero.height()/7)+(shelter_header.height());
                shelter_header.offset({top:dimhb,left:dimw});
            }else if($(window).width()<769){
                var dimhc=(shelter_hero.height()/2)+(shelter_header.height());
                var dimwc=(winw-640)/2;
                shelter_header.offset({top:dimhc,left:dimwc});
            }else{
                shelter_header.offset({top:dimh});
            }
        }
    });
</script>