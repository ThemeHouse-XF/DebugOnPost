/**
 * @author th
 */

/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.DebugLink = function($link)
	{
		$link.click(function(e)
		{
			e.preventDefault();
			$('#DebugInfo').toggle();
			$('html, body').animate({scrollTop:0}, 'fast');
		});
	};

    XenForo.register('footer .footerLegal .pageContent dl.pairsInline dd a, #debugInfo dd a.concealed, #DebugInfoClose', 'XenForo.DebugLink');
}
(jQuery, this, document);