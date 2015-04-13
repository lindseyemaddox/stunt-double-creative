<?php require_once($_SERVER['DOCUMENT_ROOT'].'/_assets/inc/head.php'); // HTTP head?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/_assets/inc/navigation.php'); //navigation?>

<section id="slider">

	<div class="flexslider carousel">

		<ul class="slides">

			<li>

				<div class="inner">
					
					<div class="text">
		
						<p class="headline">Red with Envy</p>
			
						<p class="tag">Hunter Hayes’ first european release drops in the UKon april 25th. Check out his new look.</p>
		
						<div class="btnBox"><a class="btn alt" href="#portfolio">Check it out</a></div>

					</div><!--text-->
		
				</div><!--inner-->

			    <img src="/_assets/img/slider-hayes.jpg" alt="Hunter Hayes cd packaging design" title="Hunter Hayes, I Want Crazy album design" />
		
			</li>
		
		</ul>

	</div><!--flexslider-->

</section><!--slider-->

<section id="about">

	<div class="inner">
		
		<h3>Who is Stunt Double Creative?</h3>

		<h4>An agency on a mission.</h4>

		<div class="left">
			
			<h1><span class="bold">Nashville-based agency, Stunt Double Creative</span> was established with a vision to rid the world of boring & ugly & is fueled by its team’s inherent need to create. Using sound creative strategy & design moxie, we create mass visual media through branding, websites, & everything in between.</h1>

			<h2>What you need to know about us is this: If you need something created, we’ll find a way to make it happen, & we’ll have a blast doing it.</h2>

		</div><!--left-->

		<div class="right">
			
			<img src="/_assets/img/about.jpg" alt="" title="">

		</div><!--right-->

	</div><!--inner-->

</section><!--about-->

<section id="portfolio">

	<div class="inner">
		
		<h3>Here’s some work.</h3>

		<h4>Take a look at what we make.</h4>

      	<div id="options" class="clearfix">

	        <ul id="filters" class="option-set clearfix btnBox" data-option-key="filter">
				<li><a class="btn selected" href="#filter" data-option-value="*">all</a></li>
				<li><a class="btn" href="#filter" data-option-value=".branding">Branding</a></li>
				<li><a class="btn" href="#filter" data-option-value=".print">Print</a></li>
				<li><a class="btn" href="#filter" data-option-value=".web-design">Web Design</a></li>
	        </ul>

	    </div><!--options-->

      	<div class="clearfix"></div>

		<div id="container" class="clearfix">

			<article class="portfolio-item branding">
				<div class="fish silver">
				  <h5>Project Title</h5>
				  <h6>Project info can run onto multiple lines if needed.</h6>
				  <p><a href="/lightboxes/sportfishing/silver-salmon/" class="fancybox fancybox.iframe">details</a><br />
				  <a href="/_assets/img/galleries/silver-salmon-red.jpg" class="fancybox" rel="silver-salmon">view gallery</a></p>
				</div><!--fish-->
			</article>

		</div><!--container-->

  	</div><!--inner-->

</section><!--testimonials-->


<script>

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

</script>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/_assets/inc/footer.php'); // footer, close body and html?>