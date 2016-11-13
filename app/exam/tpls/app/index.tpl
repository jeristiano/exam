{x2;include:header}
<body>
{x2;include:nav}
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="exambox" id="datacontent">
			<div class="examform">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-461715" data-toggle="tab" >我的考试</a>
					</li>
					<div class="caption pull-right">
					<p class="text-center">
						<a class="btn btn-success " href="index.php?exam-app-basics-open" title="开通新考试">开通新考试</a>
					</p>
					</div>
				</ul>
				<ul class="thumbnails">
				
				</ul>	
				<ul class="thumbnails">
					{x2;tree:$basics,basic,bid}
					{x2;if:$areaid==v:basic['basicareaid']}
						<li class="span2">
							<div class="thumbnail">
							<img alt="300x200" src="{x2;if:v:basic['basicthumb']}{x2;v:basic['basicthumb']}{x2;else}app/exam/styles/image/paper.png{x2;endif}"/>
							<div class="caption">
							<p class="text-center">
							<a class="ajax btn btn-success" href="index.php?{x2;$_app}-app-index-setCurrentBasic&basicid={x2;v:basic['basicid']}" title="{x2;v:basic['basic']}">{x2;substring:v:basic['basic'],15}</a>
							</p>
							</div>
							</div>
						</li>
						{x2;if:v:bid % 6 == 0}
					</ul>
					<ul class="thumbnails">
					{x2;endif}
					{x2;endif}
					{x2;endtree}
				</ul>
			</div>
		</div>
	</div>
</div>
{x2;include:foot}
</body>
</html>