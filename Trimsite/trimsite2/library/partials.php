<?php
/**
 * partials.php provides access to our partials
 *
 * It defines a class, partials, which gives access to our boilerplate partials which we 
 * re-use on every page.  This version is developed for Trimsite2
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 08-09-2014, 18:00h
 * @copyright 2014 Haven Consulting
 */

  /**
   * partials provides access to our partials
   *
   * Besides allowing us to load a particular partials file, it also allows us to change 
   * parameters in the file.
   * 
   */
  class partials
  {
    /**
     * @access protected
     * @var class
     */

    protected $cssfile = "Default CSS file";
    protected $logo = "logo.png";
    protected $tabtitle = "Default tab title";
    protected $heading = "Default Website Heading";
    protected $tagline = "Default website description";
    protected $footer = "Default footer";
    protected $menu = array ("Page 1"=>"page1.php", "Page 2"=>"page2.php");
	
	public function __construct()
    {
      if(@parse_ini_file("library/partials.ini",true))
      {
        $iniFile = (object) parse_ini_file("partials.ini",true);
        $this->cssfile = $iniFile->cssfile;
        $this->logo = $iniFile->logo;
        $this->tabtitle = $iniFile->tabtitle;
        $this->heading = $iniFile->heading;
        $this->tagline = $iniFile->tagline;
        $this->footer = $iniFile->footer;
        $this->menu = (object) $iniFile->menu;
      }
	  else echo("ini file not found");
      return;
    }
	     
    /**
     * render() allows us to change the css file used for a particular page
     * 
     * @param text filename (minus extension)
	 * @param array update information in [tag] => [value] format
     * @return The updated partials text
     */
    public function render($partial, $substitutions = []) 
  	{
      // We'll need to know the filename of the current page
      $thispage = substr(strrchr($_SERVER['PHP_SELF'],"/"),1);
      // Check that the partial exists
      $filename = "library/partials/$partial.html";
      if(!file_exists($filename)) $template = ("Could not find partial $partial in $filename.");
	  else
	  {
        // Load the partial
        $template = file_get_contents($filename);
	    // Insert simple values from ini file into the substitions list      
        $substitutions = $substitutions + ["heading" => $this->heading, "tagline" => $this->tagline, 
          "footer" => $this->footer, "cssfile" => $this->cssfile, "logo" => $this->logo];
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
	  	    $menu = $menu."\n        <a href=\"$page\" class=\"current\">$name</a>";
		  }
		  // ...otherwise, just use the normal menu link
		  else $menu = $menu."\n        <a href=\"$page\">$name</a>";
	    }
		// Strip the leading white space in front of the menu
        $menu = strstr($menu,"<",FALSE);		 
	    // Now add the page title and the menu links to the substitutions list
	    $substitutions = $substitutions + ["tabtitle" => $title, "menu" => $menu];
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