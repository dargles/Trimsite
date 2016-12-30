<?php
/**
 * webpage.class.php provides access to our template(s)
 *
 * It defines a class, webpage, which gives access to our boilerplate template which we 
 * re-use on every page.  This version is developed for Trimsite3
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 16-12-2016, 15:05h
 * @copyright 2016 Haven Consulting
 */

  /**
   * webpage provides access to our templates
   *
   * Besides allowing us to load a particular template, it also allows us to change 
   * parameters in the file.
   * 
   * @var class
   */
  class webpage
  {
    private   $trace = FALSE; //set to TRUE for trace, FALSE is off
  
    protected $version = "4.0";           // The package version
    protected $page = "default.php";      // The filename of this page
    protected $fullpage = "default.php";  // The full filename of this page including path
    public    $pagepath = "";             // The path from this page to the site home directory
    public    $packagepath = "";          // If TrimSite is not installed in the root directory of the 
                                          // host website, this gives the path to the <trimsite> package
    protected $configpath = "trimsite";   // The path to "webpage.ini"
    protected $packagename = "trimsite";  // In case we decide to change the name of the <trimsite> package
    protected $template = "trimsite3.html"; // The main template file
    protected $cssfile = "trimsite3.css"; // The main CSS file
    protected $logo = "logo.png";         // The graphic to use for the site logo
    protected $tabtitle = "Default tab title";  // What to put on the browser tab
    protected $heading = "Default Website Heading"; // Title at the top of each page
    protected $tagline = "Default website description"; // Tag line at the top of each page
    protected $footer = "Default footer"; // Footer at the bottom of each page
    protected $menu = array ("Home"=>"index.php", "Contact"=>"contact.php"); // Basic menu structure
    protected $content = "";              // Could theoretically specify content for each page
	
    /**
     * __construct() runs at instantiation and 
     * - works out various paths
     * - reads in the template values from webpage.ini
     * 
     * @return void
     */
    public function __construct()
    {
      /* The following line makes the server display error messages.
         You may uncomment it during development, but don't forget to comment it out again 
         when you're ready to deploy! */
      //ini_set("display_errors", 1);
      
      /* First, let's work out our relative path to the home directory */
      $pagedir = dirname($_SERVER['PHP_SELF']);
      $parts = explode("/", $pagedir);
  if($this->trace) print_r($parts);
      $relpath = "";
      $currentpath = "";
      for($i=count($parts);$i>0;$i--)
      {
        $packagepath = $relpath.$this->packagename;
        if(isset($parts[$i])) $currentpath = "/".$parts[$i].$currentpath;
  if($this->trace) echo("<p>Looking for: $packagepath, currentpath is: $currentpath</p>");
        if(file_exists($packagepath)) break;
        else
        {
          $relpath = "../".$relpath;
  if($this->trace) echo("<p>Setting relpath to: $relpath</p>");          
        }
      }
  if($this->trace) echo("<p>currentpath is: $currentpath, pagedir is: $pagedir</p>");

      /* Now grab the page name and relative path */
      $this->page = basename($_SERVER['PHP_SELF']);
      $this->pagepath = $relpath;
      
      /* Maybe we can also grab the package path */
      if($currentpath)
      {
        $this->packagepath = strstr($pagedir, $currentpath, TRUE);
        $this->fullpage = ltrim($currentpath, "/")."/".$this->page;
      }
      else $this->fullpage = $this->page;
  if($this->trace) echo("<p>Packagepath is: $this->packagepath, Fullpage is: $this->fullpage</p>");
      
      /* Now set up the path to webpage.ini (and any config files) */
      if(file_exists($this->pagepath."webpage.ini")) $this->configpath = "";  // Check in the main directory
      if(file_exists($this->pagepath."trimsite/webpage.ini")) $this->configpath = "trimsite/";  // Check in <trimsite>
      if(file_exists($this->pagepath."config/webpage.ini")) $this->configpath = "config/";  // Check in <config>
      
      /* And find the webpage.ini file */
      $filename = $this->pagepath.$this->configpath."/webpage.ini";
      if(parse_ini_file($filename,true))
      {       
        /* We've found it, so load in the ini file values */
        $iniFile = (object) parse_ini_file($filename,true);
        /* Note, the following values should all be tested before loading (which they're not)... */
        $this->template = $iniFile->template;
        $this->cssfile = $iniFile->cssfile;
        $this->logo = $iniFile->logo;
        $this->tabtitle = $iniFile->tabtitle;
        $this->heading = $iniFile->heading;
        $this->tagline = $iniFile->tagline;
        $this->footer = $iniFile->footer;
        $this->menu = (object) $iniFile->menu;
        if(isset($iniFile->content))$this->content = $iniFile->content;
      }
      else
      {
        $problem = error_get_last();
        echo("        <p class='error'>ini file problem: ".$problem["message"]."</p>\n");
      }
      return;
    }
	     
    /**
     * buildmenu() allows us to build an HTML menu from a menu array
     * 
     * @param  array  $menu = menu data
     * @param  string $padding = padding to be added to increase indent for sub-menus
     * @return string HTML menu stream
     */
    protected function buildmenu($menu, $padding) 
    {
      // Set up the starting <nav>
      include($this->pagepath.$this->configpath."templates/navStart.php");
      // If there's no padding, we're at top level - include a menu icon for responsive layouts
      if($padding=="") include ($this->pagepath.$this->configpath."templates/navIcon.php");
;   
      // Iterate through the list of the varous pages' names and related filenames
      foreach($menu as $name => $page)
      {
  	    // If the entry is itslef an array, we've got a sub-menu so recurse.
  	    if(is_array($page)) $result .= $this->buildmenu($page, $padding."  ");
  	    else
        {
          //It's a standard menu entry
  	      if($this->fullpage==$page)
  	      {
  	        // We've found the current page name, so record it in $title
  	        $this->tabtitle = $name . ": " . $this->tabtitle;
	          // And choose the "selected" class for our menu link...
            include($this->pagepath.$this->configpath."templates/menuCurrent.php");
	        }
	        // ...otherwise, just use the normal menu link
	        else include($this->pagepath.$this->configpath."templates/menu.php");
        }
      }
      // Add the closing <nav>
      include($this->pagepath.$this->configpath."templates/navEnd.php");

      return $result;
    }

    /**
     * render() renders a named template
     * 
     * In the basic version of Trimsite, the expectation is that the template will be  
     * "template.html", located in "trimsite/templates", but it may be used to load any 
     * template.  Tags are given in "{{tag}}" format within a template.
     *
     * @param  string $file          filename
     * @param  array  $substitutions (optional) update information in [tag] => [value] format
     * @return string                The updated template text
     */
    public function render($file="", $substitutions = array()) 
    {
      if($file=="TOP" || $file=="BOTTOM" || $file=="") $choice = $this->template;
      else $choice = $file;
      // Check that the template exists
      $filename = $this->pagepath.$this->configpath."templates/$choice";
      if(!file_exists($filename)) $template = ("Could not find template $choice in $filename.");
      else
      {
        // Load the template
        $template = file_get_contents($filename);
        // Set the tabtitle now
        $title = $this->tabtitle;
        // If we're using TOP or BOTTOM, trim the template
        switch($file)
        {
          case "TOP":
            $template = strstr($template, "{{content}}", TRUE);
            break;
          case "BOTTOM":
            $template = strstr($template, "{{content}}", FALSE);
            break;
          default:
            break;
        }
        
        /* If we're rendering the top half of the main template, insert these values 
           from ini file into the substitions list */
        if(!$file || $choice==$this->template)
        {
          $substitutions = $substitutions + array(
            "version" => $this->version, 
            "heading" => $this->heading, 
            "tagline" => $this->tagline, 
            "template" => $this->template, 
            "cssfile" => $this->cssfile, 
            "logo" => $this->logo, 
            );
          // Now add the menu entries from the ini file
          $menu = "\n".$this->buildmenu($this->menu, "");
          		 
          // Now add the page title and the menu links to the substitutions list
          $substitutions = $substitutions + array("tabtitle" => $this->tabtitle, "menu" => $menu);
        }
        
        // Now add any other substitutions (anything not in template TOP)
        $substitutions = $substitutions + array(
          "pagepath" => $this->pagepath,
          "configpath" => $this->configpath,
          "footer" => $this->footer, 
          "content" => $this->content
          );

        // Substitute any placeholders
        foreach($substitutions as $key => $replacement) $template = str_replace('{{'.$key.'}}', $replacement, $template); 
      }
      // Add a trailing newline to make sure there is one
      $template .= "\n";
      // Send back the result
      return $template;
    }
  }
/**---------------------------------------------
 *             End of Code
 *----------------------------------------------
 */
?>
