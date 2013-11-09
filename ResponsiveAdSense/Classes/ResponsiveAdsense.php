<?php
/**
 * Project: ResponsiveAdSense.
 * User: Sabbacus
 * Date: 2013-11-02
 * Time: 13:52
 * To change this template use File | Settings | File Templates.
 */

class ResponsiveAdSense extends Responsive_AdSense_Master {

	private $adClient;
	private $adSpot;

	private $templateStack;
	private $templateDir 	= "Templates/";

	private $adCounter = 0;

	// If you are running PHP 5.2 and below, uncomment this code.

	protected static $instance;

	// protected so no one else can instance it
	protected function __construct() {

	}

	public static function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	// protected to prevent cloning
	protected function __clone() {

	}

	public function __wakeup() {
		throw new Exception("Cannot unserialize singleton");
	}
	// Only needed for PHP 5.2


	public function loadTemplate($template="AdSense.tpl.php") {

		$data = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$this->templateDir.$template);

		$this->templateStack[] = $this->parseTemplate($data);
	}

	private function parseTemplate($templateData) {
		$templateData = str_replace("{adClient}", $this->adClient, $templateData);
		$templateData = str_replace("{adSpot}", $this->adSpot, $templateData);

		return $templateData;
	}

	public function setAdElement($class=false, $useDefaultTemplate=true) {
		if ($class === false) {
			$this->adCounter++;
			$class = "google-ads-".$this->adCounter;
		}

		$this->templateStack[] = '<div id="'.$class.'"></div>';

		if ($useDefaultTemplate) {
			$this->loadTemplate();
		}
	}

	public function output() {
		if (empty($this->templateStack)) {
			$this->loadTemplate();
		}
		$output = "";
		foreach ($this->templateStack as $parsedTemplateData) {
			$output .= $parsedTemplateData;
		}

		$this->templateStack = array();
		return $output;
	}

	public function __toString() {

		$this->loadTemplate("HTML_Header.tpl.php");
		$this->setAdElement();
		$this->loadTemplate("HTML_Footer.tpl.php");

		return $this->output();
	}

	public function setAdUnit() {

	}

	public function __set($name, $value) {
		$allowed = array(
			"adClient",
			"adSpot",
			"templateDir",
		);
		if (in_array($name, $allowed)) {
			$this->$name = $value;
		}
	}

	public static function init($client, $spot) {
		$instance = self::getInstance();
		$instance->__set("adClient", $client);
		$instance->__set("adSpot", $spot);
		return $instance;
	}
} 