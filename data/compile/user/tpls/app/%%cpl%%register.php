<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="row-fluid">
	<div class="container-fluid logcontent">
	<div class='span3'></div>
		<div class="logbox exambox span6">
			<form class="form-horizontal logform" method="post" action="index.php?user-app-register">
				<fieldset>
					<legend class='text-success'>注册用户</legend>
					
					<div class="logcontrol">
						<div class="control-group">
							<label class="control-label" for="inputEmail">用户名：</label>
							<div class="controls">
								<input class="input-xlarge" type="text" type="text" name="args[username]" datatype="userName" needle="needle" placeholder="请输入用户名" msg="请输入用户名"/><span></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">真实姓名：</label>
							<div class="controls">
								<input class="input-xlarge" type="text" type="text" name="args[usertruename]" datatype="userName" needle="needle" placeholder="请输入真实姓名" msg="请输入真实姓名"/><span></span>
							</div>
						</div>
						<div class="control-group">
							<label for="basicareaid" class="control-label">所在班级</label>
							<div class="controls">
								<select id="basicareaid" name="args[areaid]" needle="needle" msg="您必须选择班级" placeholder="您必须选择班级">
								<option value="">选择班级</option>
								<?php $aid = 0;
 foreach($this->tpl_var['areas'] as $key => $area){ 
 $aid++; ?>
								<option value="<?php echo $area['areaid']; ?>"><?php echo $area['area']; ?></option>
								<?php } ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">邮箱：</label>
							<div class="controls">
								<input class="input-xlarge" type="text" name="args[useremail]" datatype="email" needle="needle" placeholder="请你输入邮箱" msg="请你输入邮箱"/><span></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">密码：</label>
							<div class="controls">
								<input class="input-xlarge" type="password" id="inputPassword" name="args[userpassword]" datatype="password" needle="needle" placeholder="请你输入密码" msg="请你输入密码"/><span></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">重复密码：</label>
							<div class="controls">
								<input class="input-xlarge" type="password" id="inputPassword2" equ="inputPassword" needle="needle" datatype="password" placeholder="重复密码" msg="重复密码"/><span></span>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button class="btn btn-success logbtn" type="submit">立即注册</button>
								<input type="hidden" value="1" name="userregister"/>
							</div>
						</div>
						
					</div>
				</fieldset>
			</form>
		</div>
		<div class="logbotm"></div>
	</div>
</div>
<?php $this->_compileInclude('foot'); ?>
</body>
</html>