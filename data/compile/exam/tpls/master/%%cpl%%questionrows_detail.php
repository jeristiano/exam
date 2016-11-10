				<table class="table table-hover">
					<?php if($this->tpl_var['question']['qrknowsid']){ ?>
					<tr>
			          <td width="100">所属科目：</td>
			          <td><?php echo $this->tpl_var['subject']['subject']; ?>&nbsp;</td>
			        </tr>
			        <tr>
			          <td>所属章节：</td>
			          <td><?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?><?php echo $section['section']; ?><?php } ?>&nbsp;&nbsp;</td>
			        </tr>
			        <tr>
			          <td>所属知识点：</td>
			          <td><?php $kid = 0;
 foreach($this->tpl_var['question']['qrknowsid'] as $key => $know){ 
 $kid++; ?><?php echo $know['knows']; ?><?php } ?>&nbsp;&nbsp;</td>
			        </tr>
			        <?php } ?>
			        <tr>
			          <td width="100">题帽：</td>
			          <td><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['qrquestion'])); ?></td>
			        </tr>
			        <tr>
			          <td>难度：</td>
			          <td><?php if($this->tpl_var['question']['qrlevel']==1){ ?>易<?php } elseif($this->tpl_var['question']['qrlevel']==2){ ?>中<?php } elseif($this->tpl_var['question']['qrlevel']==3){ ?>难<?php } ?></td>
			        </tr>
				</table>
				<?php $qid = 0;
 foreach($this->tpl_var['question']['data'] as $key => $question){ 
 $qid++; ?>
				<table class="table table-hover">
			        <tr>
			          <td width="100">第<?php echo $qid; ?>题</td>
			          <td>&nbsp;</td>
			        </tr>
			        <tr>
			          <td>标题：</td>
			          <td><?php echo html_entity_decode($question['question']); ?></td>
			        </tr>
			        <tr>
			        	<td>备选项：</td>
			        	<td>
			          	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
						</td>
			        </tr>
			        <tr>
			          <td>答案：</td>
			          <td><?php echo html_entity_decode($this->ev->stripSlashes( $question['questionanswer'])); ?></td>
			        </tr>
			        <tr>
			          <td>解析：</td>
			          <td><?php echo html_entity_decode($this->ev->stripSlashes( $question['questiondescribe'])); ?></td>
			        </tr>
				</table>
				<?php } ?>