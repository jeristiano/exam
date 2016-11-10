<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<?php $this->_compileInclude('menu'); ?>
		</div>
		<div class="span10" id="datacontent">
			<ul class="breadcrumb">
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li>
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category">分类管理</a> <span class="divider">/</span></li>
				<li class="active">添加分类</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">添加分类</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category&parent=<?php echo $this->tpl_var['parent']; ?>">分类列表</a>
				</li>
			</ul>
			<form action="index.php?<?php echo $this->tpl_var['_app']; ?>-master-category-add" method="post" class="form-horizontal">
				<fieldset>
					<div class="control-group">
					</div>
					<div class="control-group">
						<label for="modulename" class="control-label">分类名称</label>
						<div class="controls">
							<input type="text" id="input1" name="args[catname]" value="<?php echo $this->tpl_var['category']['catname']; ?>" datatype="userName" needle="needle" msg="您必须输入中英文字符的分类名称">
							<span class="help-block">请输入分类名称</span>
						</div>
					</div>
					<?php if(!$this->tpl_var['parent']){ ?>
					<div class="control-group">
						<label for="modulename" class="control-label">显示在导航条</label>
						<div class="controls">
							<label class="radio inline">
				          		<input type="radio" class="input-text" name="args[catinmenu]" value="1"/> 显示
				          	</label>
				          	<label class="radio inline">
				          		<input type="radio" class="input-text" name="args[catinmenu]" value="0" checked/> 不显示
				          	</label>
						</div>
					</div>
					<?php } ?>
					<div class="control-group">
						<label for="modulename" class="control-label">在首页展示内容</label>
						<div class="controls">
							<input type="text" name="args[catindex]" value="0" datatype="number" needle="needle" msg="您必须填写展示内容条数"> 条
							<span class="help-block">填写展示内容条数，如果不需要在首页展示，请填写0。</span>
						</div>
					</div>
					<div class="control-group">
						<label for="modulecode" class="control-label">分类排序</label>
						<div class="controls">
							<input type="text" id="input2" name="args[catlite]" value="<?php echo $this->tpl_var['category']['catlite']; ?>" datatype="number" msg="排序为整数">
						</div>
					</div>
					<div class="control-group">
						<label for="moduledescribe" class="control-label">外链地址</label>
						<div class="controls">
							<input type="text" name="args[caturl]" value="<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['category']['caturl'])); ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="moduledescribe" class="control-label">使用外链地址</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio"  name="args[catuseurl]" value="1"<?php if($this->tpl_var['category']['catuseurl']){ ?> checked<?php } ?>>使用
							</label>
			            	<label class="radio inline">
			            		<input type="radio"  name="args[catuseurl]" value="0"<?php if(!$this->tpl_var['category']['catuseurl']){ ?> checked<?php } ?>>不使用
			            	</label>
							<span class="help-block">填写外链地址后，该分类会直接转到外链地址</span>
						</div>
					</div>
					<div class="control-group">
						<label for="moduledescribe" class="control-label">发布用户</label>
						<div class="controls">
							<input type="text" name="args[catmanager][pubusers]" value="<?php echo $this->tpl_var['category']['catmanager']['pubusers']; ?>">
							<span class="help-block">填写允许发布内容的用户ID，用英文逗号隔开</span>
						</div>
					</div>
					<div class="control-group">
						<label for="moduledescribe" class="control-label">发布角色</label>
						<div class="controls">
							<input type="text" name="args[catmanager][pubgroups]" value="<?php echo $this->tpl_var['category']['catmanager']['pubgroups']; ?>">
							<span class="help-block">填写允许发布内容的角色（用户组）ID，用英文逗号隔开</span>
						</div>
					</div>
					<div class="control-group">
						<label for="modulecode" class="control-label">分类模板</label>
						<div class="controls">
							<select name="args[cattpl]" needle="needle" msg="您必须为这个分类选择一个模板">
				            	<?php $tid = 0;
 foreach($this->tpl_var['tpls'] as $key => $tpl){ 
 $tid++; ?>
				            	<option value="<?php echo $tpl; ?>"<?php if($this->tpl_var['category']['cattpl'] == $tpl){ ?> selected<?php } ?>><?php echo $tpl; ?></option>
				            	<?php } ?>
				            </select>
						</div>
					</div>
					<div class="control-group">
						<label for="moduledescribe" class="control-label">分类图片</label>
						<div class="controls">
							<div class="thumbuper pull-left">
								<div class="thumbnail">
									<a href="javascript:;" class="second label""><em class="uploadbutton" id="catimg" exectype="thumb"></em></a>
									<div class="first" id="catimg_percent"></div>
									<div class="boot"><img src="app/core/styles/images/noimage.gif" id="catimg_view"/><input type="hidden" name="args[catimg]" value="" id="catimg_value"/></div>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label for="catdes" class="control-label">分类简介</label>
						<div class="controls">
							<textarea class="input-xxlarge ckeditor" rows="7" id="catdes" name="args[catdes]"></textarea>
							<span class="help-block">对这个模型进行描述</span>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-primary" type="submit">提交</button>
				            <input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>">
				            <input type="hidden" name="addcategory" value="1">
				            <input type="hidden" name="args[catparent]" value="<?php echo $this->tpl_var['parent']; ?>">
							<?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
							<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
							<?php } ?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
</body>
</html>