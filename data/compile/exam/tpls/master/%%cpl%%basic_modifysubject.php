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
				<li class="active">科目管理</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">修改科目</a>
				</li>
			</ul>
	        <form action="index.php?exam-master-basic-modifysubject" method="post" class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label for="subject" class="control-label">科目名称：</label>
						<div class="controls">
							<input name="args[subject]" id="subject" type="text" size="30" value="<?php echo $this->tpl_var['subject']['subject']; ?>" needle="needle" msg="您必须输入一个科目名称" />
						</div>
					</div>
					<div class="control-group">
						<label for="subject" class="control-label">科目题型：</label>
						<div class="controls">
							<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
							<label class="checkbox inline">
				          		<input type="checkbox" name="args[subjectsetting][questypes][<?php echo $questype['questid']; ?>]" value="1"<?php if($this->tpl_var['subject']['subjectsetting']['questypes'][$questype['questid']]){ ?> checked<?php } ?>/> <?php echo $questype['questype']; ?>
				          	</label>
				          	<?php } ?>
						</div>
					</div>
					<div class="control-group">
					  	<div class="controls">
						  	<button class="btn btn-primary" type="submit">提交</button>
							<input type="hidden" name="modifysubject" value="1"/>
							<input type="hidden" name="subjectid" value="<?php echo $this->tpl_var['subject']['subjectid']; ?>"/>
							<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						</div>
					</div>
				</fieldset>
			</form>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>