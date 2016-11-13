{x2;if:!$userhash}
{x2;include:header}
<body>
{x2;include:nav}
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			{x2;include:menu}
		</div>
		<div class="span10" id="datacontent">
{x2;endif}
			<ul class="breadcrumb">
				<li><a href="index.php?{x2;$_app}-teach">{x2;$apps[$_app]['appname']}</a> <span class="divider">/</span></li>
				<li><a href="index.php?{x2;$_app}-teach-questions">考试管理</a> <span class="divider">/</span></li>
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
							<input id="basic" name="args[basic]" type="text" value="{x2;$basic['basic']}" needle="needle" msg="您必须输入考试名称" />
						</div>
					</div>
					<div class="control-group">
						<label for="basicthumb" class="control-label">考试缩略图</label>
						<div class="controls">
							<div class="thumbuper pull-left">
								<div class="thumbnail">
									<a href="javascript:;" class="second label""><em class="uploadbutton" id="catimg" exectype="thumb"></em></a>
									<div class="first" id="catimg_percent"></div>
									<div class="boot"><img src="{x2;if:$basic['basicthumb']}{x2;$basic['basicthumb']}{x2;else}app/core/styles/images/noimage.gif{x2;endif}" id="catimg_view"/><input type="hidden" name="args[basicthumb]" value="{x2;$basic['basicthumb']}" id="catimg_value"/></div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<label for="basicsubjectid" class="control-label">考试科目</label>
						<div class="controls">
							<select id="basicsubjectid"   name="args[basicsubjectid]" needle="needle" msg="您必须选择考试科目">
			        		<option value="">选择科目</option>
					  		{x2;tree:$subjects,subject,sid}
					  		<option value="{x2;v:subject['subjectid']}"{x2;if:v:subject['subjectid'] == $basic['basicsubjectid']} selected{x2;endif}>{x2;v:subject['subject']}</option>
					  		{x2;endtree}
					  		</select>
						</div>
					</div>
					<div class="control-group">
						<label for="basicareaid" class="control-label">考试班级</label>
						<div class="controls">
							<select id="basicareaid" name="args[basicareaid]"  needle="needle" msg="您必须选择考试班级">
			        		<option value="">选择班级</option>
					  		{x2;tree:$areas,area,aid}
					  		<option value="{x2;v:area['areaid']}"{x2;if:v:area['areaid'] == $basic['basicareaid']} selected{x2;endif}>{x2;v:area['area']}</option>
					  		{x2;endtree}
					  		</select>
						</div>
					</div>
					<!-- <div class="control-group">
						<label class="control-label">做为免费考试</label>
						<div class="controls">
							<label class="radio inline">
								<input name="args[basicdemo]" type="radio" value="1" {x2;if:$basic['basicdemo']}checked{x2;endif}/>是
							</label>
							<label class="radio inline">
								<input name="args[basicdemo]" type="radio" value="0" {x2;if:!$basic['basicdemo']}checked{x2;endif}/>否
							</label>
							<span class="help-block">免费考试用户开通考试时不扣除积分</span>
						</div>
					</div> -->
					<!-- <div class="control-group">
						<label for="basicprice" class="control-label">价格设置</label>
						<div class="controls">
							<textarea class="input-xlarge" rows="4" name="args[basicprice]" id="basicprice">{x2;$basic['basicprice']}</textarea>
						  	<span class="help-block">请按照“时长:开通所需积分”格式填写，每行一个，时长以天为单位，免费考试此设置无效。</span>
						</div>
					</div> -->
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-success" type="submit">提交</button>
							<input type="hidden" name="basicid" value="{x2;$basic['basicid']}"/>
							<input type="hidden" name="page" value="{x2;$page}"/>
							<input type="hidden" name="modifybasic" value="1"/>
							{x2;tree:$search,arg,aid}
							<input type="hidden" name="search[{x2;v:key}]" value="{x2;v:arg}"/>
							{x2;endtree}
						</div>
					</div>
				</fieldset>
			</form>
{x2;if:!$userhash}
		</div>
	</div>
</div>

</body>
</html>
{x2;endif}