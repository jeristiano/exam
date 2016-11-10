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
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-rowsquestions&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">题冒题管理</a> <span class="divider">/</span></li>
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-rowsquestions-rowsdetail&questionid=<?php echo $this->tpl_var['question']['qrid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">子试题列表</a> <span class="divider">/</span></li>
				<li class="active">添加子试题</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">添加子试题</a>
				</li>
				<li class="pull-right">
					<a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-rowsquestions-rowsdetail&questionid=<?php echo $this->tpl_var['question']['qrid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">子试题列表</a>
				</li>
			</ul>
			<form action="index.php?exam-master-rowsquestions-addchildquestion" method="post" class="form-horizontal">
				<div class="control-group">
					<label class="control-label">题型：</label>
				  	<div class="controls">
					  	<select name="args[questiontype]" class="combox" onchange="javascript:setAnswerHtml($(this).find('option:selected').attr('rel'),'rcianswerbox');">
					  		<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
					  		<option rel="<?php if($questype['questsort']){ ?>0<?php } else { ?><?php echo $questype['questchoice']; ?><?php } ?>" value="<?php echo $questype['questid']; ?>"<?php if($questype['questid'] == $this->tpl_var['question']['questiontype']){ ?> selected<?php } ?>><?php echo $questype['questype']; ?></option>
					  		<?php } ?>
					  	</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">题干：</label>
				  	<div class="controls">
				  		<textarea needle="needle" msg="您必须要填写题干" cols="72" rows="3" class="ckeditor" name="args[question]" id="rciquestion"><?php echo $this->tpl_var['question']['question']; ?></textarea>
				  		<span class="help-block">需要填空处请以()表示。</span>
					</div>
				</div>
				<div class="control-group" id="selecttext">
					<label class="control-label">备选项：</label>
				  	<div class="controls">
				  		<textarea cols="72" rows="7" class="ckeditor" name="args[questionselect]" id="rcquestionselect"><?php echo $this->tpl_var['question']['questionselect']; ?></textarea>
				  		<div class="intro">无选择项的请不要填写，如填空题。</div>
					</div>
				</div>
				<div class="control-group" id="selectnumber">
					<label class="control-label" for="questionselectnumber">备选项数量：</label>
				  	<div class="controls">
				  		<select class="combox" id="questionselectnumber" name="args[questionselectnumber]">
					  		<option value="0">0</option>
					  		<option value="2">2</option>
					  		<option value="4" selected>4</option>
					  		<option value="5">5</option>
					  		<option value="6">6</option>
					  	</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">参考答案：</label>
					<div class="controls">
						<div id="rcianswerbox_1" class="rcianswerbox">
						  	<label class="radio inline"><input type="radio" name="targs[questionanswer1]" value="A" checked>A</label>
						  	<label class="radio inline"><input type="radio" name="targs[questionanswer1]" value="B">B</label>
						  	<label class="radio inline"><input type="radio" name="targs[questionanswer1]" value="C">C</label>
						  	<label class="radio inline"><input type="radio" name="targs[questionanswer1]" value="D">D</label>
						  	<label class="radio inline"><input type="radio" name="targs[questionanswer1]" value="E">E</label>
						</div>
						<div id="rcianswerbox_2" style="display:none;" class="rcianswerbox">
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer2][]" value="A">A</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer2][]" value="B">B</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer2][]" value="C">C</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer2][]" value="D">D</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer2][]" value="E">E</label>
						</div>
						<div id="rcianswerbox_3" style="display:none;" class="rcianswerbox">
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer3][]" value="A">A</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer3][]" value="B">B</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer3][]" value="C">C</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer3][]" value="D">D</label>
						  	<label class="checkbox inline"><input type="checkbox" name="targs[questionanswer3][]" value="E">E</label>
						</div>
						<div id="rcianswerbox_4" class="rcianswerbox" style="display:none;">
						  	<label class="radio inline"><input type="radio" name="targs[questionanswer4]" value="A" checked>对</label>
						  	<label class="radio inline"><input type="radio" name="targs[questionanswer4]" value="B">错</label>
						</div>
						<div id="rcianswerbox_5" class="rcianswerbox" style="display:none;">
						  	<input type="text" name="targs[questionanswer5]" value="<?php echo $this->tpl_var['question']['questionanswer']; ?>" />
						</div>
						<div id="rcianswerbox_0" style="display:none;" class="rcianswerbox">
						  	<textarea cols="72" rows="7" class="ckeditor" id="rciquestionanswer0" name="targs[questionanswer0]"><?php echo $this->tpl_var['question']['questionanswer']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">习题解析：</label>
				  	<div class="controls">
				  		<textarea cols="72" rows="7" class="ckeditor" name="args[questiondescribe]" id="rciquestiondescribe"><?php echo $this->tpl_var['question']['questiondescribe']; ?></textarea>
					</div>
				</div>
				<div class="control-group">
				  	<div class="controls">
					  	<button class="btn btn-primary" type="submit">提交</button>
					  	<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
					  	<input type="hidden" name="args[questionparent]" value="<?php echo $this->tpl_var['question']['qrid']; ?>"/>
					  	<input type="hidden" name="insertquestion" value="1"/>
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