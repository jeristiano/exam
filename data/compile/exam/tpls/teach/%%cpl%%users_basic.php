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
				<li class="active">课程成绩</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">考场管理</a>
				</li>
				<li class="pull-right">
					<a href="index.php?exam-teach-basic-add">添加考场</a>
				</li>
			</ul>
			<form action="index.php?exam-teach-users" method="post">
				<table class="table">
					<thead>
		                <tr>
					        <th colspan="2">搜索</th>
					        <th></th>
					        <th></th>
					        <th></th>
					        <th></th>
		                </tr>
		            </thead>
					<tr>
						<td>
							考场ID：
						</td>
						<td>
							<input name="search[basicid]" class="input-small" type="text" class="number" value="<?php echo $this->tpl_var['search']['basicid']; ?>"/>
						</td>
						<td>
							关键字：
						</td>
						<td>
							<input class="input-medium" name="search[keyword]" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
						</td>
						<td>
							地区：
						</td>
			        	<td>
			        		<select name="search[basicareaid]" class="input-medium">
				        		<option value="0">选择地区</option>
						  		<?php $aid = 0;
 foreach($this->tpl_var['areas'] as $key => $area){ 
 $aid++; ?>
						  		<option value="<?php echo $area['areaid']; ?>"<?php if($area['areaid'] == $this->tpl_var['search']['basicareaid']){ ?> selected<?php } ?>><?php echo $area['area']; ?></option>
						  		<?php } ?>
					  		</select>
			        	</td>
			        </tr>
			        <tr>
			        	<td>
							API标识：
						</td>
						<td>
							<input class="input-small" name="search[basicapi]" type="text" value="<?php echo $this->tpl_var['search']['basicapi']; ?>"/>
						</td>
						<td>
							科目：
						</td>
						<td>
			        		<select name="search[basicsubjectid]" class="input-medium">
				        		<option value="0">选择科目</option>
						  		<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
						  		<option value="<?php echo $subject['subjectid']; ?>"<?php if($subject['subjectid'] == $this->tpl_var['search']['basicsubjectid']){ ?> selected<?php } ?>><?php echo $subject['subject']; ?></option>
						  		<?php } ?>
					  		</select>
			        	</td>
						<td>
							<button class="btn btn-primary" type="submit">提交</button>
						</td>
						<td></td>
					</tr>
				</table>
				<div class="input">
					<input type="hidden" value="1" name="search[argsmodel]" />
				</div>
			</form>
	        <table class="table table-hover">
	            <thead>
	                <tr>
	                    <th><input type="checkbox" class="checkall"/></th>
	                    <th>考场ID</th>
				        <th>考场名称</th>
				        <th>考场地区</th>
				        <th>考试科目</th>
				        <th>操作</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php $bid = 0;
 foreach($this->tpl_var['basics']['data'] as $key => $basic){ 
 $bid++; ?>
			        <tr>
						<td>
							<input type="checkbox" name="delids[<?php echo $basic['basicid']; ?>]" value="1"/>
						</td>
						<td>
							<?php echo $basic['basicid']; ?>
						</td>
						<td>
							<?php echo $basic['basic']; ?>
						</td>
						<td>
							<?php echo $this->tpl_var['areas'][$basic['basicareaid']]['area']; ?>
						</td>
						<td>
							<?php echo $this->tpl_var['subjects'][$basic['basicsubjectid']]['subject']; ?>
						</td>
						<td>
							<div class="btn-group">
								<a class="btn" href="index.php?exam-teach-users-scorelist&page=<?php echo $this->tpl_var['page']; ?>&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="成绩统计">成绩统计</a>
								<a class="btn" href="index.php?exam-teach-users-exams&page=<?php echo $this->tpl_var['page']; ?>&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="主观题批改">主观题批改</a>
							</div>
						</td>
			        </tr>
			        <?php } ?>
	        	</tbody>
	        </table>
	        <div class="pagination pagination-right">
				<ul><?php echo $this->tpl_var['basics']['pages']; ?></ul>
	        </div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>