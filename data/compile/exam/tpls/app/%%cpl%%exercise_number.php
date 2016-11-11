                            <?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
                            <li class="text_in">
                            	<!--<input type="checkbox" name="args[questype][<?php echo $quest; ?>]" value="1"/>--><?php echo $quest['questype']; ?>（共<?php echo $this->tpl_var['numbers'][$quest['questid']]; ?>题），选 <input id="question_<?php echo $quest['questid']; ?>" type="text" class="input-mini" name="args[number][<?php echo $quest['questid']; ?>]" onChange="javascript:check_num(this);" onblur="" rel="<?php echo $this->tpl_var['numbers'][$quest['questid']]; ?>"/> 题
                            	<span id="question_<?php echo $quest['questid']; ?>_error" class="red font_12 main_left0">选择的题数不能超过<?php echo $this->tpl_var['numbers'][$quest['questid']]; ?></span>
                            </li>
                        	<?php } ?>