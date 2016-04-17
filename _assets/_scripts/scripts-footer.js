$(function(){
	            $('#main > li > a').click(function(){
	            	$('#main > li').removeClass('selected');
			    $(this).closest('li').addClass('selected');
			  });

	        });

	$(window).load(function() {

    var $el, leftPos,tabSelected,
            $tabsNav = $("#main");

        if ($tabsNav.length > 0) {
            var width = $('#main').width();
            $tabsNav.css('width', width + 'px');


            if(!tabSelected) {
                var tabSelected = $('#main li:first-child');
                tabSelected.addClass('selected');
            }
            if($('#main li#line').length == 0) {
                $tabsNav.append("<li id='line'></li>");
            }

            $("#main #line").css({
                left: tabSelected.position().left,
                width: tabSelected.width()
            }).data("origLeft", $("#line").position().left);
       
            $("ul#main li").hover(function () {
                $el = $(this);
                width = $el.width();
                $("ul#main li#line").css("width", width);
                leftPos = $el.position().left;
                $("ul#main li#line").css("left", leftPos);

            }, function () {
                $("ul#main li#line").css({
                    left: $(".selected").position().left,
                    width: $(".selected").width()
                });
            });

        }

    $(function(){

      var $container = $('#container');

      $container.isotope({
        itemSelector : '.portfolio-item'
      });

      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }

        return false;
      });
  	});

});