<?php

// spécial write file Dymmu Max 4GB
// 

function File_writing($handel,$t_f_max,$offset,$bin) {
				($offset > PHP_INT_MAX) ? fseek($handel,-($t_f_max-$offset),SEEK_END) : fseek($handel,$offset,SEEK_SET);
				fwrite($handel,$bin);
				return $offset;
		}
		
		
?>
