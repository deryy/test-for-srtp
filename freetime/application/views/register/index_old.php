<h2>Fill in a new registration form</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('register/index') ?>

	<label for="name">姓名</label>
	<input type="input" name="name" value="<?=set_value('name')?>" /><br />

	<label for="student_id">学号</label>
	<input type="input" name="student_id" value="<?=set_value('student_id')?>" /><br />

	<label for="gender">性别</label>
	<select name="gender">
		<option disabled="disabled">戳</option>
		<option value="1">汉纸</option>
		<option value="0">妹纸</option>
	</select><br />

	<label for="email">email</label>
	<input type="input" name="email" value="<?=set_value('email')?>" /><br />

	<label for="mobile_full">手机全号</label>
	<input type="input" name="mobile_full" value="<?=set_value('mobile_full')?>" /><br />

	<label for="mobile_short">手机短号</label>
	<input type="input" name="mobile_short" value="<?=set_value('mobile_short')?>" /><br />

	<label for="grade">入学年</label>
	<select name="grade">
		<option disabled="disabled">戳</option>
		<option value="2012">2012</option>
		<option value="2013">2013</option>
		<option value="2014">2014</option>
		<option value="2015" disabled="disabled">2015</option>
	</select><br />

	<label for="major">大类/专业</label>
	<input type="input" name="major" value="<?=set_value('major')?>" /><br />

	<label for="choice0">选项一</label>
	<select name="choice0">
		<option disabled="disabled">戳</option>
		<option value="10">程序猿</option>
		<option value="11">攻城狮</option>
		<option value="12">码农</option>
		<option value="13">码畜</option>
	</select><br />

	<label for="choice1">选项二</label>
	<select name="choice1">
		<option disabled="disabled">戳</option>
		<option value="10">程序猿</option>
		<option value="11">攻城狮</option>
		<option value="12">码农</option>
		<option value="13">码畜</option>
	</select><br />

	<label for="intro">个人简介</label>
	<textarea name="intro"><?=set_value('intro')?></textarea><br />

	<input type="submit" name="submit" value="戳窝报名" /> 

</form>
