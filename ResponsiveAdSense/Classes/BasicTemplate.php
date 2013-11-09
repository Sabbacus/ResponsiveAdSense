<?php
/**
 * Project: ResponsiveAdSense.
 * User: Sabbacus
 * Date: 2013-11-09
 * Time: 11:37
 * To change this template use File | Settings | File Templates.
 */

class BasicTemplate {
	private $templateStack;
	private $templateDir 	= "Templates/";

	public function loadTemplate($template="adsense.tpl.php") {

		$data = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$this->templateDir.$template);

		$this->templateStack[] = $this->parseTemplate($data);
	}

	private function parseTemplate($templateData) {
		$templateData = str_replace("{adClient}", $this->adClient, $templateData);
		$templateData = str_replace("{adSpot}", $this->adSpot, $templateData);

		return $templateData;
	}

	public function setAdElement($class) {
		if ($class===false) {
			$class = "google-ads-".rand(10000, 100000);
		}
		$this->templateStack[] = '<div id="'.$class.'"></div>';
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
} 