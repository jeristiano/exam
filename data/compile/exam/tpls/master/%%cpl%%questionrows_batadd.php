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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-rowsquestions&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">题冒题管理</a> <span class="divider">/</span></li>
				<li class="active">批量添加题冒</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">批量添加题冒</a>
				</li>
				<li class="dropdown pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-rowsquestions&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">题冒题管理</a>
				</li>
			</ul>
	        <form action="index.php?exam-master-rowsquestions-bataddquestionrows" method="post" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="content">试题文本：</label>
					<div class="controls">
						<textarea id="content" name="content" rows="15" class="input-xxlarge span9"></textarea>
						<span class="help-block">请将准备好的格式粘贴到文本框内，点击保存即可</span>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-primary" type="submit">提交</button>
						<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						<input type="hidden" name="type" value="1"/>
						<input type="hidden" name="insertquestion" value="1"/>
						<?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
						<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
						<?php } ?>
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