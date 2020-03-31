<?php

class View
{
	function generate($content_view, $template_view, $data = null) {
		include 'application/views/'.$template_view;
	}

	function generate_success($content_view, $data = null) {
		include 'application/views/'.$content_view;
	}
}
