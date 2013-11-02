<?php
/**
 * Project: ResponsiveAdSense.
 * User: Sabbacus
 * Date: 2013-11-02
 * Time: 13:52
 * To change this template use File | Settings | File Templates.
 */

class ResponsiveAdSense {
	private $adClient;
	private $adSpot;
	private $templateStack;
	private $templateDir = "Templates/";

	public function __construct($adClient, $adSpot) {
		$this->adClient = $adClient;
		$this->adSpot 	= $adSpot;
	}

	public function loadTemplate($template="adsense.tpl.php") {

		$data = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$this->templateDir.$template);

		$this->templateStack[] = $this->parseTemplate($data);
	}

	private function parseTemplate($templateData) {
		$templateData = str_replace("{adClient}", $this->adClient, $templateData);
		$templateData = str_replace("{adSpot}", $this->adSpot, $templateData);

		return $templateData;
	}

	public function setAdUnit() {

	}

	public function output() {
		if (empty($this->templateStack)) {
			$this->loadTemplate();
		}
		$output = "";
		foreach ($this->templateStack as $parsedTemplateData) {
			$output .= $parsedTemplateData;
		}
		return $output;
	}

	public function setAdElement($class) {
		$this->templateStack[] = '<div id="'.$class.'"></div>';
	}
} 