<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<script src="app/exam/styles/js/plugin.js"></script>
<?php $this->_compileInclude('nav'); ?>
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="exambox" id="datacontent">
<?php } ?>
			<div class="examform" style="position:relative;">
				<div class="scoreArea"><?php echo $this->tpl_var['sessionvars']['examsessionscore']; ?></div>
				<ul class="breadcrumb">
					<li>
						<span class="icon-home"></span> <a href="index.php?exam">考场选择</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="index.php?exam-app-basics"><?php echo $this->tpl_var['data']['currentbasic']['basic']; ?></a> <span class="divider">/</span>
					</li>
					<li>
						<a href="index.php?exam-app-history&ehtype=<?php echo $this->tpl_var['ehtype']; ?>">考试记录</a> <span class="divider">/</span>
					</li>
					<li class="active">
						查看解析
					</li>
				</ul>
				<ul class="nav nav-tabs">
					<li<?php if(!$this->tpl_var['type']){ ?> class="active"<?php } ?>>
						<a href="index.php?exam-app-favor">普通试题</a>
					</li>
					<li<?php if($this->tpl_var['type']){ ?> class="active"<?php } ?>>
						<a href="index.php?exam-app-favor&type=1">题冒题</a>
					</li>
				</ul>
				<form action="index.php?exam-app-favor" method="post">
					<table class="table">
						<thead>
			                <tr>
						        <th colspan="3">搜索</th>
			                </tr>
			            </thead>
						<tr>
							<td>
								题型筛选：
							</td>
							<td>
								<select name="search[questype]">
		                        	<option value="0">请选择题型</option>
		                        	<?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
		                    		<option value="<?php echo $quest['questid']; ?>"<?php if($this->tpl_var['search']['questype'] == $quest['questid']){ ?> selected<?php } ?>><?php echo $quest['questype']; ?></option>
		                    		<?php } ?>
		                        </select>
							</td>
							<td>
								<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" value="<?php echo $this->tpl_var['type']; ?>" name="type" />
							</td>
						</tr>
					</table>
					<div class="input">
						<input type="hidden" value="1" name="search[argsmodel]" />
					</div>
				</form>
				<?php if($this->tpl_var['type']){ ?>
					<?php $ishead = 0; ?>
					<?php $ispre = 0; ?>
					<?php $qid = 0;
 foreach($this->tpl_var['favors']['data'] as $key => $question){ 
 $qid++; ?>
						<?php if($pre != $question['questionparent']){ ?>
						<?php $ishead = 0; ?>
						<?php } ?>
						<div>
							<div class="media well">
								<?php if(!$ishead){ ?>
								<div class="media-body well">
									<?php echo html_entity_decode($this->ev->stripSlashes($question['qrquestion'])); ?>
								</div>
								<?php } ?>
								<div class="paperexamcontent decidediv">
									<ul class="nav nav-tabs">
										<li class="active">
											<span class="badge questionindex"><?php echo ($this->tpl_var['page']-1)*20+$qid; ?></span></a>
										</li>
										<li class="btn-group pull-right">
											<button class="btn" type="button" onclick="javascript:delfavorquestion('<?php echo $question['favorid']; ?>');"><em class="icon-remove" title="删除"></em></button>
										</li>
									</ul>
									<div class="media-body well text-warning">
										<a name="question_<?php echo $data['questionid']; ?>"></a><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?>
									</div>
									<?php if(!$this->tpl_var['questypes'][$question['questiontype']]['questsort']){ ?>
									<div class="media-body well">
				                    	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
				                    </div>
				                    <?php } ?>
									<div class="media-body well">
										<ul class="unstyled">
				                        	<li class="text-error">正确答案：</li>
				                            <li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></li>
				                        	<li><span class="text-info">所在章：</span><?php $kid = 0;
 foreach($questionrow['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalsections'][$this->tpl_var['globalknows'][$knowsid['knowsid']]['knowssectionid']]['section']; ?>&nbsp;<?php } ?></li>
				                        	<li><span class="text-info">知识点：</span><?php $kid = 0;
 foreach($questionrow['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalknows'][$knowsid['knowsid']]['knows']; ?>&nbsp;<?php } ?></li>
				                        	<li class="text-info">答案解析：</li>
			                        		<li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($question['questiondescribe'])); ?></li>
				                        </ul>
									</div>
								</div>
							</div>
						</div>
						<?php $ishead++; ?>
			            <?php $pre=$question['questionparent']; ?>
					<?php } ?>
				<?php } else { ?>
					<?php $qid = 0;
 foreach($this->tpl_var['favors']['data'] as $key => $question){ 
 $qid++; ?>
					<div id="question_<?php echo $question['questionid']; ?>" class="paperexamcontent decidediv">
						<div class="media well">
							<ul class="nav nav-tabs">
								<li class="active">
									<span class="badge badge-info questionindex"><?php echo ($this->tpl_var['page']-1)*20+$qid; ?></span></a>
								</li>
								<li class="btn-group pull-right">
									<button class="btn" type="button" onclick="javascript:delfavorquestion('<?php echo $question['favorid']; ?>');"><em class="icon-remove" title="删除"></em></button>
								</li>
							</ul>
							<div class="media-body well text-warning">
								<a name="question_<?php echo $question['questionid']; ?>"></a><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?>
							</div>
							<?php if(!$this->tpl_var['questypes'][$question['questiontype']]['questsort']){ ?>
							<div class="media-body well">
		                    	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
		                    </div>
		                    <?php } ?>
							<div class="media-body well">
		                    	<ul class="unstyled">
		                        	<li class="text-error">正确答案：</li>
		                            <li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></li>
		                        	<li><span class="text-info">所在章：</span><?php $kid = 0;
 foreach($question['questionknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalsections'][$this->tpl_var['globalknows'][$knowsid['knowsid']]['knowssectionid']]['section']; ?>&nbsp;<?php } ?></li>
		                        	<li class="text-success"><span class="text-info">知识点：</span><?php $kid = 0;
 foreach($question['questionknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalknows'][$knowsid['knowsid']]['knows']; ?>&nbsp;<?php } ?></li>
		                        	<li class="text-info">答案解析：</li>
		                        	<li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($question['questiondescribe'])); ?></li>
		                        </ul>
		                    </div>
						</div>
					</div>
					<?php } ?>
				<?php } ?>
				<div class="pagination pagination-right">
		            <ul><?php echo $this->tpl_var['favors']['pages']; ?></ul>
		        </div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('foot'); ?>
</body>
</html>
<?php } ?>