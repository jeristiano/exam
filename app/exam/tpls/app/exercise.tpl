{x2;include:header}
<body>
{x2;include:nav}
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="exambox" id="datacontent">
			<div class="examform">
				<ul class="breadcrumb">
					<li>
						<span class="icon-home"></span> <a href="index.php?exam">考场选择</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="index.php?exam-app-basics">{x2;$data['currentbasic']['basic']}</a> <span class="divider">/</span>
					</li>
					<li class="active">
						强化训练
					</li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#" data-toggle="tab">强化训练</a>
					</li>
				</ul>
            	<ul class="unstyled">
                	<li><b>1、</b>点击考试名称按钮进入答题界面，考试开始计时。</li>
                	<li><b>2、</b>在随机考试过程中，您可以通过顶部的考试时间来掌握自己的做题时间。</li>
                	<li><b>3、</b>提交试卷后，可以通过“查看答案和解析”功能进行总结学习。</li>
                	<li><b>4、</b>系统自动记录模拟考试的考试记录，学员考试结束后可以进入“答题记录”功能进行查看。</li>
                	<li>&nbsp;</li>
                </ul>
                <blockquote>
					<p>
						配卷规则
					</p>
				</blockquote>
				<form action="index.php?exam-app-exercise" id="exer" method="post" style="padding-left:40px;">
                	<ol class="unstyled">
                    	<li>
                        	<span class="red">*</span>
                            <span>章：
                            	<select autocomplete="off" id="thesectionid" name="args[sectionid]" class="combox input-medium" ref="theknowsid" refUrl="index.php?exam-app-index-ajax-getknowsbysectionid&sectionid={value}" more="questionnumbers" callback="getSectionContent">
                            		<option value="0">请选择章节</option>
                            		{x2;tree:$sections,section,sid}
                            		<option value="{x2;v:section['sectionid']}">{x2;v:section['section']}</option>
                            		{x2;endtree}
                            	</select>
                            </span>
                            <span>知识点：
                            	<select autocomplete="off" name="args[knowsid]" id="theknowsid" class="combox input-medium" ref="questionnumbers" refUrl="index.php?exam-app-exercise-ajax-getQuestionNumber&sectionid={tmp}&knowsid={value}" tmp="thesectionid">
                            		<option value="0">请先选择知识点</option>
                            	</select>
                            </span>
                            <span id="section_error" class="red font_12 main_left0">请选择章节</span>
                        </li>
                    	<li>
                        	<span class="red">*</span>
                            <span>试卷名称：<input id="exam_name" type="text" name="args[title]" class="input-mini"/></span><span style="font-size:12px;"> 请填适合在答题记录中查找的试卷名称</span>
                            <span id="exam_name_error" class="red font_12 main_left0">请填写试卷名称</span>
                        </li>
                    	<li>
                            <span class="red">*</span>
                            <span>做题时间：<input id="exam_time" type="text" name="args[time]" class="input-mini" value='60'/> 分钟，</span><span style="font-size:12px;"> 请填写本题练习的时长</span>
                            <span id="exam_time_error" class="red font_12 main_left0">请填写做题时间</span>
                        </li>
                    	<li>
	                        <span class="red">*</span>
	                        <span>题&nbsp;&nbsp;&nbsp;&nbsp;型：如果您不希望做某种题型，请在选题数值框内填 0 </span>
	                        <span id="question_count_error" class="red font_12 main_left0"> 请至少选择一道题</span>
                        </li>
                    </ol>
                    <div>
	                    <div class="span1">
                		</div>
                		<div class="span11">
		                    <ol id="questionnumbers">
		                        {x2;tree:$questype,quest,qid}
		                        <li class="text_in">
		                        	{x2;v:quest['questype']}（共{x2;$numbers[v:quest['questid']]}题），选 <input id="question_{x2;v:quest}" type="text" class="input-mini" name="args[number][{x2;v:quest}]" onChange="javascript:check_num(this);" onBlur="" rel="{x2;$numbers[v:quest]}"/> 题
		                        	<span id="question_{x2;v:quest['questid']}_error" class="red font_12 main_left0">选择的题数不能超过{x2;$numbers[v:quest]}</span>
		                        </li>
		                    	{x2;endtree}
		                    </ol>
		                    <div id="begin_exer">
		                    	<input type="hidden" name="setExecriseConfig" value="1" />
		                    	<button onclick="javascript:return check_form();" type="submit" class="btn btn-primary">开始测试</button>
		                    </div>
	                    </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function common(){
	var getSectionContent = function(data){
		var obj = '#'+data.attr('more');
		$.get('index.php?exam-app-exercise-ajax-getQuestionNumber&sectionid='+data.val()+'&rand='+Math.random(),function(d){$(obj).html(d);});
	}
	var combox = function(){
		$(".combox").bind("change",function(){
			if($(this).attr("ref") && $(this).attr("ref") != ""){
				if($(this).attr("refUrl") != ""){
					var url = $(this).attr("refUrl").replace(/{value}/,$(this).val());
					var t = $(this).attr('tmp');
					url = url.replace(/{tmp}/,$('#'+t).val());
					var obj = '#'+$(this).attr("ref");
					$.get(url+'&rand='+Math.random(),function(d){$(obj).html(d);});
					if($(this).attr("callback") && $(this).attr("callback") != "")
					eval($(this).attr("callback"))($(this));
				}
			}
		})
	}
	combox();
}
$(document).ready(function(){
	common();
	$("#thesectionid").change(function(){
		$('#section_error').hide();
	});
	$("#exam_name").change(function(){
		$('#exam_name_error').hide();
	});
	$("#exam_time").change(function(){
		$('#exam_time_error').hide();
	});
});
function check_form(){
	var check = true;
	var section = $("#thesectionid").val();
	if ( section == 0 ){
		$('#section_error').show();
		check = false;
	}
	var exam_name = $("#exam_name").val();
	if ( exam_name == "" ){
		$('#exam_name_error').show();
		check = false;
	}
	var exam_time = $("#exam_time").val();
	if ( isNaN(exam_time) || exam_time== 0 ){
		$('#exam_time_error').show();
		check = false;
	}
	var arr = 0;
	$("#questionnumbers").children('li').each(function(){
		var max = $(this).children('input').attr('rel');
		var id = $(this).children('input').attr('id')
		var num = $(this).children('input').val();
		num = (isNaN(num) || num=="") ? 0 : num;
		arr += Number(num);
		if(Number(num) > Number(max)){
			$("#"+id+"_error").show();
			check = false;
			return;
		}
	});
	if( arr == 0 ){
		$("#question_count_error").show();
		check = false;
	}
	return check;
}

function check_num(obj){
	var max = $(obj).attr('rel');
	var id = $(obj).attr('id');
	var num = $(obj).val();
	num = (isNaN(num) || num=="") ? 0 : num;
	if(Number(num) > 0){
		$("#question_count_error").hide();
	}
	if(Number(num) > Number(max)){
		$("#"+id+"_error").show();
		return false;
	}else{
		$("#"+id+"_error").hide();
		return true;
	}
}
</script>
{x2;include:foot}
</body>
</html>