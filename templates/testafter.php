
<html>
<head>
  <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Intelligent Career Guidance System</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		

  <link href="../static/chart.css" rel="stylesheet" media="all">
  
  <link href="../static/css1/bootstrap.min.css" rel="stylesheet" media="all">
  
  <link href="../static/css1/font-awesome.min.css" rel="stylesheet" media="all">
  
  <link href="../static/css1/s.css" rel="stylesheet" media="all">
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
</head>
<body>
<?php

// Define job designations
$jobs = [
    0 => 'AI ML Specialist',
    1 => 'API Integration Specialist',
    2 => 'Application Support Engineer',
    3 => 'Business Analyst',
    4 => 'Customer Service Executive',
    5 => 'Cyber Security Specialist',
    6 => 'Data Scientist',
    7 => 'Database Administrator',
    8 => 'Graphics Designer',
    9 => 'Hardware Engineer',
    10 => 'Helpdesk Engineer',
    11 => 'Information Security Specialist',
    12 => 'Networking Engineer',
    13 => 'Project Manager',
    14 => 'Software Developer',
    15 => 'Software Tester',
    16 => 'Technical Writer'
];

// Retrieve form data
$scores = [];
foreach ($_POST as $key => $value) {
    // Check if the field starts with "rate_"
    if (strpos($key, 'rate_') === 0) {
        // Extract the category name and calculate score
        $category = substr($key, 5);
        $score = intval($value);
        
        // Add score to the category
        if (!isset($scores[$category])) {
            $scores[$category] = $score;
        } else {
            $scores[$category] += $score;
        }
    }
}

// Find the maximum score and corresponding job designations
$maxScore = max($scores);
$matchingJobs = [];
foreach ($scores as $category => $score) {
    if ($score == $maxScore) {
        // Add matching job designations for this category
        $matchingJobs[] = $jobs[array_search($category, array_keys($scores))];
    }
}
$outputs=[];
// Output the matching job designations
if (!empty($matchingJobs)) {
    foreach ($matchingJobs as $job) {
        $outputs[]=$job;
    }
} else {
    echo "No matching job designations found based on your selections.";
}

?>

<!--Header-->
        <header id="header" class="transparent-nav" style="position: fixed;background-color: rgb(120, 70, 167); top: 0;">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="http://127.0.0.1/career/main.php">Career Guidance</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<?php
					// Check if the user is logged in, if not then redirect him to login page
					if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true):
				?>

				<!-- Navigation -->
				
				<?php else: ?>
					<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="http://127.0.0.1/career/main.php">Home</a></li>
                        <li class="dropdown">
                            <a class="dropbtn" href="javascript:void(0)">Services <span> &#11167;</span></a>
                            <div class="dropdown-content">
								<a href="http://127.0.0.1:5000/">Career Prediction</a>
                                <a href="http://127.0.0.1/career/courses.php">Courses</a>
                                <!--<a href="http://127.0.0.1/career/blog.php">Blogs</a>
                                <a href="http://127.0.0.1/career/daily_bytes.php">Daily bytes</a>
                                <a href="http://127.0.0.1/career/community.php">Community</a>-->
								<a href="http://127.0.0.1/career/blog.php">Knowledge Network</a>
								<a href="http://127.0.0.1/career/faq.php">FAQs</a>
                            </div>
                        </li>
						<li><a href="#about">About Us</a></li>
						<li><a href="http://127.0.0.1/career/contact.php">Contact Us</a></li>
						<li><a href="http://127.0.0.1/career/logout.php"" >Log out</a></li>
						
                        
					</ul>
				</nav>
				<!-- /Navigation -->
				<?php endif ?>

			</div>
		</header>
	
   <br><br><br><br><br><br><br>
   <b><h1>Hey! The top job roles that matched your skills.....</h1><br><br></b>
   <div class="graph-cont">
   <h1>You can be a great:</h1>
   <?php foreach($outputs as $output){ ?>
	
	<div class="bar bar1" ><a href="http://127.0.0.1/career/<?= str_replace(' ', '_', $output) ?>.php" style="text-decoration: none;"><font color="white"><?= $output ?></a></font></div><br>

   <?php } ?>
		
					<!--<div class="bar bar2"><a href="#" style="text-decoration: none;"><font color="white">{{job_dict[value]|e}}</a></font></div><br> --> 
		              

		<!--	<div class="bar bar2"><a href="#" style="text-decoration: none;"><font color="white">{{job_dict[value]}}</a></font></div><br>  
		
		-->
		
	 
	
	<i><h2><p><a href="http://127.0.0.1/career/blog.php">To know more about these job roles click here!</a></p></h2></i>
	 
	 
	 
	 
	
	 
	 
	 
      
   <!--<div class="bar bar2"><a href="#" style="text-decoration: none;"><font color="white">{{ job1 }}</a></font></div><br>
   <div class="bar bar3" ><a href="#" style="text-decoration: none;"><font color="white">{{ job2 }}</a></font></div><br>
   <div class="bar bar4"><a href="#" style="text-decoration: none;"><font color="white">{{ job3 }}</a></font></div><br>-->
	
  </div>
  <br><br><br><br><br><br><br>
  <!-- Footer -->
		<footer id="footer" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- footer logo -->
					<div class="col-md-6">
						<div class="footer-logo">
							<a class="logo" style="font-size: 30px;" href="main.php">Career Guidance</a>
						</div>
					</div>
					<!-- footer logo -->


				</div>
				<!-- /row -->

				<!-- row -->
				<div id="bottom-footer" class="row">

					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						
					</div>
					<!-- /social -->

					<!-- copyright -->
					<div class="col-md-8 col-md-pull-4">
						<div class="footer-copyright">
							<span>&copy; Copyright 2021. All Rights Reserved. </span>
						</div>
					</div>
					<!-- /copyright -->
					</div>
				<!-- row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->

</body>
</html>
<!--

           
      #print(jobs_dict[predictions[0]])
      job = {}
      #job[0] = jobs_dict[predictions[0]]
      index = 1
     #

-->




