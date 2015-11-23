<?php

class ThemeHouse_DebugOnPost_Listener_TemplatePostRender extends ThemeHouse_Listener_TemplatePostRender
{
	public function run() {
		if ($this->_templateName == "PAGE_CONTAINER" && XenForo_Application::debugMode())
		{
			$this->_debugMode();
		}
		return parent::run();
	}

	public static function templatePostRender($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
	{
		$templatePostRender = new ThemeHouse_DebugOnPost_Listener_TemplatePostRender($templateName, $content, $containerData, $template);
		list($content, $containerData) = $templatePostRender->run();
	}

	protected function _debugMode()
	{
		if (get_class($this->_template) == 'XenForo_Template_Admin')
		{
			$this->_template->addRequiredExternal('css', 'public:th_debug_info_debugonpost');
		}
		else
		{
			$this->_template->addRequiredExternal('css', 'th_debug_info_debugonpost');
		}
		$this->_template->addRequiredExternal('js', 'js/themehouse/debugonpost/full/debugonpost.js');
		$this->_append("<div id=\"DebugInfo\"><div><a href=\"\" id=\"DebugInfoClose\">Close</a>" . XenForo_Debug::getDebugHtml() . "</div></div>");
	}
}