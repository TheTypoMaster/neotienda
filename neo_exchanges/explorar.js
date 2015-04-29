//Dropdown explore menu
jQuery(document).ready(function(){
        //mobile menu
	jQuery('.icon-menu-mobile').click( function(){
		//jQuery('.menu-wrapper').toggle();
                jQuery('.menu-wrapper-mobile').toggle();
		jQuery(this).toggleClass('close');
		jQuery(this).parent().toggleClass('open');
	});
    
	jQuery("#explore").mouseover( function(){
		ShowDropdownMenu();
	});

	jQuery("#explore").click( function(){
		ToggleDropdownMenu();
	});

	jQuery(document).mousemove(function(){
		if(!jQuery("#explore-menu").is(':hover') && !jQuery("#explore").is(':hover')){
			HideDropdownMenu();
		}
	});
        
        jQuery("#ps").mouseover( function(){
            jQuery(".consolas .col-der").css("height", "360px");
            jQuery("#ps").addClass("active");
            jQuery("#col-consola-ps").addClass("active");
            jQuery("#xbox, #nintendo, #steam, #itunes").removeClass("active");
            jQuery("#col-consola-xbox, #col-consola-nintendo, #col-steam, #col-itunes").removeClass("active");
	});
        
        jQuery("#xbox").mouseover( function(){
            jQuery(".consolas .col-der").css("height", "360px");
            jQuery("#xbox").addClass("active");
            jQuery("#col-consola-xbox").addClass("active");
            jQuery("#ps, #nintendo, #steam, #itunes").removeClass("active");
            jQuery("#col-consola-ps, #col-consola-nintendo, #col-steam, #col-itunes").removeClass("active");
	});
        
        jQuery("#nintendo").mouseover( function(){
            jQuery(".consolas .col-der").css("height", "360px");
            jQuery("#nintendo").addClass("active");
            jQuery("#col-consola-nintendo").addClass("active");
            jQuery("#ps, #xbox, #steam, #itunes").removeClass("active");
            jQuery("#col-consola-ps, #col-consola-xbox, #col-steam, #col-itunes").removeClass("active");
	});
        
        jQuery("#steam").mouseover( function(){
            jQuery(".consolas .col-der").css("height", "360px");
            jQuery("#steam").addClass("active");
            jQuery("#col-steam").addClass("active");
            jQuery("#ps, #xbox, #nintendo, #itunes").removeClass("active");            
            jQuery("#col-consola-ps, #col-consola-xbox, #col-consola-nintendo, #col-itunes").removeClass("active");
	});
        
        jQuery("#itunes").mouseover( function(){
            jQuery(".consolas .col-der").css("height", "360px");
            jQuery("#itunes").addClass("active");
            jQuery("#col-itunes").addClass("active");
            jQuery("#ps, #xbox, #nintendo, #steam").removeClass("active");            
            jQuery("#col-consola-ps, #col-consola-xbox, #col-consola-nintendo, #col-steam").removeClass("active");
	});
        
    /* MOBILE */
        
        jQuery("#ps-mobile").click( function(){
            jQuery(".consolas .col-der").css("height", "344px");
            jQuery(".consolas .col-der").show();
            jQuery(".consolas .col-izq").hide();
            jQuery("#ps-mobile").addClass("active");
            jQuery("#col-consola-ps-mobile").addClass("active");
            jQuery("#xbox-mobile").removeClass("active");
            jQuery("#nintendo-mobile").removeClass("active");
            jQuery("#col-consola-xbox-mobile").removeClass("active");
            jQuery("#col-consola-nintendo-mobile").removeClass("active");
	});
        
        jQuery("#xbox-mobile").click( function(){
            jQuery(".consolas .col-der").css("height", "244px");
            jQuery(".consolas .col-der").show();
            jQuery(".consolas .col-izq").hide();
            jQuery("#xbox-mobile").addClass("active");
            jQuery("#col-consola-xbox-mobile").addClass("active");
            jQuery("#ps-mobile").removeClass("active");
            jQuery("#nintendo-mobile").removeClass("active");
            jQuery("#col-consola-ps-mobile").removeClass("active");
            jQuery("#col-consola-nintendo-mobile").removeClass("active");
	});
        
        jQuery("#nintendo-mobile").click( function(){
            jQuery(".consolas .col-der").css("height", "344px");
            jQuery(".consolas .col-der").show();
            jQuery(".consolas .col-izq").hide();
            jQuery("#nintendo-mobile").addClass("active");
            jQuery("#col-consola-nintendo-mobile").addClass("active");
            jQuery("#ps-mobile").removeClass("active");
            jQuery("#xbox-mobile").removeClass("active");
            jQuery("#col-consola-ps-mobile").removeClass("active");
            jQuery("#col-consola-xbox-mobile").removeClass("active");
	});
        
        jQuery("#pc-network-mobile").click( function(){
            jQuery(".consolas .col-der").css("height", "344px");
            jQuery(".consolas .col-der").show();
            jQuery(".consolas .col-izq").hide();
            jQuery("#pc-network-mobile").addClass("active");
            jQuery("#col-pc-network-mobile").addClass("active");
            jQuery("#ps-mobile, #xbox-mobile, #apple-itunes-mobile").removeClass("active");
            jQuery("#col-consola-ps-mobile, #col-consola-xbox-mobile, #col-apple-itunes-mobile").removeClass("active");
	});
        
        jQuery("#apple-itunes-mobile").click( function(){
            jQuery(".consolas .col-der").css("height", "344px");
            jQuery(".consolas .col-der").show();
            jQuery(".consolas .col-izq").hide();
            jQuery("#apple-itunes-mobile").addClass("active");
            jQuery("#col-apple-itunes-mobile").addClass("active");
            jQuery("#ps-mobile, #xbox-mobile, #pc-network-mobile").removeClass("active");
            jQuery("#col-consola-ps-mobile, #col-consola-xbox-mobile, #col-pc-network-mobile").removeClass("active");
	});
        
        jQuery(".col-consola .atras").click( function(){
            jQuery(".consolas .col-der").hide();
            jQuery(".consolas .col-izq").show();
        });
        
        jQuery(".col-consola ul li").hover(function() {
            //doBounce(jQuery(this), 2, '10px', 150);
            jQuery(this).stop().animate({ top: -10 }, 'fast')
                .animate({ top: -5 }, 'fast')
                .animate({ top: -10 }, 'fast');
        }, function() {
            jQuery(this).stop().animate({ top: 0 }, 'fast')
                .animate({ top: -5 }, 'fast')
                .animate({ top: 0 }, 'fast');
        });
	
});

