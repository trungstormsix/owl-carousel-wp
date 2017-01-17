jQuery(document).ready(function($) {
    /**
     *  manage images of slide
     *  
     **/
    getImages();
    /**
     **  call sortable for each elements. (need jquery-ui)
     **/
    jQuery('#config_slides').sortable({
        items: '.config_slide_element',
        update: function(event, ui) {
            getImages();
        }
    });
    /***
     **   call open media of default wordpress
     **/
    var tgm_media_frame;
    jQuery('#insert-media-button').click(function() {
        if (tgm_media_frame) {
            tgm_media_frame.open();
            return;
        }
        tgm_media_frame = wp.media.frames.tgm_media_frame = wp.media({
            multiple: true,
            library: {
                type: 'image'
            },
        });
        tgm_media_frame.on('select', function() {
            var selection = tgm_media_frame.state().get('selection');
            selection.map(function(attachment) {
                attachment = attachment.toJSON();
//                console.log(attachment);
                //add slide to slides
                jQuery("#config_slides").append("<div class='config_slide_element'>" + '<button class="button-link media-modal-close" type="button"><span class="media-modal-icon"><span class="screen-reader-text">Close media panel</span></span></button>' + "<img  src='" + attachment.url + "'><div class='config_slide_info'><h1>" + attachment.title + "</h1><p class='config_description'>" + attachment.description + "</p'><p class='config_url hidden'>" + attachment.url + "</p></div></div>");
            });
            getImages();
        });
        tgm_media_frame.open();
    });
    /**
     **  remove image from slides
     **/
    jQuery("#config_slides").on("click", ".media-modal-close", function(e) {      
            jQuery(this).closest(".config_slide_element").remove();
            jQuery('.edit_slide_content').hide(500);
            if(isPreview){  getImages(); preview(); }
        })
        /**
         ** select image to edit slide information
         **/
    jQuery("#config_slides").on("click", ".config_slide_element", function(e) {
        if(jQuery(e.target).hasClass('media-modal-close')) return;
            jQuery(this).toggleClass("selected").siblings().removeClass("selected");
            if (jQuery(this).hasClass("selected")) {
                jQuery('.edit_slide_content').show(500);
                //alert(jQuery(".config_slide_element.selected> img").attr('src'));
                jQuery("#slide_url").val(jQuery(".config_slide_element.selected > img").attr('src'));
                jQuery("#slide_title").val(jQuery(this).find(".config_slide_info > h1").html());
                jQuery("#slide_description").val(jQuery(this).find(".config_slide_info > .config_description").html());
                jQuery("#slide_info").val(jQuery(this).find(".config_slide_info > .config_info").html());
            } else {
                jQuery('.edit_slide_content').hide(500);
                jQuery("#slide_title").val("");
                jQuery("#slide_description").val("");
                jQuery("#slide_info").val("");
            }
        })
        /**
         ** select image to edit slide information
         **/
    jQuery(".edit_slide_content .apply_slide_content ").on("click", function(e) {
        jQuery("#config_slides .selected .config_slide_info > h1").html(jQuery("#slide_title").val());
        jQuery("#config_slides .selected .config_slide_info > .config_description").html(jQuery("#slide_description").val());
        jQuery("#config_slides .selected .config_slide_info > .config_info").html(jQuery("#slide_info").val());
        getImages();
        if(isPreview){
            preview();
            jQuery('.edit_slide_content').hide(500);
            jQuery('.config_slide_element.selected').removeClass('selected');
        }

        e.preventDefault();
        return;
    });

    function getImages() {
        images = [];
        i = 0;
        jQuery("#config_slides").find(".config_slide_element").each(function() {
            img = new Object();
            img.title = jQuery(this).find('.config_slide_info h1').html();
            img.description = jQuery(this).find('.config_slide_info .config_description').html();
            img.info = jQuery(this).find('.config_slide_info .config_info').html();
            img.src = jQuery(this).find('.config_slide_info .config_url').html();
            images[i++] = img;
        })
         jQuery("#input_image_links").val(JSON.stringify(images));
    }
    /***
     **
     **  validate form
     ** 
     ***/
    jQuery("#editSlide").submit(function(event) {
        var name = jQuery(this).find("input[name=name]")
        if (!name.val()) {
            name.addClass("error");
            jQuery('html, body').animate({
                scrollTop: jQuery("#editSlide").offset().top
            }, 200);
            event.preventDefault();
        }
    });
    jQuery("#editSlide input[name=name]").keyup(function(){
      if(jQuery(this).val()){
        jQuery(this).removeClass("error");
      }
    })
    jQuery("#editSlide input[name=name],#editSlide input[name=content]").on("change", function(){

     if(isPreview){
            preview();
        }
    });

    //copy shortcode
    jQuery(".click_copy").on("click", function(){
        copyToClipboard(this);
    })
    
   
});
function copyToClipboard(element) {    
    var $temp = jQuery("<input>")
    jQuery("body").append($temp);
    $temp.val(jQuery(element).text()).select();
    document.execCommand("copy");
    jQuery(element).css("color","green");
    setTimeout(function(){jQuery(element).css("color","");}, 3000);
    $temp.remove();
}