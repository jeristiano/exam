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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-teach-questions">考试管理</a> <span class="divider">/</span></li>
				<li class="active">修改考试</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">修改考试</a>
				</li>
			</ul>
        	<form action="index.php?exam-teach-basic-modifybasic" method="post" class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label for="basic" class="control-label">考试名称</label>
						<div class="controls">
							<input id="basic" name="args[basic]" type="text" value="<?php echo $this->tpl_var['basic']['basic']; ?>" needle="needle" msg="您必须输入考试名称" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">考试状态</label>
						<div class="controls">
							<label class="radio inline">
								<input name="args[basicclosed]" type="radio" value="0" <?php if(!$this->tpl_var['basic']['basicclosed']){ ?>checked<?php } ?>/>开启
							</label>
							<label class="radio inline">
								<input name="args[basicclosed]" type="radio" value="1" <?php if($this->tpl_var['basic']['basicclosed']){ ?>checked<?php } ?>/>关闭
							</label>
						</div>
					</div>
					<div class="control-group">
						<label for="basicthumb" class="control-label">考试缩略图</label>
						<div class="controls">
							<div class="thumbuper pull-left">
								<div class="thumbnail">
									<a href="javascript:;" class="second label""><em class="uploadbutton" id="catimg" exectype="thumb"></em></a>
									<div class="first" id="catimg_percent"></div>
									<div class="boot"><img src="<?php if($this->tpl_var['basic']['basicthumb']){ ?><?php echo $this->tpl_var['basic']['basicthumb']; ?><?php } else { ?>app/core/styles/images/noimage.gif<?php } ?>" id="catimg_view"/><input type="hidden" name="args[basicthumb]" value="<?php echo $this->tpl_var['basic']['basicthumb']; ?>" id="catimg_value"/></div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<label for="basicsubjectid" class="control-label">考试科目</label>
						<div class="controls">
							<select id="basicsubjectid"   name="args[basicsubjectid]" needle="needle" msg="您必须选择考试科目">
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
							<select id="basicareaid" name="args[basicareaid]"  needle="needle" msg="您必须选择考试班级">
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
						<label class="control-label">做为免费考试</label>
						<div class="controls">
							<label class="radio inline">
								<input name="args[basicdemo]" type="radio" value="1" <?php if($this->tpl_var['basic']['basicdemo']){ ?>checked<?php } ?>/>是
							</label>
							<label class="radio inline">
								<input name="args[basicdemo]" type="radio" value="0" <?php if(!$this->tpl_var['basic']['basicdemo']){ ?>checked<?php } ?>/>否
							</label>
							<span class="help-block">免费考试用户开通考试时不扣除积分</span>
						</div>
					</div> -->
					<!-- <div class="control-group">
						<label for="basicprice" class="control-label">价格设置</label>
						<div class="controls">
							<textarea class="input-xlarge" rows="4" name="args[basicprice]" id="basicprice"><?php echo $this->tpl_var['basic']['basicprice']; ?></textarea>
						  	<span class="help-block">请按照“时长:开通所需积分”格式填写，每行一个，时长以天为单位，免费考试此设置无效。</span>
						</div>
					</div> -->
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-success" type="submit">提交</button>
							<input type="hidden" name="basicid" value="<?php echo $this->tpl_var['basic']['basicid']; ?>"/>
							<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
							<input type="hidden" name="modifybasic" value="1"/>
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