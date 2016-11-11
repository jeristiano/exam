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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-subject">科目管理</a> <span class="divider">/</span></li>
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-section&subjectid=<?php echo $this->tpl_var['subjectid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">科目管理</a> <span class="divider">/</span></li>
				<li class="active">添加章节</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">添加章节</a>
				</li>
				<li class="pull-right">
					<a href="index.php?exam-master-basic-section&subjectid=<?php echo $this->tpl_var['subjectid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">章节管理</a>
				</li>
			</ul>
			<form action="index.php?exam-master-basic-addsection" method="post" class="form-horizontal">
    			<fieldset>
    			<legend><?php echo $this->tpl_var['subjects'][$this->tpl_var['subjectid']]['subject']; ?></legend>
				<div class="control-group">
					<label for="section" class="control-label">章节名称：</label>
					<div class="controls">
						<input id="section" name="args[section]" type="text" size="30" value="" needle="needle" msg="请输入章节名称" />
					</div>
				</div>
				<div class="control-group">
				  	<div class="controls">
						<button class="btn btn-primary" type="submit">提交</button>
						<input type="hidden" name="insertsection" value="1"/>
						<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						<input type="hidden" name="args[sectionsubjectid]" value="<?php echo $this->tpl_var['subjectid']; ?>"/>
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