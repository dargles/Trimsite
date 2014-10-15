<?php
/**
 * htmlPage.php provides a basic web page class for our website
 *
 * It defines a class, htmlPage, which forms a boilerplate html page which we 
 * re-use on every page.
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 29-09-2014, 23:01h
 * @copyright 2014 Haven Consulting
 */

  /**
   * htmlPage provides a basic web page class for our website
   *
   * It defines several page attributes which are loaded from an htmlPage.ini file. 
   * It also defines two HTMLstream methods, htmlStreamTop and htmlStreamBottom, 
   * which output the necessary HTML code to make up our boilerplate page.
   * 
   * @param void
   * @return void
   */
  class htmlPage
  {
    /**
     * @access protected
     * @var class
     */
    protected $page;
    /**#@+
	 * @access protected
     * @var string
     */
    /**
     * Defines the CSS file to be used 
     */
    protected $cssfile = "htmlPage.css";
    /**
     * Defines the text to be used in the browser tabs
     */
    protected $title = "Default Page Title";
    /**
     * Defines the image to be used as the page logo 
     */
    protected $logo = "logo.jpeg";
    /**
     * Defines the text to be used as the page heading 
     */
    protected $heading = "Default Website Heading";
    /**
     * Defines the text to be used as the page tagline
     */
    protected $tagline = "Default website description";
    /**
     * Provides an array for the menu labels and links
     */
    protected $menu = array ("Page 1"=>"page1.php", "Page 2"=>"page2.php");
    /**
     * Defines the copyright text for the bottom of the page 
     */
    protected $footer = "&copy;2013 Haven Consulting";

/**
 * setCSS() allows us to change the css file used for a particular page
 * 
 * @param the filename of the css file (expected to be held in the <library> sub-directory)
 * @return void
 */
    public function setCSS($filename)
    {
      $this->cssfile = $filename;
      return;
    }

/**
 * setTitle() allows us to change the text that goes into the tab above the page display in the browser 
 * 
 * @param the new title
 * @var string
 * @return void
 */
    public function setTitle($newTitle)
    {
      $this->title = $newTitle;
      return;
    }

/**
 * __construct() sets up all the class properties from the htmlPage ini file
 * 
 * @param void
 * @return void
 */
    public function __construct()
    {
      session_start();
      if(parse_ini_file("library/htmlPage.ini",true)){
        $iniFile = (object) parse_ini_file("htmlPage.ini",true);
/*echo("<pre>");
print_r($iniFile);
echo("</pre>");*/
        $this->cssfile = $iniFile->cssfile;
        $this->title = $iniFile->headtitle;
        $this->heading = $iniFile->heading;
        $this->tagline = $iniFile->tagline;
        $this->logo = $iniFile->logo;
        $this->menu = (object) $iniFile->menu;
        $this->footer = $iniFile->footer;

        $this->page = substr(strrchr($_SERVER['PHP_SELF'],"/"),1);
        foreach($this->menu as $label=>$link){
          if($this->page==$link) $this->title = $label.": ".$this->title;
        }
      }
	  /* Now set the chosen CSS file */
      if(isset($_SESSION['css'])) $this->cssfile = $_SESSION['css'];
      if(isset($_GET[cssfile]))
	  {
	  	$this->cssfile = $_GET[cssfile];
		$_SESSION['css'] = $this->cssfile;
		//echo($_SESSION['css']);
	  }
      return;
    }

/**
 * HTMLstreamTop() streams all the code necessary for the top of our boilerplate HTML page
 * 
 * @param void
 * @return void
 */
    public function HTMLstreamTop()
    {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="TrimSite 1.0">
    <meta name="author" content="Haven Consulting: d.argles@gmx.com">
    <link rel="stylesheet" type="text/css" <?php echo("href=\"css/".$this->cssfile."\""); ?>>
    <!--[if lt IE 9]><script src="html5shiv.js"></script><![endif]-->
    <title><?php echo($this->title); ?></title>
  </head>

  <body>
    <container> 
      <header>
        <?php echo("<img src=\"graphics/".$this->logo."\" alt=\"[Site Logo]\" />\n"); ?>
        <h3><?php echo($this->heading); ?></h3>
        <p><?php echo($this->tagline); ?></p>
      </header>
      <banner></banner>
      <nav>
<?php
          foreach($this->menu as $label=>$link)
          {
            if($this->page==$link) echo('        <a class="current" href="'.$link.'">'.$label."</a>\n");
             else echo('        <a href="'.$link.'">'.$label."</a>\n");
          }
        ?>
      </nav>

      <section>
      	<p>Select CSS:
<?php 
echo("      	  <a href=\"$_SERVER[PHP_SELF]?cssfile=htmlPage.css\">htmlPage.css</a>");	
echo("      	  <a href=\"$_SERVER[PHP_SELF]?cssfile=back-pic.css\">back-pic.css</a>");	
echo("      	  <a href=\"$_SERVER[PHP_SELF]?cssfile=left-menu.css\">left-menu.css</a>");	
echo("      	  <a href=\"$_SERVER[PHP_SELF]?cssfile=fixed-menu.css\">fixed-menu.css</a>");	
?>	
      	</p>
<?php 
    }

/**
 * HTMLstreamBottom() streams all the code necessary for the bottom of our boilerplate HTML page
 * 
 * @param void
 * @return void
 */
    public function HTMLstreamBottom()
    {
?>
      </section>

      <footer>
        <?php echo("<p>".$this->footer."</p>\n"); ?>
      </footer>
    </container>
  </body>
</html>
<?php 
    }
  }
/**---------------------------------------------
 *             End of Code
 *----------------------------------------------
 */
?>
