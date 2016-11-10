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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li>
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a> <span class="divider">/</span></li>
				<li class="active">随机组卷</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">随机组卷</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a>
				</li>
			</ul>
	        <form action="?exam-master-exams-autopage" method="post" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="content">试卷名称：</label>
			  		<div class="controls">
			  			<input type="text" name="args[exam]" value="" needle="needle" msg="您必须为该试卷输入一个名称"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">评卷方式</label>
					<div class="controls">
						<label class="radio inline">
							<input name="args[examdecide]" type="radio" value="1"/>教师评卷
						</label>
						<label class="radio inline">
							<input name="args[examdecide]" type="radio" value="0" checked/>学生自评
						</label>
						<span class="help-block">教师评卷时有主观题则需要教师在后台评分后才能显示分数，无主观题自动显示分数。</span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="content">考试科目：</label>
				  	<div class="controls">
					  	<select class="combox" needle="needle" min="1" name="args[examsubject]" msg="请选择科目" onchange="javascript:loadsubjectsetting(this);">
						  	<option value="">请选择科目</option>
						  	<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
						  	<option value="<?php echo $subject['subjectid']; ?>"><?php echo $subject['subject']; ?></option>
						  	<?php } ?>
					  	</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="content">考试时间：</label>
			  		<div class="controls">
			  			<input type="text" name="args[examsetting][examtime]" value="60" size="4" needle="needle" class="inline"/> 分钟
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="content">来源：</label>
			  		<div class="controls">
			  			<input type="text" name="args[examsetting][comfrom]" value="" size="4"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="content">试卷总分：</label>
			  		<div class="controls">
			  			<input type="text" name="args[examsetting][score]" value="" size="4" needle="needle" msg="你要为本考卷设置总分" datatype="number"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="content">及格线：</label>
			  		<div class="controls">
			  			<input type="text" name="args[examsetting][passscore]" value="" size="4" needle="needle" msg="你要为本考卷设置一个及格分数线" datatype="number"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">题型排序</label>
					<div class="controls">
						<div class="sortable btn-group">
							<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
							<a class="btn questpanel panel_<?php echo $questype['questid']; ?>"><?php echo $questype['questype']; ?><input type="hidden" name="args[examsetting][questypelite][<?php echo $questype['questid']; ?>]" class="questypepanelinput" id="panel_<?php echo $questype['questid']; ?>" value="1"/></a>
							<?php } ?>
						</div>
						<span class="help-block">拖拽进行题型排序</span>
					</div>
				</div>
				<div class="control-group">
			        <label class="control-label">题量配比模式：</label>
		          	<div class="controls">
						<label class="radio inline">
			          		<input type="radio" class="input-text" name="args[examsetting][scalemodel]" value="1" onchange="javascript:$('#modeplane').html($('#sptype').html());"/> 开启
			          	</label>
			          	<label class="checkbox inline">
			          		<input type="radio" class="input-text" name="args[examsetting][scalemodel]" value="0" onchange="javascript:$('#modeplane').html($('#normaltype').html());" checked/> 关闭
			          	</label>
			       </div>
			    </div>
			    <div id="modeplane">
			    	<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
					<div class="control-group questpanel panel_<?php echo $questype['questid']; ?>">
						<label class="control-label" for="content"><?php echo $questype['questype']; ?>：</label>
						<div class="controls">
							<span class="info">共&nbsp;</span>
							<input id="iselectallnumber_<?php echo $questype['questid']; ?>" type="text" class="input-mini" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][number]" value="0" size="2" msg="您必须填写总题数"/>
							<span class="info">&nbsp;题，每题&nbsp;</span><input class="input-mini" needle="needle" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][score]" value="0" size="2" msg="您必须填写每题的分值"/>
							<span class="info">&nbsp;分，描述&nbsp;</span><input class="input-mini" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][describe]" value="" size="12"/>
							<span class="info">&nbsp;难度题数：易&nbsp;</span><input class="input-mini" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][easynumber]" value="0" size="2" msg="您需要填写简单题的数量，最小为0"/>
	  						<span class="info">&nbsp;中&nbsp;</span><input class="input-mini" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][middlenumber]" value="0" size="2" msg="您需要填写中等难度题的数量，最小为0"/>
	  						<span class="info">&nbsp;难&nbsp;</span><input class="input-mini" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][hardnumber]" value="0" size="2" datatype="number" msg="您需要填写难题的数量，最小为0"/>
						</div>
					</div>
					<?php } ?>
			    </div>
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-primary" type="submit">提交</button>
						<input type="hidden" name="submitsetting" value="1"/>
					</div>
				</div>
			</form>
			<div id="sptype" class="hide">
			    <div class="control-group">
			        <label class="control-label">题量配比：</label>
		          	<div class="controls">
			          	<label class="radio inline">题量配比模式关闭时，此设置不生效。题量配比操作繁琐，请尽量熟悉后再行操作。</label>
			       </div>
			    </div>
			    <?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
				<div class="control-group questpanel panel_<?php echo $questype['questid']; ?>">
					<label class="control-label" for="content"><?php echo $questype['questype']; ?>：</label>
					<div class="controls">
						<span class="info">共&nbsp;</span>
						<input id="iselectallnumber_<?php echo $questype['questid']; ?>" type="text" class="input-mini" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][number]" value="0" size="2" msg="您必须填写总题数"/>
						<span class="info">&nbsp;题，每题&nbsp;</span><input class="input-mini" needle="needle" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][score]" value="0" size="2" msg="您必须填写每题的分值"/>
						<span class="info">&nbsp;分，描述&nbsp;</span><input class="input-mini" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][describe]" value="" size="12"/>
					</div>
				</div>
				<div class="control-group questpanel panel_<?php echo $questype['questid']; ?>">
					<label class="control-label" for="content">配比率：</label>
					<div class="controls">
						<textarea class="input-xxlarge" rows="7" cols="4" name="args[examsetting][examscale][<?php echo $questype['questid']; ?>]"></textarea>
					</div>
				</div>
				<?php } ?>
			</div>
			<div id="normaltype" class="hide">
				<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
				<div class="control-group questpanel panel_<?php echo $questype['questid']; ?>">
					<label class="control-label" for="content"><?php echo $questype['questype']; ?>：</label>
					<div class="controls">
						<span class="info">共&nbsp;</span>
						<input id="iselectallnumber_<?php echo $questype['questid']; ?>" type="text" class="input-mini" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][number]" value="0" size="2" msg="您必须填写总题数"/>
						<span class="info">&nbsp;题，每题&nbsp;</span><input class="input-mini" needle="needle" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][score]" value="0" size="2" msg="您必须填写每题的分值"/>
						<span class="info">&nbsp;分，描述&nbsp;</span><input class="input-mini" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][describe]" value="" size="12"/>
						<span class="info">&nbsp;难度题数：易&nbsp;</span><input class="input-mini" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][easynumber]" value="0" size="2" msg="您需要填写简单题的数量，最小为0"/>
  						<span class="info">&nbsp;中&nbsp;</span><input class="input-mini" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][middlenumber]" value="0" size="2" msg="您需要填写中等难度题的数量，最小为0"/>
  						<span class="info">&nbsp;难&nbsp;</span><input class="input-mini" type="text" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][hardnumber]" value="0" size="2" datatype="number" msg="您需要填写难题的数量，最小为0"/>
					</div>
				</div>
				<?php } ?>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<script>
function loadsubjectsetting(obj)
{
	$.getJSON('index.php?exam-master-basic-getsubjectquestype&subjectid='+$(obj).val()+'&'+Math.random(),function(data){$('.questpanel').hide();$('.questypepanelinput').val('0');for(x in data){$('.panel_'+data[x]).show();$('#panel_'+data[x]).val('1');}});
}
</script>
</body>
</html>
<?php } ?>