<?php
/**
 * extras.php defines a class which gives extra functionality for our website
 *
 * It defines a class, extras, with methods that allow us to do extra things.  
 * Currently, these are:
 * - dir_list: tidily list all the files in a given directory
 * - displayEventsCSV: display a CSV as a list of forthcoming events
 * 
 * @author David Argles <d.argles@gmx.com>
 * @version 03-06-2014, 10:35h
 * @copyright 2014 Haven Consulting
 */

  /**
   * extras defines a class which gives extra functionality for our website
   *
   * It defines several methods such as listing all the files in a directory, or 
   * reading in data from a CSV file.
   * 
   * @param void
   * @return void
   */
  class extras
  {
    /**
     * @access protected
     * @var class
     */

    /**
     * dir_list prints a list of the files in the given directory
     * 
	 * Prints all the directory contents minus the . and .. entries
     * Notes:
     * - "-" in the filename is exchanged for a space
     * - "_" in the filename is exchanged for a space (but it comes in a
     *     different place in the alphabet, so it can be used to change file order)
     * The expectation is that ".doc" is removed.  Any remaining dots
     * and ensuing file formats are then re-expressed as "(xxx format)"
	 *
     * @param string $path is the path to the required directory
     * @param string $suppress suppresses the given string. It's intended for 
	 *  suppressing the expected file format from the display (e.g. ".doc")
     * @param string $order determines 
     *  - alphabetic (0, or SCANDIR_SORT_ASCENDING)
     *  - reverse alphabetic (1, or SCANDIR_SORT_DESCENDING)
     *  - none (SCANDIR_SORT_NONE)
     * @return void
     */
    public function dir_list($path, $suppress, $order)
    {
	  /* Get the sorted directory listing into an array, $result; flag error if path is wrong */
      if (!$result=scandir($path, $order)) echo("\n      <p class=\"error\">Error: wrong directory path!\n</p>");
      /* If that worked OK... */
      else
	  {
	    /* remove the . and .. entries */
        $sorted_dirlist = array_diff($result, array('.','..'));
        /* $dirsize gets the size of the directory listing */
        $dirsize = count($sorted_dirlist);
        /* If there's no other entries, give a suitable message */
        if ($dirsize<1) echo("\n      <p>None found</p>\n");
        /* Otherwise... */
        else
		{
		  /* This is a kludge to sort out the removed entries. It ought to be sorted properly */
          $start = 2 - ($order * 2);
          /* Select the next directory item */
          for ($i=$start; $i<=(count($sorted_dirlist) + $start); $i++) 
		  {
		    /* Change "-" to space */
            $next = str_replace("-", " ", $sorted_dirlist[$i]);
            /* Change "_" to space */
            $next = str_replace("_", " ", $next);
            /* Remove $suppress */
            $next = str_replace($suppress, "", $next);
            /* change ".xxx" to " (xxx format)" */
            if (strpos($next, "."))
              $next = strstr($next, ".", TRUE)." ( ".strstr($next, ".", FALSE)." format)";
            /* Now print it out */
            echo("\n      <p><a href=\"".$path."/".$sorted_dirlist[$i]."\">".$next."</a></p>");
		  }
		}
	  }
	}
  
    /**
     * displayEventsCSV loads a CSV file with the filename given as a parameter and displays it
     * 
	 * The assumption is that the first column is a date and will be displayed as such.
     * Dates before 'today' will be ignored
	 *
     * @param string $filename is the (path and) filename of the required file
     * @return void
     */
    public function displayEventsCSV($filename)
    {
      date_default_timezone_set("UTC");
      $today = date('l jS M Y');
      /* echo("<i>Today's date: ".$today."</i><br />"); */
      @$file_handle = fopen($filename, "r");
      if(!$file_handle) echo("<p>Events file not found</p>\n");
      else
      {
        echo("\n  <table class=\"events\">\n");
        while (!feof($file_handle) )
        {
          $line_of_text = fgetcsv($file_handle);
          if (strtotime($line_of_text[0]) >= strtotime($today)) { echo("    <tr><td class=\"events\">".  date_format(date_create($line_of_text[0]), 'l jS M Y'). "</td><td>" . $line_of_text[1].      "</td><td>" . $line_of_text[2] . "</td><td>" . $line_of_text[3] . "</td></tr>\n"); } 
        }
        echo("  </table>\n");
        fclose($file_handle);
      }
    }
	
  }
/**---------------------------------------------
 *             End of Code
 *----------------------------------------------
 */
?>