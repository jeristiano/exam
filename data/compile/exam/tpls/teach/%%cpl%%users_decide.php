<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<?php $this->_compileInclude('menu'); ?>
		</div>
		<div class="span10" id="datacontent">
<?php } ?>
			<ul class="breadcrumb">
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-teach"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li>
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-teach-users">课程成绩</a> <span class="divider">/</span></li>
				<li class="active">教师评卷</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">教师评卷</a>
				</li>
			</ul>
			<form action="index.php?exam-teach-users-makescore" method="post" class="form-horizontal">
			<?php $oid = 0; ?>
			<?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
			<?php $oid++; ?>
			<?php if($quest['questsort']){ ?>
			<?php if($this->tpl_var['sessionvars']['ehquestion']['questions'][$quest['questid']] || $this->tpl_var['sessionvars']['ehquestion']['questionrows'][$quest['questid']]){ ?>
			<h4 class="qu_type"><?php echo $this->tpl_var['ols'][$oid]; ?>、<?php echo $quest['questype']; ?></h4>
			<?php $tid = 0; ?>
			<?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['ehquestion']['questions'][$quest['questid']] as $key => $question){ 
 $qnid++; ?>
			<?php $tid++; ?>
			<table class="table">
				<tr>
					<td style="width:80px;">第<?php echo $tid; ?>题</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>标题：</td>
					<td><?php echo strip_tags(html_entity_decode($question['question'])); ?></td>
				</tr>
				<tr>
					<td>标准答案：</td>
					<td><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></td>
				</tr>
				<tr>
					<td>考生答案：</td>
					<td><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['ehuseranswer'][$question['questionid']])); ?></td>
				</tr>
				<tr>
					<td colspan="2">【请根据参考答案给出分值】<input style="width:80px;" type="text" needle="needle" msg="您必须给出一个分数" name="score[<?php echo $question['questionid']; ?>]" value=""> <span class="ml_10 red font_12">提示：本题共<?php echo $this->tpl_var['sessionvars']['ehsetting']['examsetting']['questype'][$quest['questid']]['score']; ?>分，可输入0.5的倍数。</span></td>
				</tr>
			</table>
			<?php } ?>
			<?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['ehquestion']['questionrows'][$quest['questid']] as $key => $rowsquestion){ 
 $qrid++; ?>
			<?php $tid++; ?>
			<table class="table">
				<tr>
					<td>
						<table>
						<tr>
							<td>第<?php echo $tid; ?>题</td>
						</tr>
						<tr>
							<td><?php echo html_entity_decode($this->ev->stripSlashes($rowsquestion['qrquestion'])); ?></td>
						</tr>
						</table>
						<?php $cqid = 0;
 foreach($rowsquestion['data'] as $key => $question){ 
 $cqid++; ?>
						<table class="searchContent" width="96%">
							<tr>
								<td style="width:80px;">第<?php echo $cqid; ?>题</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>标题：</td>
								<td><?php echo strip_tags(html_entity_decode($question['question'])); ?></td>
							</tr>
							<tr>
								<td>标准答案：</td>
								<td><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></td>
							</tr>
							<tr>
								<td>考生答案：</td>
								<td><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['ehuseranswer'][$data['questionid']])); ?>&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2">【请根据参考答案给出分值】<input style="width:80px;" needle="needle" msg="您必须给出一个分数" type="text" name="score[<?php echo $question['questionid']; ?>]" value=""><span class="ml_10 red font_12">提示：本题共<?php echo $this->tpl_var['sessionvars']['ehsetting']['examsetting']['questype'][$quest['questid']]['score']; ?>分，可输入0.5的倍数。</span></td>
							</tr>
						</table>
						<?php } ?>
					</td>
				</tr>
			</table>
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>
		<div class="control-group">
            <div class="controls">
            	<input type="hidden" name="makescore" value="1" />
            	<input type="hidden" name="ehid" value="<?php echo $this->tpl_var['sessionvars']['ehid']; ?>" />
            	<button class="btn btn-primary" type="submit">评分完毕</button>
            </div>
		</div>
		</form>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>