function ShowDropdownMenu(){
    if (screen.width > 800) {
        //alert(screen.width);
        if (screen.width >= 365 && screen.width <= 800) {
            jQuery("#explore-menu-tablet").css("display", "none");
            jQuery("#explore-menu-tablet").addClass('active');
            jQuery("#explore-menu-tablet").find('span').addClass('active');
        } else if (screen.width < 365) {
            jQuery("#explore-menu-celular").css("display", "none");
            jQuery("#explore-menu-celular").addClass('active');
            jQuery("#explore-menu-celular").find('span').addClass('active');
        } else {
            jQuery("#explore-menu").css("display", "block");
            jQuery(".menu-explore-wrapper.desktop").addClass('active');
            jQuery(".menu-explore-wrapper.desktop").find('span').addClass('active');
        }
    }
}

function HideDropdownMenu(){
    if (screen.width > 800) {
        //alert(screen.width);
        if (screen.width >= 365 && screen.width <= 800) {
            jQuery("#explore-menu-tablet").css("display", "none");
            jQuery("#explore").removeClass('active');
            jQuery("#explore").find('span').removeClass('active');
        } else if (screen.width < 365) {
            jQuery("#explore-menu-celular").css("display", "none");
            jQuery("#explore").removeClass('active');
            jQuery("#explore").find('span').removeClass('active');
        } else {
            jQuery("#explore-menu").css("display", "none");
            jQuery("#explore-menu").removeClass('active');
            jQuery("#explore-menu").find('span').removeClass('active');
        }
    }
}

function ToggleDropdownMenu(){
    if (screen.width >= 365 && screen.width <= 800) {
        jQuery("#explore-menu-tablet").toggle();
	jQuery("#explore-menu-tablet").toggleClass('active');
	jQuery("#explore-menu-tablet").find('span').toggleClass('active');
    } else if (screen.width < 365) {
        //alert("toggle " + screen.width);
        jQuery("#explore-menu-celular").toggle();
	jQuery("#explore-menu-celular").toggleClass('active');
	jQuery("#explore-menu-celular").find('span').toggleClass('active');
    } else {
	jQuery("#explore-menu").toggle();
	jQuery("#explore-menu").toggleClass('active');
	jQuery("#explore-menu").find('span').toggleClass('active');
    }
}