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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-contents&page=<?php echo $this->tpl_var['page']; ?>">内容管理</a> <span class="divider">/</span></li>
				<li class="active">修改内容</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">修改内容</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-contents&catid=<?php echo $this->tpl_var['content']['contentid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">内容管理</a>
				</li>
			</ul>
			<form action="index.php?content-master-contents-edit" method="post" class="form-horizontal">
				<div class="control-group">
		            <label for="contenttitle" class="control-label">标题：</label>
		            <div class="controls">
					    <input type="text" id="contenttitle" name="args[contenttitle]" needle="needle" msg="您必须输入标题" value="<?php echo $this->tpl_var['content']['contenttitle']; ?>">
			        </div>
		        </div>
		        <!--
		        <div class="controls">
		            <label for="block" class="control-label">标题颜色：</label>
		            <input type="text" name="args[contenttitle]" needle="needle" msg="您必须输入标题">
		        </div>
		        <div class="controls">
		            <label for="block" class="control-label">标题加粗：</label>
		            <input type="text" name="args[contenttitle]" needle="needle" msg="您必须输入标题">
		        </div>

		        <div class="control-group">
		            <label for="contentmoduleid" class="control-label">模型：</label>
		            <div class="controls">
					    <select id="contentmoduleid" msg="您必须选择信息模型" refreshjs="on" needle="needle" class="combox" name="args[contentmoduleid]" refUrl="index.php?content-master-module-moduleforms&moduleid={value}" target="contentforms">
			            	<option value="">选择信息模型</option>
			            	<?php $mid = 0;
 foreach($this->tpl_var['modules'] as $key => $module){ 
 $mid++; ?>
			            	<option value="<?php echo $module['moduleid']; ?>"><?php echo $module['modulename']; ?></option>
			            	<?php } ?>
			            </select>
			        </div>
		        </div>
		        -->
		        <div class="control-group">
		            <label for="block" class="control-label">缩略图：</label>
		            <div class="controls">
			            <div class="thumbuper pull-left">
							<div class="thumbnail">
								<a href="javascript:;" class="second label""><em class="uploadbutton" id="contentthumb" exectype="thumb"></em></a>
								<div class="first" id="contentthumb_percent"></div>
								<div class="boot"><img src="<?php if($this->tpl_var['content']['contentthumb']){ ?><?php echo $this->tpl_var['content']['contentthumb']; ?><?php } else { ?>app/core/styles/images/noimage.gif<?php } ?>" id="contentthumb_view"/><input type="hidden" name="args[contentthumb]" value="<?php echo $this->tpl_var['content']['contentthumb']; ?>" id="contentthumb_value"/></div>
							</div>
						</div>
					</div>
		        </div>
		        <div class="control-group">
		            <label for="contentlink" class="control-label">站外链接：</label>
		            <div class="controls">
					    <input type="text" id="contentlink" name="args[contentlink]" value="<?php if($this->tpl_var['content']['contentlink']){ ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['content']['contentlink'])); ?><?php } ?>">
			        </div>
		        </div>
		        <div class="control-group">
		            <label for="contentdescribe" class="control-label">摘要：</label>
		            <div class="controls">
					    <textarea id="contentdescribe" class="input-xxlarge" name="args[contentdescribe]" rows="7" cols="4"><?php echo $this->tpl_var['content']['contentdescribe']; ?></textarea>
			        </div>
		        </div>
    			<?php $fid = 0;
 foreach($this->tpl_var['forms'] as $key => $form){ 
 $fid++; ?>
				<div class="control-group">
					<label for="<?php echo $form['id']; ?>" class="control-label"><?php echo $form['title']; ?></label>
					<div class="controls">
						<?php echo $form['html']; ?>
					</div>
				</div>
				<?php } ?>
		    	<div class="control-group">
		            <label for="contenttext" class="control-label">内容</label>
		            <div class="controls">
					    <textarea id="contenttext" rows="7" cols="4" class="ckeditor" name="args[contenttext]"><?php echo $this->tpl_var['content']['contenttext']; ?></textarea>
			        </div>
		        </div>
		        <div class="control-group">
		            <label for="contenttemplate" class="control-label">模版：</label>
		            <div class="controls">
					    <select name="args[contenttemplate]" id="contenttemplate">
			            	<?php $tid = 0;
 foreach($this->tpl_var['tpls'] as $key => $tpl){ 
 $tid++; ?>
			            	<option value="<?php echo $tpl; ?>"><?php echo $tpl; ?></option>
			            	<?php } ?>
			            </select>
			        </div>
		        </div>
		        <div class="control-group">
		            <div class="controls">
			            <button class="btn btn-primary" type="submit">提交</button>
			            <input type="hidden" name="contentid" value="<?php echo $this->tpl_var['contentid']; ?>">
			            <input type="hidden" name="gotopos" value="1">
			            <input type="hidden" name="submit" value="1">
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