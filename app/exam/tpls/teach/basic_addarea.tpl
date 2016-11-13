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
				<li><a href="index.php?{x2;$_app}-teach-basic-area">班级管理</a> <span class="divider">/</span></li>
				<li class="active">添加班级</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">添加班级</a>
				</li>
				<li class="dropdown pull-right">
					<a href="index.php?exam-teach-basic-area&page={x2;$page}{x2;$u}">班级设置</a>
				</li>
			</ul>
	        <form action="index.php?exam-teach-basic-addarea" method="post" class="form-horizontal">
				<fieldset>
				<div class="control-group">
					<label for="area" class="control-label">班级名称：</label>
					<div class="controls">
						<input name="args[area]" id="area" type="text" value="" needle="needle" msg="您必须输入一个班级名称" />
					</div>
				</div>
				<div class="control-group">
					<label for="areacode" class="control-label">班级唯一码：</label>
					<div class="controls">
						<input name="args[areacode]" id="areacode" type="text" value="" needle="needle" msg="您必须输入班级唯一：，且不能与原有班级重复" />
					</div>
				</div>
				<div class="control-group">
				  	<div class="controls">
					  	<button class="btn btn-success" type="submit">提交</button>
						<input type="hidden" name="insertarea" value="1"/>
						<input type="hidden" name="page" value="{x2;$page}"/>
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