<div class="page-header">
	<h1>填写报名表</h1>
</div>

<?php if(validation_errors()): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
		<?=validation_errors()?>
	</div>
<?php endif; ?>

<?php echo form_open('register/index', array('class'=>'form-horizontal', 'role'=>'form')) ?>

	<input type="hidden" id="guid" name="guid">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" value="<?=set_value('name')?>" placeholder="尊姓大名" data-validation="length" data-validation-length="2-6"  data-validation-error-msg="错误的姓名长度">
		</div>
	</div>
	<div class="form-group">
		<label for="student_id" class="col-sm-2 control-label">学号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="student_id" name="student_id" value="<?=set_value('student_id')?>" placeholder="您的学号" data-validation="custom" data-validation-regexp="^(31[0-4]{1}0[01]{1}0[0-9]{4}|[12]{1}1[0-4]{1}[0-9]{5})$" data-validation-error-msg="输入的学号无效">
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">性别</label>
		<div class="col-sm-10">
			<select class="form-control" id="gender" name="gender">
				<option value="0">妹纸</option>
				<option value="1">汉纸</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" value="<?=set_value('email')?>" placeholder="电子邮件地址" data-validation="email" data-validation-error-msg="输入的邮箱地址无效">
		</div>
	</div>
	<div class="form-group">
		<label for="mobile_full" class="col-sm-2 control-label">手机全号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="mobile_full" name="mobile_full" value="<?=set_value('mobile_full')?>" placeholder="手机全号" data-validation="custom" data-validation-regexp="^(1[3578]{1}[0-9]{9})$" data-validation-error-msg="输入的手机全号无效">
		</div>
	</div>
	<div class="form-group">
		<label for="mobile_short" class="col-sm-2 control-label">手机短号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="mobile_short" name="mobile_short" value="<?=set_value('mobile_short')?>" placeholder="校园虚拟网短号" data-validation="number" data-validation-allowing="range[100000;999999]" data-validation-error-msg="输入的手机短号无效" data-validation-optional="true">
		</div>
	</div>
	<div class="form-group">
		<label for="grade" class="col-sm-2 control-label">入学年</label>
		<div class="col-sm-10">
			<select class="form-control" id="grade" name="grade">
				<option value="0">戳</option>
				<option value="2014">2014</option>
				<option value="2013">2013</option>
				<option value="2012">2012</option>
				<option value="2015" disabled="disabled">2015</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="major" class="col-sm-2 control-label">大类/专业</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="major" name="major" value="<?=set_value('major')?>" placeholder="所在大类或专业" data-validation="length" data-validation-length="2-20"  data-validation-error-msg="错误的大类/专业长度">
		</div>
	</div>
	<div class="form-group">
		<label for="choice0" class="col-sm-2 control-label">选项一</label>
		<div class="col-sm-10">
			<select class="form-control" id="choice0" name="choice0">
				<option value="0">戳</option>
				<option value="10">程序猿</option>
				<option value="11">攻城狮</option>
				<option value="12">码农</option>
				<option value="13">码畜</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="choice1" class="col-sm-2 control-label">选项二</label>
		<div class="col-sm-10">
			<select class="form-control" id="choice1" name="choice1">
				<option value="0">戳</option>
				<option value="10">程序猿</option>
				<option value="11">攻城狮</option>
				<option value="12">码农</option>
				<option value="13">码畜</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="intro" class="col-sm-2 control-label">个人简介</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="3" id="intro" name="intro" placeholder="这个人很懒，什么都没留下……"><?=set_value('intro')?></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<button type="submit" class="btn btn-success">戳窝报名</button>
			<button type="reset" class="btn btn-warning">清空表单</button>
		</div>
	</div>

</form>