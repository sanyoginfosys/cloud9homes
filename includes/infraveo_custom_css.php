<?php

function print_custom_css($page){
	if($page == 'Home'){
		echo '.navbar_gradient{
			// background: linear-gradient(to bottom, rgba(91,172,247,1) 0%, rgba(98,158,222,1) 100%);
			// background-color: #3797dd;
			background-color: #ffffff;
		}
		.tt-hint {
			display: none !important;;
		}
		.tt-dropdown-menu {
			background-color: #FFFFFF;
			border: 1px solid rgba(0, 0, 0, 0.2);
			border-radius: 8px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
			//margin-top: 12px;
			//padding: 8px 0;
			width:auto;
			max-width:100%;
		}
		.tt-suggestion {
			//font-size: 24px;
			line-height: 24px;
			padding: 3px 20px;
		}
		.tt-suggestion.tt-is-under-cursor {
			background-color: #0097CF;
			color: #FFFFFF;
		}
		.tt-suggestion p {
			margin: 0;
		}
		.twitter-typeahead{
			width: 100%;
		}';
	}
}
?>