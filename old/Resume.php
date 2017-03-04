<?php
    session_start();
    require 'php_files\functions.php';
    
    // This will determine if the script should use functions to fill in data or retrieve data from a database
    // If there is a database set up, setting this to false would be preferable
    $useFx = true;
    
    $nameFirst = (empty($_GET['fname']) ? "Michael" : $_GET['fname']);
    $nameLast = (empty($_GET['lname']) ? "Flood" : $_GET['lname']);
    $jobTitle = (empty($_GET['title']) ? "Software Developer" : $_GET['title']);
    $mobile = "1 (815) 353-0093";
    $email = "flood.mike@gmail.com";
    $linkedIn = "http://www.linkedin.com/in/mikeflood";
    $gitHub = "https://github.com/FloodMike";
    
    if($useFx)
    {
        $jobs = get_all_jobs();
        $schools = get_all_education();
        $skills = get_all_skills();
        $interests = array("Running", "Bouldering", "Live music");  
    }
    else
    {
        $jobs = get_all('jobs');
        $schools = get_all('education');
        $skills = get_all('skills');
        $interests = get_all('interests');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> <?php echo $nameFirst . " " . $nameLast . "'s Resume"; ?></title>
        <link rel="icon" href="images\favicon.png" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="style\grid.css">
        <link rel="stylesheet" type="text/css" href="style\stylesheet.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="eight columns">
                    <div class="row">
                        <div class="two columns">
                            &nbsp;
                        </div>
                        <div class="ten columns">
                            <div class="title" id="title"><?php echo $nameFirst . " " . $nameLast; ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="two columns">
                            &nbsp;
                        </div>
                        <div class="ten columns">
                            <div class="title subtitle"><?php echo $jobTitle; ?></div>
                        </div>
                    </div>
                    <div class="row">
                        &nbsp;
                    </div>
                    <div class="row">
                        <div class="two columns">
                            <div class="label">mobile</div>
                        </div>
                        <div class="ten columns">
                            <a href="tel:+18153530093"><?php echo $mobile; ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="two columns">
                            <div class="label">email</div>
                        </div>
                        <div class="ten columns">
                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="two columns">
                            <div class="label">web</div>
                        </div>
                        <div class="ten columns">
                            <a href="<?php echo $linkedIn; ?>" target="_blank"><?php echo $linkedIn; ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="two columns">
                            <div class="label">repository</div>
                        </div>
                        <div class="ten columns">
                            <a href="<?php echo $gitHub; ?>" target="_blank"><?php echo $gitHub; ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="two columns">
                            &nbsp;
                        </div>
                        <div class="ten columns" style="margin:15px 0;">
                            <div id="circle">&nbsp;</div>
                        </div>
                    </div>
                    <?php
                        if($useFx)
                        {
                            foreach($jobs as $job)
                            {
                                echo '<div class="row">
                                            <div class="two columns">
                                                <div class="label" style="margin-top: 5px;">'. $job->start .'-</div>
                                            </div>
                                            <div class="ten columns title"><a href="' . $job->link . '" target="_blank">'. $job->company .'</a></div>
                                        </div>
                                        <div class="row">
                                            <div class="two columns">
                                                <div class="label">'. $job->stop .'</div>
                                            </div>
                                            <div class="ten columns skill">'. $job->title .'</div>
                                        </div>
                                        <div class="row">
                                            <div class="two columns">
                                                &nbsp;
                                            </div>
                                            <div class="ten columns">
                                                <p class="paragraph">'. $job->description .'</p>
                                            </div>
                                        </div>';
                             
                            }
                        }
                        else
                        {
                            foreach($jobs as $job)
                            {
                                echo '<div class="row">
                                            <div class="two columns">
                                                <div class="label" style="margin-top: 5px;">'. $job["Start"] .'-</div>
                                            </div>
                                            <div class="ten columns title"><a href="' . $job["Link"] . '" target="_blank">'. $job["Company"] .'</a></div>
                                        </div>
                                        <div class="row">
                                            <div class="two columns">
                                                <div class="label">'. $job["Stop"] .'</div>
                                            </div>
                                            <div class="ten columns skill">'. $job["Title"] .'</div>
                                        </div>
                                        <div class="row">
                                            <div class="two columns">
                                                &nbsp;
                                            </div>
                                            <div class="ten columns">
                                                <p class="paragraph">'. $job["Description"] .'</p>
                                            </div>
                                        </div>';
                            }
                        }
                    ?>    
                    <div class="row">
                        <div class="two columns">
                            &nbsp;
                        </div>
                        <div class="ten columns" style="margin:15px 0;">
                            <div id="circle">&nbsp;</div>
                        </div>
                    </div>
                    <?php  
                        if($useFx)
                        {
                            foreach($schools as $school)
                            {
                                echo '<div class="row">
                                            <div class="two columns">
                                                <div class="label" style="margin-top: 5px;">'. $school->start .' - ' . $school->stop .'</div>
                                            </div>
                                            <div class="ten columns title"><a href="' . $school->link . '" target="_blank">'. $school->name .'</a></div>
                                        </div>'; 
                                
                                if($school->degree)
                                {
                                    echo '<div class="row" style="margin-bottom: 10px;">
                                                <div class="two columns">
                                                    <div class="label">&nbsp;</div>
                                                </div>
                                                <div class="ten columns skill">' . $school->degreeType . ' in ' . $school->major . '</div>
                                            </div>';
                                }
                                elseif(!$school->degree && !is_null($school->major))
                                {
                                    echo '<div class="row">
                                                    <div class="two columns">
                                                        <div class="label">&nbsp;</div>
                                                    </div>
                                                    <div class="ten columns skill">Studied ' . $school->major . '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="three columns">&nbsp;</div>
                                                    <div class="nine columns title">&nbsp;</div>
                                                </div>';
                                }
                                else
                                {
                                    echo '&nbsp;';
                                }
                            }
                        }
                        else
                        {
                            foreach($schools as $school)
                            {
                                echo '<div class="row">
                                            <div class="two columns">
                                                <div class="label" style="margin-top: 5px;">'. $school["Start"] .' - ' . $school["Stop"]. '</div>
                                            </div>
                                            <div class="ten columns title"><a href="' . $school["Link"] . '" target="_blank">'. $school["Name"] .'</a></div>
                                        </div>'; 
                                
                                if($school["Degree"])
                                {
                                    echo '<div class="row" style="margin-bottom: 10px;">
                                                <div class="two columns">
                                                    <div class="label">&nbsp;</div>
                                                </div>
                                                <div class="ten columns skill">' . $school["Degree_Type"] . ' in ' . $school["Major"] . '</div>
                                            </div>';
                                }
                                elseif(!$school["Degree"] && !is_null($school["Major"]))
                                {
                                    echo '<div class="row">
                                                    <div class="two columns">
                                                        <div class="label">&nbsp;</div>
                                                    </div>
                                                    <div class="ten columns skill">Studied ' . $school["Major"] . '</div>
                                                </div>
                                                <div class="row">
                                                    <div class="three columns">&nbsp;</div>
                                                    <div class="nine columns title">&nbsp;</div>
                                                </div>';
                                }
                                else
                                {
                                    echo '&nbsp;';
                                }
                            }
                        }
                    ?>
                </div>
                <div class="four columns">
                    <div class="row" style="padding: 17px 0;">&nbsp;</div>
                    <div class="row">
                        <div class="twelve columns title" style="margin-bottom: 10px;">Computer Skills</div>
                    </div>
                    <?php 
                        if($useFx)
                        {
                            foreach($skills as $skill)
                            {
                                echo '<div class="row">
                                            <div class="twelve columns">
                                                <div class="skill">'.  $skill->name .'</div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="twelve columns">
                                                <div class="skill_detail">'.  $skill->experience .'</div>
                                            </div>
                                        </div>';
                            }
                        }
                        else
                        {
                            foreach($skills as $skill)
                            {
                                echo '<div class="row">
                                            <div class="twelve columns">
                                                <div class="skill">'.  $skill["Name"] .'</div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="twelve columns">
                                                <div class="skill_detail">'.  $skill["Experience"] .'</div>
                                            </div>
                                        </div>';
                            }
                        }
                    ?>
                    <div class="row">
                        <div class="twelve columns" style="margin:15px 0;">
                            <div id="circle">&nbsp;</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns title" style="margin-bottom: 10px;">Interests</div>
                    </div>
                    <?php
                        if($useFx)
                        {
                            foreach($interests as $interest)
                            {
                                echo '<div class="row">
                                            <div class="twelve columns">
                                                <div class="skill">'.  $interest .'</div>
                                            </div>
                                        </div>';
                            }
                        }
                        else
                        {
                             foreach($interests as $interest)
                            {
                                echo '<div class="row">
                                            <div class="twelve columns">
                                                <div class="skill">'.  $interest["Name"] .'</div>
                                            </div>
                                        </div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
