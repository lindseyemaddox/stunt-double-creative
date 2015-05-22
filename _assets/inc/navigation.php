</head>
<body data-spy="scroll" data-target="nav">
	
	<header>

		<nav>

			<div id="logo">
	
				<img src="/_assets/img/logo-horizontal.png" alt="Stunt Double Creative logo" title="Stunt Double Creative logo">

			</div><!--logo-->

			<ul id="main">
				<li><a href="#about" id="about-link">About</a></li>
				<li><a href="#portfolio" id="portfolio-link">Portfolio</a></li>
				<li><a href="#services" id="services-link">Services</a></li>
                <li><a href="#clients" id="clients-link">Clients</a></li>
				<li><a href="#contact" id="contact-link">Contact</a></li>
			</ul>
	
		</nav>
	
	</header>

<script>

	$(document).ready(function(){

    var $el, leftPos,
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

	});

</script>