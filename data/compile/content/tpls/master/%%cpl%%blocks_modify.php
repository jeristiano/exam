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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-blocks&page=<?php echo $this->tpl_var['page']; ?>">标签管理</a> <span class="divider">/</span></li>
				<li class="active">标签修改</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">标签修改</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-blocks&page=<?php echo $this->tpl_var['page']; ?>">标签管理</a>
				</li>
			</ul>
			<?php if($this->tpl_var['block']['blocktype'] == 1){ ?>
	        <form action="?content-master-blocks-modify" method="post" class="form-horizontal">
		        <div class="control-group">
		            <label for="block" class="control-label">名称：</label>
		            <div class="controls">
		            	<input id="block" type="text" name="args[block]" needle="needle" msg="您必须输入标签名称" max="40" value="<?php echo $this->tpl_var['block']['block']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockposition" class="control-label">位置：</label>
		            <div class="controls">
		            	<input id="blockposition" type="text" name="args[blockposition]" needle="needle" msg="您必须输入内容所在位置" max="40" value="<?php echo $this->tpl_var['block']['blockposition']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_content" class="control-label">内容：</label>
            		<div class="controls">
            			<textarea id="blockcontent_content" class="ckeditor" name="args[blockcontent][content]" rows="7" cols="4"><?php echo $this->tpl_var['block']['blockcontent']['content']; ?></textarea>
		        	</div>
		        </div>
		        <div class="control-group">
		            <div class="controls">
		            	<button class="btn btn-primary" type="submit">提交</button>
			            <input type="hidden" name="blockid" value="<?php echo $this->tpl_var['block']['blockid']; ?>">
			            <input type="hidden" name="modifyblock" value="1">
			            <input type="hidden" name="page" value="<?php echo $this->tpl_var['apge']; ?>">
		        	</div>
		        </div>
		    </form>
			<?php } elseif($this->tpl_var['block']['blocktype'] == 2){ ?>
			<form action="?content-master-blocks-modify" method="post" class="form-horizontal">
		        <div class="control-group">
		            <label for="block" class="control-label">名称：</label>
		            <div class="controls">
		            	<input id="block" type="text" name="args[block]" needle="needle" msg="您必须输入名称" max="40" value="<?php echo $this->tpl_var['block']['block']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockposition" class="control-label">位置：</label>
		            <div class="controls">
		            	<input id="blockposition" type="text" name="args[blockposition]" needle="needle" msg="您必须输入内容所在位置" max="40" value="<?php echo $this->tpl_var['block']['blockposition']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_app" class="control-label">选择应用：</label>
		            <div class="controls">
		            	<select id="blockcontent_app" name="args[blockcontent][app]" needle="needle" msg="您必须选择应用">
			            	<option value="">请选择应用</option>
			            	<?php $aid = 0;
 foreach($this->tpl_var['apps'] as $key => $app){ 
 $aid++; ?>
			            	<option value="<?php echo $app['appid']; ?>"<?php if($this->tpl_var['block']['blockcontent']['app'] == $app['appid']){ ?> selected<?php } ?>><?php echo $app['appname']; ?></option>
			            	<?php } ?>
			            </select>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_catid" class="control-label">分类ID：</label>
		            <div class="controls">
		            	<input id="blockcontent_catid" type="text" name="args[blockcontent][catid]" datatype="number" needle="needle" msg="您必须输入调用分类的ID" value="<?php echo $this->tpl_var['block']['blockcontent']['catid']; ?>">
		        		<div class="intro">请在分类列表里查看分类ID</div>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_query" class="control-label">查询条件：</label>
		            <div class="controls">
		            	<textarea class="input-xxlarge" id="blockcontent_query" name="args[blockcontent][query]" rows="7" cols="4"><?php echo $this->tpl_var['block']['blockcontent']['query']; ?></textarea>
		            	<div class="intro">每行一个条件</div>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_number" class="control-label">调用数量：</label>
            		<div class="controls">
		            	<input id="blockcontent_number" type="text" name="args[blockcontent][number]" value="<?php echo $this->tpl_var['block']['blockcontent']['number']; ?>" needle="needle" datatype="number">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_template" class="control-label">模板：</label>
            		<div class="controls">
		            	<textarea class="input-xxlarge" id="blockcontent_template" name="args[blockcontent][template]" rows="7" needle="needle" cols="4" msg="您必须输入模板内容"><?php echo $this->tpl_var['block']['blockcontent']['template']; ?></textarea>
		        	</div>
		        </div>
		        <div class="control-group">
		            <div class="controls">
		            	<button class="btn btn-primary" type="submit">提交</button>
			            <input type="hidden" name="blockid" value="<?php echo $this->tpl_var['block']['blockid']; ?>">
			            <input type="hidden" name="page" value="<?php echo $this->tpl_var['apge']; ?>">
			            <input type="hidden" name="modifyblock" value="1">
		            </div>
		        </div>
		    </form>
			<?php } elseif($this->tpl_var['block']['blocktype'] == 3){ ?>
			<form action="?content-master-blocks-modify" method="post" class="form-horizontal">
		        <div class="control-group">
		            <label for="block" class="control-label">名称：</label>
		            <div class="controls">
		            	<input type="text" id="block" name="args[block]" needle="needle" msg="您必须输入名称" max="40" value="<?php echo $this->tpl_var['block']['block']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockposition" class="control-label">位置：</label>
		            <div class="controls">
		            	<input type="text" id="blockposition" name="args[blockposition]" needle="needle" msg="您必须输入内容所在位置" max="40" value="<?php echo $this->tpl_var['block']['blockposition']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_dbtable" class="control-label">表名：</label>
		            <div class="controls">
		            	<input type="text" id="blockcontent_dbtable" name="args[blockcontent][dbtable]" value="<?php echo $this->tpl_var['block']['blockcontent']['dbtable']; ?>">
		            	<div class="intro">多个表名请使用英文逗号隔开</div>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_query" class="control-label">查询条件：</label>
		            <div class="controls">
		            	<textarea class="input-xxlarge" id="blockcontent_query" name="args[blockcontent][query]" rows="7" cols="4"><?php echo $this->tpl_var['block']['blockcontent']['query']; ?></textarea>
		            	<div class="intro">多个表名请使用英文逗号隔开</div>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_order" class="control-label">排序：</label>
		            <div class="controls">
		            	<input type="text" id="blockcontent_order" name="args[blockcontent][order]" value="<?php echo $this->tpl_var['block']['blockcontent']['order']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_limit_0" class="control-label">起始数：</label>
		            <div class="controls">
		            	<input type="text" id="blockcontent_limit_0" name="args[blockcontent][limit][0]" value="<?php echo $this->tpl_var['block']['blockcontent']['limit'][0]; ?>" datatype="number">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_limit_1" class="control-label">数量：</label>
		            <div class="controls">
		            	<input type="text" id="blockcontent_limit_1" name="args[blockcontent][limit][1]"  value="<?php echo $this->tpl_var['block']['blockcontent']['limit'][1]; ?>" needle="needle" datatype="number">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_sql" class="control-label">手写SQL</label>
            		<div class="controls">
		            	<textarea class="input-xxlarge" id="blockcontent_sql" name="args[blockcontent][sql]" rows="7" cols="4"><?php echo $this->tpl_var['block']['blockcontent']['sql']; ?></textarea>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_index" class="control-label">索引键：</label>
		            <div class="controls">
		            	<input type="text" id="blockcontent_index" name="args[blockcontent][index]" value="<?php echo $this->tpl_var['block']['blockcontent']['index']; ?>" datatype="number">
		            	<div class="intro">多个键名请使用英文逗号隔开</div>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_serial" class="control-label">反序列键：</label>
		            <div class="controls">
		            	<input type="text" id="blockcontent_serial" name="args[blockcontent][serial]" value="<?php echo $this->tpl_var['block']['blockcontent']['serial']; ?>" datatype="number">
		            	<div class="intro">多个键名请使用英文逗号隔开</div>
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_template" class="control-label">模板：</label>
            		<div class="controls">
		            	<textarea class="input-xxlarge" id="blockcontent_template" name="args[blockcontent][template]" needle="needle" rows="7" cols="4" msg="您必须输入模板内容"><?php echo $this->tpl_var['block']['blockcontent']['template']; ?></textarea>
		        	</div>
		        </div>
		        <div class="control-group">
		            <div class="controls">
		            	<button class="btn btn-primary" type="submit">提交</button>
			            <input type="hidden" name="blockid" value="<?php echo $this->tpl_var['block']['blockid']; ?>">
			            <input type="hidden" name="page" value="<?php echo $this->tpl_var['apge']; ?>">
			            <input type="hidden" name="modifyblock" value="1">
		        	</div>
		        </div>
		    </form>
			<?php } elseif($this->tpl_var['block']['blocktype'] == 4){ ?>
	        <form action="?content-master-blocks-modify" method="post" class="form-horizontal">
		        <div class="control-group">
		            <label for="block" class="control-label">名称：</label>
		            <div class="controls">
		            	<input type="text" name="args[block]" id="block" needle="needle" msg="您必须输入名称" max="40" value="<?php echo $this->tpl_var['block']['block']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockposition" class="control-label">位置：</label>
		            <div class="controls">
		            	<input type="text" id="blockposition" name="args[blockposition]" needle="needle" msg="您必须输入内容所在位置" max="40" value="<?php echo $this->tpl_var['block']['blockposition']; ?>">
		        	</div>
		        </div>
		        <div class="control-group">
		            <label for="blockcontent_content" class="control-label">内容：</label>
            		<div class="controls">
		            	<textarea class="input-xxlarge" id="blockcontent_content" name="args[blockcontent][content]" rows="7" cols="4"><?php echo $this->tpl_var['block']['blockcontent']['content']; ?></textarea>
		        	</div>
		        </div>
		        <div class="control-group">
		            <div class="controls">
		            	<button class="btn btn-primary" type="submit">提交</button>
			            <input type="hidden" name="blockid" value="<?php echo $this->tpl_var['block']['blockid']; ?>">
			            <input type="hidden" name="page" value="<?php echo $this->tpl_var['apge']; ?>">
			            <input type="hidden" name="modifyblock" value="1">
		        	</div>
		        </div>
		    </form>
		    <?php } ?>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>