<div class="layui-container fly-marginTop">
		    <div class="fly-panel" pad20 style="padding-top: 5px;">
		        <div class="layui-form layui-form-pane">
		            <div class="layui-tab layui-tab-brief" lay-filter="user">
		                <ul class="layui-tab-title">
		                    <li class="layui-this">课程</li>
		                </ul>
		                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
		                    <div class="layui-tab-item layui-show">
									<div class="layui-form-item layui-form-text">
									    <label class="layui-form-label">学习目标</label>
									        <div class="layui-input-block">
									            <textarea id="goalA" placeholder="请输入内容" class="layui-textarea"><?php echo $goalA;?></textarea>
									        </div>
									</div>
									<div class="layui-form-item layui-form-text">
									    <label class="layui-form-label">学习内容</label>
									        <div class="layui-input-block">
									            <div id="editor1">
													<?php echo $contentA;?>
									            </div>
									        </div>
									</div>
									<div class="layui-form-item layui-form-text">
									    <label class="layui-form-label">学习任务</label>
									        <div class="layui-input-block">
									            <textarea id="taskA" placeholder="请输入内容" class="layui-textarea"><?php echo $taskA;?></textarea>
									        </div>
									</div>
									<div class="layui-form-item">
									    <button class="layui-btn" lay-filter="*" lay-submit>完成编辑</button>
									</div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
			