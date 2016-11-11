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
				<li class="active">添加内容</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">添加内容</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-contents&catid=<?php echo $this->tpl_var['catid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">内容管理</a>
				</li>
			</ul>
			<form action="index.php?content-master-contents-add" method="post" class="form-horizontal">
				<div class="control-group">
		            <label for="contenttitle" class="control-label">标题：</label>
		            <div class="controls">
					    <input type="text" id="contenttitle" name="args[contenttitle]" needle="needle" msg="您必须输入标题">
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
		        -->
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
		        <div class="control-group">
		            <label for="block" class="control-label">缩略图：</label>
		            <div class="controls">
			            <div class="thumbuper pull-left">
							<div class="thumbnail">
								<a href="javascript:;" class="second label""><em class="uploadbutton" id="contentthumb" exectype="thumb"></em></a>
								<div class="first" id="contentthumb_percent"></div>
								<div class="boot"><img src="app/core/styles/images/noimage.gif" id="contentthumb_view"/><input type="hidden" name="args[contentthumb]" value="" id="contentthumb_value"/></div>
							</div>
						</div>
					</div>
		        </div>
		        <div class="control-group">
		            <label for="contentcatid" class="control-label">分类：</label>
		        	<div class="controls form-inline">
					    <select id="contentcatid" msg="您必须选择一个分类" needle="needle" class="autocombox input-medium" name="args[contentcatid]" refUrl="index.php?content-master-category-ajax-getchildcategory&catid={value}">
			            	<option value="">选择一级分类</option>
			            	<?php $cid = 0;
 foreach($this->tpl_var['parentcat'] as $key => $cat){ 
 $cid++; ?>
			            	<option value="<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></option>
			            	<?php } ?>
			            </select>
			        </div>
		        </div>
		        <div class="control-group">
		            <label for="contentlink" class="control-label">站外链接：</label>
		            <div class="controls">
					    <input type="text" id="contentlink" name="args[contentlink]">
			        </div>
		        </div>
		        <div class="control-group">
		            <label for="contentdescribe" class="control-label">摘要：</label>
		            <div class="controls">
					    <textarea id="contentdescribe" class="input-xxlarge" name="args[contentdescribe]" rows="7" cols="4"></textarea>
			        </div>
		        </div>
		    	<div id="contentforms"></div>
		    	<div class="control-group">
		            <label for="contenttext" class="control-label">内容</label>
		            <div class="controls">
					    <textarea id="contenttext" rows="7" cols="4" class="ckeditor" name="args[contenttext]"></textarea>
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
		        <?php if($this->tpl_var['poses']){ ?>
		        <div class="control-group">
		            <label class="control-label">推荐到：</label>
	            	<div class="controls">
					    <?php $pid = 0;
 foreach($this->tpl_var['poses'] as $key => $pos){ 
 $pid++; ?>
		            	<label class="checkbox inline">
		            		<input type="checkbox" value="<?php echo $pos['posid']; ?>" name="position[]"><?php echo $pos['posname']; ?>
		            	</label>
		            	<?php } ?>
			        </div>
		        </div>
		        <?php } ?>
		        <div class="control-group">
		            <div class="controls">
			            <button class="btn btn-primary" type="submit">提交</button>
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