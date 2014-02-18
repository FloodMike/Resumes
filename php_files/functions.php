<?php
    require 'classes.php';

    // This function is meant to pull all rows from a provided table	
    function get_all($table)
    {
        $con = mysqli_connect("localhost", "root","root","resume") or die("Unable to connect to MySQL");

        $sql = 'SELECT * FROM ' . $table;
        $result = mysqli_query($con, $sql);
        
        if($result === FALSE) {
            die(mysqli_error($con)); // TODO: better error handling
        }
        
        $table = array();
        while($r = mysqli_fetch_array($result))
        {
            $row = array();
            foreach($r as $k=>$v) {
                $row[$k] = $v;
            }
            
            // Add row to table array and clear row variable
            array_push($table,$row);
            unset($row);
        }
		
        mysqli_close($con);
		
        return $table;
    }

    // This function will set and return all job history without the use of the database	
    function get_all_jobs()
    {
        $empower = new Job();
        $empower->company = "Empower Systems";
        $empower->title = "Integration/Interface Programmer";
        $empower->description = "Empower Systems is a software company focused on delivering a hospital EHR solution to clients " .
                                "across the U.S. Currently I am responsible for scripting and implementing interfacing that " .
                                "relays HL7 messages from a hospital core system for processing, internally within Empower using " .
                                "Visual Basic, as well as routing the HL7 message to ancillary systems. Furthermore, I build and deploy various jobs " .
                                "and services used to process data and update/insert said data into various databases using C# in conjunction with T-SQL. " .
                                "We used Kanban as our process management system.";
        $empower->start = "Aug. 2012";
        $empower->stop = "present";
        $empower->link = "http://www.empower.md/";
		
        $hp = new Job();
        $hp->company = "Hewlett-Packard";
        $hp->title = "Intern";
        $hp->description = "The development team I worked with, within the content management system sector of Hewlett-Packard, " .
                           "required a more efficient way to compile small bits of code within a much larger coding project. To accomplish " .
                           "this, I rewrote their compiler using a combination of JAVA and Perl in just under 6 weeks. The new compiler " .
                           "noticeably increased productivity as well as saved the development team time to be able to work more on the " .
                           "product. The compiler was deployed on a local network web page and was accessible to the entire development " .
                           "team.  We employed SCRUM as our development framework.";
        $hp->start = "June 2008";
        $hp->stop = "Aug. 2008";
        $hp->link = "http://www8.hp.com/us/en/hp-information/index.html";
        
        return array($empower, $hp);
    }

    // This function sets and returns all education information
    function get_all_education()
    {
    	$roosevelt = new School();
    	$roosevelt->name = "Roosevelt University";
    	$roosevelt->major = "Computer Science";
    	$roosevelt->degree = true;
    	$roosevelt->degreeType = "Bachelor of Science";
    	$roosevelt->start = "2010";
    	$roosevelt->stop = "2012";
    	$roosevelt->link = "http://www.roosevelt.edu/CAS/Programs/CS.aspx";
    	
    	$harper = new School();
    	$harper->name = "William Rainey Harper College";
    	$harper->major = null;
    	$harper->degree = false;
    	$harper->degreeType = null;
    	$harper->start = "2009";
    	$harper->stop = "2010";
    	$harper->link = "http://goforward.harpercollege.edu/";
    	
    	$iowa = new School();
    	$iowa->name = "University of Iowa";
    	$iowa->major = "Software/Biomedical Engineering";
    	$iowa->degree = false;
    	$iowa->degreeType = null;
    	$iowa->start = "2004";
    	$iowa->stop = "2009";
    	$iowa->link = "http://www.engineering.uiowa.edu/";
    	
    	return array($roosevelt, $harper, $iowa);
    }
    
    /* This function sets and returns all skills */
    function get_all_skills()
    {
    	$c = new Skill();
    	$c->name = "C#/C++";
    	$c->experience = "Utilized best practices with 4 <br />years of experience";
    	
    	$j = new Skill();
    	$j->name = "Java";
    	$j->experience = "3 years of experience";
    	
    	$vb = new Skill();
    	$vb->name = "Visual Basic";
    	$vb->experience="2 years of experience";
    	
    	$hc = new Skill();
    	$hc->name = "Hand coding HTML/CSS";
    	$hc->experience = "Compatible with IE6, IE7 and<br />standards compliant browsers";
    	
    	$we = new Skill();
    	$we->name = "Dreamweaver, Netbeans, Eclipse,<br />Visual Studio";
    	$we->experience = "&nbsp;";
    	
    	$js = new Skill();
    	$js->name = "Javascript/jQuery/AJAX";
    	$js->experience = "Good working knowledge";
    	
    	$sql = new Skill();
    	$sql->name = "SQL";
    	$sql->experience = "Utilized Transact SQL with 2 years<br />of experience as well as MySQL";
    	
    	$prl = new Skill();
    	$prl->name = "Perl";
    	$prl->experience = "Good working knowledge";
    	
    	$php = new Skill();
    	$php->name = "PHP";
    	$php->experience = "Good working knowledge";
    	
    	return array($c,$j,$vb,$hc,$we,$js,$sql,$prl,$php);
    }
?>
