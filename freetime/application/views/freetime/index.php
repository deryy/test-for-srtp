<div class="page-header">
	<h1>填写报名表</h1>
</div>

<?php if(validation_errors()): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
		<?=validation_errors()?>
	</div>
<?php endif; ?>

<?php echo form_open('freetime/index', array('class'=>'form-horizontal', 'role'=>'form')) ?>

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
			<input type="text" class="form-control" id="studentId" name="studentId" value="<?=set_value('studentId')?>" placeholder="您的学号" data-validation="custom" data-validation-regexp="^(31[0-4]{1}0[01]{1}0[0-9]{4}|[12]{1}1[0-4]{1}[0-9]{5})$" data-validation-error-msg="输入的学号无效">
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
			<input type="text" class="form-control" id="mobileFull" name="mobileFull" value="<?=set_value('mobileFull')?>" placeholder="手机全号" data-validation="custom" data-validation-regexp="^(1[3578]{1}[0-9]{9})$" data-validation-error-msg="输入的手机全号无效">
		</div>
	</div>
	<div class="form-group">
		<label for="mobile_short" class="col-sm-2 control-label">手机短号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="mobileShort" name="mobileShort" value="<?=set_value('mobileShort')?>" placeholder="校园虚拟网短号" data-validation="number" data-validation-allowing="range[100000;999999]" data-validation-error-msg="输入的手机短号无效" data-validation-optional="true">
		</div>
	</div>
	<div class="form-group">
		<label for="major" class="col-sm-2 control-label">岗位名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="position" name="position" value="<?=set_value('position')?>" placeholder="所属岗位" data-validation="length" data-validation-length="2-20"  data-validation-error-msg="错误的岗位名称长度">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th></th>
						<th>节次</th>
						<th>周一</th>
						<th>周二</th>
						<th>周三</th>
						<th>周四</th>
						<th>周五</th>
						<th>周六</th>
						<th>周日</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="2">上午</td>
						<td>1-2节</td>
						<td>
							<select class="form-control" id="ft11" name="ft11"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft21"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft31"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft41"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft51"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft61"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft71"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
					</tr>
					<tr>
						<td>3-5节</td>
						<td>
							<select class="form-control" id="ft11" name="ft12"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft22"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft32"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft42"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft52"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft62"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft72"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
					</tr>
					<tr>
						<td rowspan="2">下午</td>
						<td>6-8节</td>
						<td>
							<select class="form-control" id="ft11" name="ft13"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft23"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft33"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft43"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft53"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft63"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft73"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
					</tr>
					<tr>
						<td>9-10节</td>
						<td>
							<select class="form-control" id="ft11" name="ft14"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft24"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft34"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft44"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft54"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft64"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft74"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
					</tr>
					<tr>
						<td>晚上</td>
						<td>11-13节</td>
						<td>
							<select class="form-control" id="ft11" name="ft15"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft25"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft35"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft45"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft55"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft65"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
						<td>
							<select class="form-control" id="ft11" name="ft75"><option value='1'>有空</option><option value='0'>没空</option></select>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<button type="submit" class="btn btn-success">戳窝提交</button>
			<button type="reset" class="btn btn-warning">清空表单</button>
		</div>
	</div>

</form>