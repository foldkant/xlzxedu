<div class="layui-container fly-marginTop">
    <div class="fly-panel" pad20 style="padding-top: 5px;">
        <div class="layui-form layui-form-pane">
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title">
                    <li class="layui-this">A层</li>
                    <li>B层</li>
                    <li>C层</li>
                </ul>
                <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form-text">
                            <label class="layui-form-label">学习目标 A</label>
                            <div class="layui-input-block">
                                <textarea id="goalA" placeholder="请输入内容" class="layui-textarea"><?php echo $goalA;?></textarea>
                            </div>
                            <label class="layui-form-label">学习内容 A</label>
                            <div class="layui-input-block">
                                <div id="editor1">
                                    <?php echo $contentA;?>
                                </div>
                            </div>
                            <label class="layui-form-label">学习任务 A</label>
                            <div class="layui-input-block">
                                <textarea id="taskA" placeholder="请输入内容" class="layui-textarea"><?php echo $taskA;?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="layui-form-text">
                            <label class="layui-form-label">学习目标 B</label>
                            <div class="layui-input-block">
                                <textarea id="goalB" placeholder="请输入内容" class="layui-textarea"><?php echo $goalB;?></textarea>
                            </div>
                            <label class="layui-form-label">学习内容 B</label>
                            <div class="layui-input-block">
                                <div id="editor2">
                                    <?php echo $contentB;?>
                                </div>
                            </div>
                            <label class="layui-form-label">学习任务 B</label>
                            <div class="layui-input-block">
                                <textarea id="taskB" placeholder="请输入内容" class="layui-textarea"><?php echo $taskB;?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="layui-form-text">
                            <label class="layui-form-label">学习目标 C</label>
                            <div class="layui-input-block">
                                <textarea id="goalC" placeholder="请输入内容" class="layui-textarea"><?php echo $goalC;?></textarea>
                            </div>
                            <label class="layui-form-label">学习内容 C</label>
                            <div class="layui-input-block">
                                <div id="editor3">
                                    <?php echo $contentC;?>
                                </div>
                            </div>
                            <label class="layui-form-label">学习任务 C</label>
                            <div class="layui-input-block">
                                <textarea id="taskC" placeholder="请输入内容" class="layui-textarea"><?php echo $taskC;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-filter="*" lay-submit>完成编辑</button>
                </div>
            </div>
        </div>
    </div>
</div>