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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-teach-basic&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">考试管理</a> <span class="divider">/</span></li>
				<li class="active">考试范围</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">考试范围</a>
				</li>
				<li class="dropdown pull-right">
					<a href="index.php?exam-teach-basic&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">考试管理</a>
				</li>
			</ul>
	        <form action="?exam-teach-basic-setexamrange" method="post" class="form-horizontal">
				<table class="table table-hover">
					<thead>
					<tr>
						<th colspan="6"><?php echo $this->tpl_var['basic']['basic']; ?></th>
					</tr>
					</thead>
					<tr>
						<td>
							考试ID：
						</td>
						<td>
							<?php echo $this->tpl_var['basic']['basicid']; ?>
						</td>
						<td>
							科目：
						</td>
						<td>
							<?php echo $this->tpl_var['subjects'][$this->tpl_var['basic']['basicsubjectid']]['subject']; ?>
						</td>
						<td>
							班级：
						</td>
			        	<td>
			        		<?php echo $this->tpl_var['areas'][$this->tpl_var['basic']['basicareaid']]['area']; ?>
			        	</td>
			        	
					</tr>
				</table>
				<div class="control-group">
					<h5 class="control-label ">章节选择：</h5>
				</div>
				<?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
				<div class="control-group">
					<label class="control-label">
				        <?php echo $section['section']; ?>
				    </label>
				    <div class="controls" style="text-indent:10px;">
				    	<?php $kid = 0;
 foreach($this->tpl_var['knows'][$section['sectionid']] as $key => $know){ 
 $kid++; ?>
				    	<label class="checkbox inline"><input type="checkbox" value="<?php echo $know['knowsid']; ?>" name="args[basicknows][<?php echo $section['sectionid']; ?>][<?php echo $know['knowsid']; ?>]" <?php if($this->tpl_var['basic']['basicknows'][$section['sectionid']][$know['knowsid']] == $know['knowsid']){ ?>checked<?php } ?>/><?php echo $know['knows']; ?></label>
				    	<?php } ?>
				    </div>
				</div>
				<?php } ?>
				<div class="control-group">
					<label for="basicexam_auto" class="control-label">考试模式：</label>
					<div class="controls">
						<label class="radio inline">
				          		<input type="radio" class="input-text" name="args[basicexam][model]" value="0"<?php if($this->tpl_var['basic']['basicexam']['model'] == 0){ ?> checked<?php } ?>/> 全功能模式（练习和正式考试均开放）
			          	</label>
			          	<label class="radio inline">
			          		<input type="radio" class="input-text" name="args[basicexam][model]" value="1"<?php if($this->tpl_var['basic']['basicexam']['model'] == 1){ ?> checked<?php } ?>/> 练习模式（仅练习功能开放）
			          	</label>
			          	<label class="radio inline">
			          		<input type="radio" class="input-text" name="args[basicexam][model]" value="2"<?php if($this->tpl_var['basic']['basicexam']['model'] == 2){ ?> checked<?php } ?>/> 考试模式（仅正式考试开放）
			          	</label>
					</div>
				</div>
				<div class="control-group">
					<h5 for="basicexam_auto" class="control-label">正式考试试题排序：</h5>
					<div class="controls">
						<label class="radio inline">
				          	<input type="radio" class="input-text" name="args[basicexam][changesequence]" value="0"<?php if($this->tpl_var['basic']['basicexam']['changesequence'] == 0){ ?> checked<?php } ?>/> 不打乱试题排序
			          	</label>
			          	<label class="radio inline">
			          		<input type="radio" class="input-text" name="args[basicexam][changesequence]" value="1"<?php if($this->tpl_var['basic']['basicexam']['changesequence'] == 1){ ?> checked<?php } ?>/> 打乱试题排序
			          	</label>
					</div>
				</div>
				<div class="control-group">
					<h5 for="basicexam_auto" class="control-label">绑定模拟考试试卷：</h5>
					<div class="controls">
						<textarea id="basicexam_auto" name="args[basicexam][auto]" needle="needle" msg="您必须填写至少一个试卷"><?php echo $this->tpl_var['basic']['basicexam']['auto']; ?></textarea>
						<div style="padding-top: 15px;">
							<blockquote class="text-info">请在试卷管理处查看试卷ID，将数字ID填写在这里，多个请用英文逗号（,）隔开。留空或填0时将无法进行该项考试。</blockquote>
						</div>
					</div>
				</div>
				<div class="control-group">
					<h5 for="basicexam_autotemplate" class="control-label">模拟考试模板：</h5>
					<div class="controls">
						<select id="basicexam_autotemplate" name="args[basicexam][autotemplate]">
							<?php $tid = 0;
 foreach($this->tpl_var['tpls']['ep'] as $key => $tpl){ 
 $tid++; ?>
			            	<option value="<?php echo $tpl; ?>"<?php if($this->tpl_var['basic']['basicexam']['autotemplate'] == $tpl){ ?> selected<?php } ?>><?php echo $tpl; ?></option>
			            	<?php } ?>
		            	</select>
					</div>
				</div>
				<div class="control-group">
					<h5 for="basicexam_self" class="control-label">绑定正式考试试卷：</h5>
					<div class="controls">
						<textarea id="basicexam_self" name="args[basicexam][self]" needle="needle" msg="您必须填写至少一个试卷"><?php echo $this->tpl_var['basic']['basicexam']['self']; ?></textarea>
						<div style="padding-top: 15px;">
							<blockquote class="text-info">请在试卷管理处查看试卷ID，将数字ID填写在这里，多个请用英文逗号（,）隔开。留空或填0时将无法进行该项考试</blockquote>
						</div>

					</div>
				</div>
				<div class="control-group">
					<h5 for="basicexam_selftemplate" class="control-label">正式考试试卷模板：</h5>
					<div class="controls">
						<select id="basicexam_selftemplate" name="args[basicexam][selftemplate]">
			            	<?php $tid = 0;
 foreach($this->tpl_var['tpls']['pp'] as $key => $tpl){ 
 $tid++; ?>
			            	<option value="<?php echo $tpl; ?>"<?php if($this->tpl_var['basic']['basicexam']['selftemplate'] == $tpl){ ?> selected<?php } ?>><?php echo $tpl; ?></option>
			            	<?php } ?>
			            </select>
					</div>
				</div>
				<div class="control-group">
					<h5 class="control-label">正式考试开启时间：</h5>
					<div class="controls">
						<input name="args[basicexam][opentime][start]" type="text" value="<?php if($this->tpl_var['basic']['basicexam']['opentime']['start']){ ?><?php echo date('Y-m-d H:i:s',$this->tpl_var['basic']['basicexam']['opentime']['start']); ?><?php } else { ?>0<?php } ?>" needle="needle" msg="您必须输入一个开启时间起点" /> - <input name="args[basicexam][opentime][end]" type="text" value="<?php if($this->tpl_var['basic']['basicexam']['opentime']['end']){ ?><?php echo date('Y-m-d H:i:s',$this->tpl_var['basic']['basicexam']['opentime']['end']); ?><?php } else { ?>0<?php } ?>" needle="needle" msg="您必须输入一个开启时间终点" />
						<div style="padding-top: 15px;">
							<blockquote class="text-info">开始结束时间均需填写，格式为2014-05-01 08:00:00，不限制开启时间请任意一项填写0。如果设置的结束时间减去5分钟比考生交卷时间要早，则系统按照结束时间减去5分钟收卷。</blockquote>
						</div>

					</div>
				</div>
				<div class="control-group">
					<h5 class="control-label">正式考试抽卷规则：</h5>
					<div class="controls">
						<label class="radio inline">
			          		<input type="radio" class="input-text" name="args[basicexam][selectrule]" value="1"<?php if($this->tpl_var['basic']['basicexam']['selectrule']){ ?> checked<?php } ?>/> 系统随机抽卷
			          	</label>
			          	<label class="checkbox inline">
			          		<input type="radio" class="input-text" name="args[basicexam][selectrule]" value="0"<?php if(!$this->tpl_var['basic']['basicexam']['selectrule']){ ?> checked<?php } ?>/> 用户手动选卷
			          	</label>
			          	<div style="padding-top: 15px;">
							<blockquote class="text-info">系统随机抽卷时，用户无法看到试卷列表，系统会随机挑选试卷供用户考试。手选试卷时，系统列出试卷列表供用户选择进行考试。</blockquote>
						</div>
						
					</div>
				</div>
				<div class="control-group">
					<h5 class="control-label">正式考试限考次数：</h5>
					<div class="controls">
						<input name="args[basicexam][examnumber]" type="text" value="<?php if($this->tpl_var['basic']['basicexam']['examnumber']){ ?><?php echo $this->tpl_var['basic']['basicexam']['examnumber']; ?><?php } else { ?>0<?php } ?>" needle="needle" msg="您必须输入考试次数" />
						
						<div style="padding-top: 15px;">
							<blockquote class="text-info">不限制次数请填写0，当您选择抽卷规则为系统随机抽卷时，限考次数为所有试卷限考次数，当您选择抽卷规则为用户自选时，限考次数为每套试卷限考次数。即如果设置限考次数为x，当随机抽卷时，用户一共可以考试x次；手选试卷时，用户每套试卷可考试x次。</blockquote>
						</div>

					</div>
				</div>
				<div class="submit">
					<div class="controls">
						<button class="btn btn-success" type="submit">提交</button>
						<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						<input type="hidden" name="setexamrange" value="1"/>
						<input type="hidden" name="basicid" value="<?php echo $this->tpl_var['basic']['basicid']; ?>"/>
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