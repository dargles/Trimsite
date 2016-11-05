<?php
/**
 * webpage.class.php provides access to our template(s)
 *
 * It defines a class, webpage, which gives access to our boilerplate template which we 
 * re-use on every page.  This version is developed for Trimsite3
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 01-09-2015, 22:49h
 * @copyright 2015 Haven Consulting
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
    protected $cssfile = "Default CSS file";
    protected $logo = "logo.png";
    protected $tabtitle = "Default tab title";
    protected $heading = "Default Website Heading";
    protected $tagline = "Default website description";
    protected $footer = "Default footer";
    protected $menu = array ("Page 1"=>"page1.php", "Page 2"=>"page2.php");
    protected $content = "";
	
    /**
     * __construct() runs at instantiation and reads in the template values from 
     *     "trimsite/webpage.ini"
     * 
     * @param void
     * @return void
     */
    public function __construct()
    {
      /* The following line makes the server display error messages.
         You may uncomment it during development, but don't forget to comment it out again 
         when you're ready to deploy! */
      //ini_set("display_errors", 1);

      if(@parse_ini_file("trimsite/webpage.ini",true))
      {
        $iniFile = (object) parse_ini_file("webpage.ini",true);
        $this->cssfile = $iniFile->cssfile;
        $this->logo = $iniFile->logo;
        $this->tabtitle = $iniFile->tabtitle;
        $this->heading = $iniFile->heading;
        $this->tagline = $iniFile->tagline;
        $this->footer = $iniFile->footer;
        $this->menu = (object) $iniFile->menu;
        $this->content = $inifile->content;
      }
      else echo("ini file not found");
      return;
    }
	     
    /**
     * render() renders a named template
     * 
     * In the basic version of Trimsite, the expectation is that the template will be either 
     * "templateTop.html" or "templateBottom.html", both located in "trimsite/templates", but 
     * it may be used to load any template in that directory.  Tags are given in "{{tag}}" 
     * format within a template.
     *
     * @param text filename (minus extension)
     * @param array (optional) update information in [tag] => [value] format
     * @return The updated template text
     */
    public function render($file, $substitutions = array()) 
    {
      if($file=="TOP" || $file=="BOTTOM") $choice = "template";
      else $choice = $file;
      // We'll need to know the filename of the current page
      $thispage = substr(strrchr($_SERVER['PHP_SELF'],"/"),1);
      // Check that the template exists
      $filename = "trimsite/templates/$choice.html";
      if(!file_exists($filename)) $template = ("Could not find template $choice in $filename.");
      else
      {
        // Load the template
        $template = file_get_contents($filename);
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
        // Insert simple values from ini file into the substitions list      
        $substitutions = $substitutions + array("heading" => $this->heading, "tagline" => $this->tagline, 
          "footer" => $this->footer, "cssfile" => $this->cssfile, "logo" => $this->logo, 
          "content" => $this->content);
        // Now add the menu entries from the ini file
        //Initialise the menu variable
        $menu = "";
        // Iterate through the list of the varous pages' names and related filenames
        foreach($this->menu as $name => $page)
        {
  	  if($thispage==$page)
  	  {
  	    // We've found the current page name, so record it in $title
  	    $title = $name . ": " . $this->tabtitle;
	    // And choose the "selected" class for our menu link...
            include("trimsite/templates/menuCurrent.php");
	  }
	  // ...otherwise, just use the normal menu link
	  else include("trimsite/templates/menu.php");
        }
	// Strip the leading white space in front of the menu
        $menu = strstr($menu,"<");		 
        // Now add the page title and the menu links to the substitutions list
        $substitutions = $substitutions + array("tabtitle" => $title, "menu" => $menu);
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
