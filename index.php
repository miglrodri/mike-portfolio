<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Miguel Jesus / Web Developer</title>

    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">   
   
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <link href="assets/main.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">

</head>

<body>

    <div class="video-container">
    <!---->
    <?php $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
        if(stripos($ua,'android') !== false) {
            //echo "your message";
        } else{   ?>    
           <video autoplay loop muted class="bgvideo" id="bgvideo">
            <source src="assets/background_video.mp4" type="video/mp4">
            <source src="assets/background_video.webm" type="video/webm">
            <source src="assets/background_video.ogg" type="video/ogg">
        </video>
    <!---->
    
    <?php } ?>
    </div>
    <header>
        <div id="header-wrapper" class="wrapper clearfix">
            <div class="inline" id="hello-message">
                <h2>Hello, my name is</h2>
                <h1><a href="/"><span class="strong">Miguel<span class="last-name"> Jesus</span></span></a></h1>
                <h2>and I'm a web developer.</h2>
            </div>
            <div class="inline" id="profile-image"></div>
        </div>
        <br class="clearBoth">
    </header>

    <section id="projects">
        <div id="projects-wrapper" class="wrapper clearfix">
            <h3>Some projects</h3>
            
            <div class="project pinline">
                <div class="project-image">
                    <a href="/"><img src="assets/miguel_portfolio.png" alt="website"></a>
                </div>
                <div class="project-button">
                    <a href="/" class="fill-div">THIS PAGE</a>        
                </div>
            </div>
            
            <div class="project pinline">
                <div class="project-image">
                    <a href="/carfuel" target="_blank" ><img src="assets/carfuel2.png" alt="website"></a>
                </div>
                <div class="project-button">
                    <a href="/carfuel" target="_blank" class="fill-div">CARFUEL</a>        
                </div>
            </div>
            
            <!--<div class="project pinline">
                <div class="project-image">
                    
                </div>
                <div class="project-button">
                    <a href="#" class="fill-div">TBA</a>        
                </div>
            </div>-->
            
            
        </div>
    </section>
    
    <!--<section id="skills">
    	<div class="wrapper">
        	<h3>Skills</h3>
            <div class="skill">
            	<p>responsive design</p>
            </div>
            <div class="skill">
            	<p>php for web</p>
            </div>
            <div class="skill">
            	<p>jquery with ajax</p>
            </div>
            <div class="skill">
            	<p>server environment</p>
            </div>
        </div>
    </section>-->

    <section id="contact">
        <a name="contact"></a>
        <div class="wrapper">
            <h3>Contact me</h3>
            
            <form action="/" method="POST">
                <div class="submit-button">
                    <input class="fill-div" type="submit" value="CLICK HERE TO SEE MY EMAIL">
                </div>
            </form>
            
        </div>
    </section>

    <footer>
        <div class="wrapper">
            <p><?php echo date("Y"); ?> &copy; MIGUEL</p>
        </div>
    </footer>

	<!-- jQuery -->
	<script src="assets/jquery-1.11.2.min.js"></script>
    
    <!-- mike script -->
    <script>
		$( document ).ready(function() {
			$( ".submit-button input" ).click(function( event ) {
				event.preventDefault();
				
					$( ".submit-button" ).hide();
					$( "#contact h3" ).after("<p class=\"success\"><i class=\"fa fa-envelope-o\"></i> Mail me at migl.rodri@gmail.com</p>");
					
				
			});
		});
    </script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>

</html>