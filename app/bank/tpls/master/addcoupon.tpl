{x2;include:header}<body>{x2;include:nav}<div class="container-fluid">	<div class="row-fluid">		<div class="span2">			{x2;include:menu}		</div>		<div class="span10" id="datacontent">			<ul class="breadcrumb">				<li><a href="index.php?{x2;$_app}-master">{x2;$apps[$_app]['appname']}</a> <span class="divider">/</span></li>				<li><a href="index.php?bank-master-coupon">代金券管理</a> <span class="divider">/</span></li>				<li class="active">添加代金券</li>			</ul>			<ul class="nav nav-tabs">				<li class="active">					<a href="#">添加代金券</a>				</li>				<li class="pull-right">					<a href="index.php?bank-master-coupon">代金券列表</a>				</li>			</ul>			<form action="index.php?bank-master-coupon-batadd" method="post" class="form-horizontal">				<fieldset>					<div class="control-group">					</div>					<div class="control-group">						<label for="createnumber" class="control-label">生成数量</label>						<div class="controls">							<input name="createnumber" id="createnumber" type="text" needle="needle" datatype="number" max="2" alt="请输入生成数量"  msg="每次生成数量最多为99个" value="10"/>							<span class="help-block">请输入生成数量</span>						</div>					</div>					<div class="control-group">						<label for="couponvalue" class="control-label">兑换分值</label>						<div class="controls">							<input type="text" id="couponvalue" needle="needle" datatype="number" min="2" max="4" msg="分值应在10-9999之间" name="couponvalue" value="100"/>							<span class="help-block">优惠券使用后将增加使用用户的相应分值</span>						</div>					</div>					<div class="control-group">						<div class="controls">							<button class="btn btn-success" type="submit">提交</button>							<input type="hidden" name="addcoupon" value="1"/>							{x2;tree:$search,arg,aid}							<input type="hidden" name="search[{x2;v:key}]" value="{x2;v:arg}"/>							{x2;endtree}						</div>					</div>				</fieldset>			</form>		</div>	</div></div></body></html>