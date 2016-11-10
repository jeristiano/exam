<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="exambox" id="datacontent">
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
				<h3 class="text-center"><?php echo $this->tpl_var['sessionvars']['examsession']; ?></h3>
				<?php $oid = 0; ?>
				<?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
				<?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']]){ ?>
				<?php $oid++; ?>
				<div id="panel-type<?php echo $quest['questid']; ?>" class="tab-pane<?php if((!$this->tpl_var['ctype'] && $qid == 1) || ($this->tpl_var['ctype'] == $quest['questid'])){ ?> active<?php } ?>">
					<ul class="breadcrumb">
						<li>
							<h5><?php echo $oid; ?>、<?php echo $quest['questype']; ?></h5>
						</li>
					</ul>
					<?php $tid = 0; ?>
	                <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] as $key => $question){ 
 $qnid++; ?>
	                <?php $tid++; ?>
	                <div id="question_<?php echo $question['questionid']; ?>" class="paperexamcontent decidediv">
						<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest['questid']]['score']){ ?><div class="right"></div><?php } else { ?><div class="wrong"></div><?php } ?>
						<div class="media well">
							<ul class="nav nav-tabs">
								<li class="active">
									<span class="badge badge-info questionindex"><?php echo $tid; ?></span></a>
								</li>
								<li class="btn-group pull-right">
									<button class="btn" type="button" onclick="javascript:favorquestion('<?php echo $question['questionid']; ?>');"><em class="icon-heart" title="收藏"></em></button>
								</li>
							</ul>
							<div class="media-body well text-warning">
								<a name="question_<?php echo $question['questionid']; ?>"></a><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?>
							</div>
							<?php if(!$quest['questsort']){ ?>
							<div class="media-body well">
		                    	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
		                    </div>
		                    <?php } ?>
							<div class="media-body well">
		                  		<p class="text-error">本题得分：<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']]; ?>分<?php if($this->tpl_var['sessionvars']['examsessiontimelist'][$question['questionid']]){ ?> &nbsp;&nbsp;做题时间：<?php echo date('Y-m-d H:i:s',$this->tpl_var['sessionvars']['examsessiontimelist'][$question['questionid']]); ?><?php } ?></p>
		                  	</div>
							<div class="media-body well">
		                    	<ul class="unstyled">
		                        	<li class="text-error">正确答案：</li>
		                            <li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></li>
		                        	<li class="text-info">您的答案：</li>
		                            <li class="text-success"><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])); ?><?php } ?></li>
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
					<?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']] as $key => $questionrow){ 
 $qrid++; ?>
	                <?php $tid++; ?>
	                <div id="questionrow_<?php echo $questionrow['qrid']; ?>">
						<div class="media well">
							<ul class="nav nav-tabs">
								<li class="active">
									<span class="badge badge-info questionindex"><?php echo $tid; ?></span>
								</li>
							</ul>
							<div class="media-body well">
								<?php echo html_entity_decode($this->ev->stripSlashes($questionrow['qrquestion'])); ?>
							</div>
							<?php $did = 0;
 foreach($questionrow['data'] as $key => $data){ 
 $did++; ?>
							<div class="paperexamcontent decidediv">
								<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']] && $this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']] == $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest['questid']]['score']){ ?><div class="right"></div><?php } else { ?><div class="wrong"></div><?php } ?>
								<ul class="nav nav-tabs">
									<li class="active">
										<span class="badge questionindex"><?php echo $did; ?></span></a>
									</li>
									<li class="btn-group pull-right">
										<button class="btn" type="button" onclick="javascript:favorquestion('<?php echo $data['questionid']; ?>');"><em class="icon-heart" title="收藏"></em></button>
									</li>
								</ul>
								<div class="media-body well text-warning">
									<a name="question_<?php echo $data['questionid']; ?>"></a><?php echo html_entity_decode($this->ev->stripSlashes($data['question'])); ?>
								</div>
								<?php if(!$quest['questsort']){ ?>
								<div class="media-body well">
			                    	<?php echo html_entity_decode($this->ev->stripSlashes($data['questionselect'])); ?>
			                    </div>
			                    <?php } ?>
								<div class="media-body well">
			                  		<p class="text-error">本题得分：<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']]; ?>分<?php echo $this->tpl_var['sessionvars']['examsessiontimelist'][$data['questionid']]; ?><?php if($this->tpl_var['sessionvars']['examsessiontimelist'][$data['questionid']]){ ?>&nbsp;&nbsp;做题时间：<?php echo date('Y-m-d H:i:s',$this->tpl_var['sessionvars']['examsessiontimelist'][$data['questionid']]); ?><?php } ?></p>
			                  	</div>
								<div class="media-body well">
									<ul class="unstyled">
			                        	<li class="text-error">正确答案：</li>
			                            <li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($data['questionanswer'])); ?></li>
			                        	<li class="text-info">您的答案：</li>
			                            <li class="text-success"><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])); ?><?php } ?></li>
			                        	<li><span class="text-info">所在章：</span><?php $kid = 0;
 foreach($questionrow['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalsections'][$this->tpl_var['globalknows'][$knowsid['knowsid']]['knowssectionid']]['section']; ?>&nbsp;<?php } ?></li>
			                        	<li><span class="text-info">知识点：</span><?php $kid = 0;
 foreach($questionrow['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalknows'][$knowsid['knowsid']]['knows']; ?>&nbsp;<?php } ?></li>
			                        	<li class="text-info">答案解析：</li>
		                        		<li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($data['questiondescribe'])); ?></li>
			                        </ul>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div aria-hidden="true" id="modal" class="modal hide fade" role="dialog" aria-labelledby="#myModalLabel">
	<div class="modal-header">
		<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">
			试题列表
		</h3>
	</div>
	<div class="modal-body" id="modal-body" style="max-height:560px;">
		<?php $oid = 0; ?>
    	<?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
    	<?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']]){ ?>
        <?php $oid++; ?>
        <dl class="clear">
        	<dt class="float_l"><b><?php echo $oid; ?>、<?php echo $quest['questype']; ?></b></dt>
            <dd>
            	<?php $tid = 0; ?>
                <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] as $key => $question){ 
 $qnid++; ?>
                <?php $tid++; ?>
            	<a id="sign_<?php echo $question['questionid']; ?>" href="#question_<?php echo $question['questionid']; ?>" rel="0" class="badge questionindex<?php if($this->tpl_var['sessionvars']['examsessionsign'][$question['questionid']]){ ?> signBorder<?php } ?>"><?php echo $tid; ?></a>
            	<?php } ?>
            	<?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']] as $key => $questionrow){ 
 $qrid++; ?>
                <?php $tid++; ?>
                <?php $did = 0;
 foreach($questionrow['data'] as $key => $data){ 
 $did++; ?>
				<a id="sign_<?php echo $data['questionid']; ?>" href="#question_<?php echo $data['questionid']; ?>" rel="0" class="badge questionindex<?php if($this->tpl_var['sessionvars']['examsessionsign'][$data['questionid']]){ ?> signBorder<?php } ?>"><?php echo $tid; ?>-<?php echo $did; ?></a>
                <?php } ?>
                <?php } ?>
            </dd>
        </dl>
        <?php } ?>
        <?php } ?>
	</div>
	<div class="modal-footer">
		 <button aria-hidden="true" class="btn" data-dismiss="modal">隐藏</button>
	</div>
</div>
<div class="row-fluid">
	<div class="toolcontent">
		<div class="container-fluid footcontent">
			<div class="span6">
				<ul class="unstyled">
					<li><h6><a href="#top"><em class="icon-circle-arrow-up"></em>回顶部</a> &nbsp; <a href="#modal" data-toggle="modal"><em class="icon-calendar"></em>试题列表</a></h6></li>
				</ul>
			</div>
			<div class="span6">
				<ul class="unstyled">
					<li><h6>共 <span class="allquestionnumber">50</span> 题 总分：<span class="orange"><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['score']; ?></span>分 合格分数线：<span class="orange"><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['passscore']; ?></span>分 考试时间：<span class="orange"><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['examtime']; ?></span>分钟</h6></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('foot'); ?>
</body>
</html>