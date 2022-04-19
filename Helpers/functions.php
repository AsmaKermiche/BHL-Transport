<?php
function get_premiers_mots($texte)
	{
		$premiersMots = implode(' ', array_slice(str_word_count($texte,1), 0, 10));
		return $premiersMots;
	}