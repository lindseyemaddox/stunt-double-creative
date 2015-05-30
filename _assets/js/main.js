// JavaScript Document

// codekit pre-prends

// set initial variables
var $showMenu,
	$header,
	$mainNav,
	$content;

$(function() {
	firstLoad();
});

function firstLoad() {
	initVars();
	showMenu();
	stickyNav();
	initPlaceholders();
}

// function to set dom vars, etc that will not change
function initVars() {
	$mainNav 	= $('nav');
	$showMenu 	= $('a#showMenu, nav li a');
}

// show hide left menu
function showMenu(){
	$showMenu.click(function(){
		if ($mainNav.hasClass('expand')) {
			menuOut();
		} else {
			menuIn();
		}
		return false;
	});
}
function menuOut() {
	$mainNav.removeClass('expand');
	//$content.unbind('click',menuOut);
}
function menuIn() {
	$mainNav.addClass('expand');
	//$content.bind('click',menuOut);
}

// this function fixes placeholders in browsers that don't support it
function initPlaceholders() {
	if ($('input[placeholder]').length > 0) {
		if (!placeholderSupported()) {
			$('input[placeholder]').focus(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
					input.removeClass('placeholder');
				}
			}).blur(function() {
				var input = $(this);
				if (input.val() == '' || input.val() == input.attr('placeholder')) {
					input.addClass('placeholder');
					input.val(input.attr('placeholder'));
				}
			}).blur();
			$('input[placeholder]').parents('form').submit(function() {
				$(this).find('[placeholder]').each(function() {
					var input = $(this);
					if (input.val() == input.attr('placeholder')) {
						input.val('');
					}
				})
			});
		}
	}
}
function placeholderSupported() {
    test = document.createElement('input');
    return ('placeholder' in test);
}

function stickyNav() {

        $('nav').scrollspy({
            min: $('#about').offset().top,
            max: $('footer').offset().top,
            container: window,
            onEnter: function() {
                $("nav").addClass('fixed');
                // setTimeout(function(){$('.fixed').addClass('show');},1000);
            },
            onLeave: function() {
                $("nav").removeClass('fixed');
                // $("nav").removeClass('show');
            }
        });
}

