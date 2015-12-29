<?php
 // spécial read offset file ^^ 
 // best for select you want byte  011101010-[1100101010011001]-0011001
 // is fast if the reading is progressive
 
		public function read_offset($handel,$t_f_max,$offset,$nb) {
				($offset > PHP_INT_MAX) ? fseek($handel,-($t_f_max-$offset),SEEK_END) : fseek($handel,$offset,SEEK_SET);
				return fread($handel, $nb);
		}
		
		
?>

