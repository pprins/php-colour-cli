<?php
/**
 * Output colourful lines to the cli
 *
 * @author P. Prins
 * 
 */
class Colourfulcli {

	// Foreground colours we can use
	private static $foreground = array(
		'default'	=> 37,
        'black'     => 30,
        'red'       => 31,
        'green'     => 32,
        'yellow'    => 33,
        'blue'      => 34,
        'magenta'   => 35,
        'cyan'      => 36,
        'white'     => 37
    );

    // Background colours we can use
    private static $background = array(
    	'default' 	=> 40,
        'black'     => 40,
        'red'       => 41,
        'green'     => 42,
        'yellow'    => 43,
        'blue'      => 44,
        'magenta'   => 45,
        'cyan'      => 46,
        'white'     => 47
    );

    // The current foreground
    private static $currentForeground = "default";

    // The current background
    private static $currentBackground = "default";


    /**
     * Write a line with formatted colours to the stdout
     * @param  string $text 
     * @return string
     */
	public static function writeLn($text) {
		$stdout = fopen("php://stdout", 'w');
		fwrite($stdout, self::getString($text));
		fclose($stdout);
	}

	/**
	 * Format a string with command line colours
	 * @param  string $text 
	 * @return string       
	 */
	public static function getString($text) {
		return sprintf("\033[0;%dm\033[%dm%s\033[0m\n", self::$foreground[self::$currentForeground], self::$background[self::$currentBackground], $text);
	}

	/**
	 * a simple line mode
	 * @param  string $text	 
	 */
	public static function line($text) {		

		self::setBackground('default');
		self::setForeground('default');

		self::writeLn($text);
	}

	/**
	 * Debug mode
	 * @param  string $text	 
	 */
	public static function debug($text) {		

		self::setBackground('default');
		self::setForeground('yellow');

		self::writeLn($text);
	}

	/**
	 * Comment mode
	 * @param  string $text	 
	 */
	public static function comment($text) {		

		self::setBackground('default');
		self::setForeground('green');

		self::writeLn($text);
	}

	/**
	 * Info mode
	 * @param  string $text	 
	 */
	public static function info($text) {
		self::setBackground('default');
		self::setForeground('green');

		self::writeLn($text);		
	}

	/**
	 * Error mode
	 * @param  string $text	 
	 */
	public static function error($text) {
		self::setBackground('red');
		self::setForeground('white');

		self::writeLn($text);		
	}

	/**
	 * Set background colour
	 * @param string
	 */
	public static function setBackground($colour) {
		self::$currentBackground = $colour;
	}

	/**
	 * Set foreground color
	 * @param string
	 */
	public static function setForeground($colour) {
		self::$currentForeground = $colour;
	}
}