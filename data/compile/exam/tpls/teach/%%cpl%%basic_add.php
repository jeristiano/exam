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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-teach-basic">考试管理</a> <span class="divider">/</span></li>
				<li class="active">添加考试</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">添加考试</a>
				</li>
				<li class="dropdown pull-right">
					<a href="index.php?exam-teach-basic">考试管理</a>
				</li>
			</ul>
			<form action="index.php?exam-teach-basic-add" method="post" class="form-horizontal">
				<fieldset>
				<div class="control-group">
					<label for="basic" class="control-label">考试名称</label>
					<div class="controls">
						<input id="basic" name="args[basic]" type="text" value="<?php echo $this->tpl_var['basic']['basic']; ?>" needle="needle" msg="您必须输入考试名称" />
					</div>
				</div>
				<div class="control-group">
					<label for="basicthumb" class="control-label">考试缩略图</label>
					<div class="controls">
						<div class="thumbuper pull-left">
							<div class="thumbnail">
								<a href="javascript:;" class="second label""><em class="uploadbutton" id="catimg" exectype="thumb"></em></a>
								<div class="first" id="catimg_percent"></div>
								<div class="boot"><img src="app/core/styles/images/noimage.gif" id="catimg_view"/><input type="hidden" name="args[basicthumb]" value="" id="catimg_value"/></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="control-group">
					<label for="basicsubjectid" class="control-label">考试科目</label>
					<div class="controls">
						<select id="basicsubjectid" name="args[basicsubjectid]" needle="needle" msg="您必须选择考试科目">
		        		<option value="">选择科目</option>
				  		<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
				  		<option value="<?php echo $subject['subjectid']; ?>"<?php if($subject['subjectid'] == $this->tpl_var['basic']['basicsubjectid']){ ?> selected<?php } ?>><?php echo $subject['subject']; ?></option>
				  		<?php } ?>
				  		</select>
					</div>
				</div>
				<div class="control-group">
					<label for="basicareaid" class="control-label">考试班级</label>
					<div class="controls">
						<select id="basicareaid" name="args[basicareaid]" needle="needle" msg="您必须选择考试班级">
		        		<option value="">选择班级</option>
				  		<?php $aid = 0;
 foreach($this->tpl_var['areas'] as $key => $area){ 
 $aid++; ?>
				  		<option value="<?php echo $area['areaid']; ?>"<?php if($area['areaid'] == $this->tpl_var['basic']['basicareaid']){ ?> selected<?php } ?>><?php echo $area['area']; ?></option>
				  		<?php } ?>
				  		</select>
					</div>
				</div>
				<!-- <div class="control-group">
					<label class="control-label">做为演示考试</label>
					<div class="controls">
						<label class="radio inline">
							<input name="args[basicdemo]" type="radio" value="1" <?php if($this->tpl_var['basic']['basicdemo']){ ?>checked<?php } ?>/>是
						</label>
						<label class="radio inline">
							<input name="args[basicdemo]" type="radio" value="0" <?php if(!$this->tpl_var['basic']['basicdemo']){ ?>checked<?php } ?>/>否
						</label>
						<span class="help-block">演示考试为用户未开通考试时演示使用</span>
					</div>
				</div> -->
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-success" type="submit">提交</button>
						<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						<input type="hidden" name="insertbasic" value="1"/>
						<?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
						<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
						<?php } ?>
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