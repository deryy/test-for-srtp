		<hr>
		<footer>
			<p>&copy; 1994-2015 浙江大学电视台</p>
		</footer>

	</div> <!-- /container -->


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?=base_url("static/js/jquery.min.js")?>"></script>
	<script src="<?=base_url("static/js/bootstrap.min.js")?>"></script>
	<script src="<?=base_url("static/plugins/jquery-form-validator/jquery.form-validator.js")?>"></script>
	<script>
		$.validate();
		(function (w, $) {
			var mutex = false;
			$('input[name=studentId], input[name=name], input[name=email]').on('blur', function () {
				if (mutex || $('#studentId').val() == '' || $('#name').val() == '' || $('#email').val() == '') return;
				mutex = true;
				$.get('<?=base_url("/index.php/freetime/check_exist")?>', {
				studentId : $('input[name=studentId]').val(),
				name : $('input[name=name]').val(),
				email : $('input[name=email]').val()
				}, restore, 'json');
			});
			w.setInterval(function () {
				mutex = false;
			}, 500);

			var restore = function (data) {
				if (data && data.status == 'success') {
					if (0 >= $('input[name=studentId]').val().length && typeof(data.studentId) != 'undefined')
						$('input[name=studentId]').val(data.studentId).blur();
					if (0 >= $('input[name=name]').val().length && typeof(data.name) != 'undefined')
						$('input[name=name]').val(data.name).blur();
					if (0 >= $('input[name=email]').val().length && typeof(data.email) != 'undefined')
						$('input[name=email]').val(data.email).blur();
					if (0 >= $('input[name=mobileFull]').val().length && typeof(data.mobileFull) != 'undefined')
						$('input[name=mobileFull]').val(data.mobileFull).blur();
					if (0 >= $('input[name=mobileShort]').val().length && typeof(data.mobileShort) != 'undefined')
						$('input[name=mobileShort]').val(data.mobileShort).blur();
					if (0 >= $('input[name=position]').val().length && typeof(data.position) != 'undefined')
						$('input[name=position]').val(data.position).blur();
					if (0 >= $('select[name=gender]').val() && typeof(data.gender) != 'undefined') {
						$('select[name=gender]').val(data.gender).blur();
					}
					var freeTime = parseInt(data.timeMask).toString(2);
					while(freeTime.length < 35) {
						freeTime = '0' + freeTime;
					}
					if (1 == $('select[name=ft11]').val() && freeTime[0] == 0) {
						$('select[name=ft11]').val(freeTime[0]).blur();
					}
					if (1 == $('select[name=ft12]').val() && freeTime[1] == 0) {
						$('select[name=ft12]').val(freeTime[1]).blur();
					}
					if (1 == $('select[name=ft13]').val() && freeTime[2] == 0) {
						$('select[name=ft13]').val(freeTime[2]).blur();
					}
					if (1 == $('select[name=ft14]').val() && freeTime[3] == 0) {
						$('select[name=ft14]').val(freeTime[3]).blur();
					}
					if (1 == $('select[name=ft15]').val() && freeTime[4] == 0) {
						$('select[name=ft15]').val(freeTime[4]).blur();
					}
					if (1 == $('select[name=ft21]').val() && freeTime[5] == 0) {
						$('select[name=ft21]').val(freeTime[5]).blur();
					}
					if (1 == $('select[name=ft22]').val() && freeTime[6] == 0) {
						$('select[name=ft22]').val(freeTime[6]).blur();
					}
					if (1 == $('select[name=ft23]').val() && freeTime[7] == 0) {
						$('select[name=ft23]').val(freeTime[7]).blur();
					}
					if (1 == $('select[name=ft24]').val() && freeTime[8] == 0) {
						$('select[name=ft24]').val(freeTime[8]).blur();
					}
					if (1 == $('select[name=ft25]').val() && freeTime[9] == 0) {
						$('select[name=ft25]').val(freeTime[9]).blur();
					}
					if (1 == $('select[name=ft31]').val() && freeTime[10] == 0) {
						$('select[name=ft31]').val(freeTime[10]).blur();
					}
					if (1 == $('select[name=ft32]').val() && freeTime[11] == 0) {
						$('select[name=ft32]').val(freeTime[11]).blur();
					}
					if (1 == $('select[name=ft33]').val() && freeTime[12] == 0) {
						$('select[name=ft33]').val(freeTime[12]).blur();
					}
					if (1 == $('select[name=ft34]').val() && freeTime[13] == 0) {
						$('select[name=ft34]').val(freeTime[13]).blur();
					}
					if (1 == $('select[name=ft35]').val() && freeTime[14] == 0) {
						$('select[name=ft35]').val(freeTime[14]).blur();
					}
					if (1 == $('select[name=ft41]').val() && freeTime[15] == 0) {
						$('select[name=ft41]').val(freeTime[15]).blur();
					}
					if (1 == $('select[name=ft42]').val() && freeTime[16] == 0) {
						$('select[name=ft42]').val(freeTime[16]).blur();
					}
					if (1 == $('select[name=ft43]').val() && freeTime[17] == 0) {
						$('select[name=ft43]').val(freeTime[17]).blur();
					}
					if (1 == $('select[name=ft44]').val() && freeTime[18] == 0) {
						$('select[name=ft44]').val(freeTime[18]).blur();
					}
					if (1 == $('select[name=ft45]').val() && freeTime[19] == 0) {
						$('select[name=ft45]').val(freeTime[19]).blur();
					}
					if (1 == $('select[name=ft51]').val() && freeTime[20] == 0) {
						$('select[name=ft51]').val(freeTime[20]).blur();
					}
					if (1 == $('select[name=ft52]').val() && freeTime[21] == 0) {
						$('select[name=ft52]').val(freeTime[21]).blur();
					}
					if (1 == $('select[name=ft53]').val() && freeTime[22] == 0) {
						$('select[name=ft53]').val(freeTime[22]).blur();
					}
					if (1 == $('select[name=ft54]').val() && freeTime[23] == 0) {
						$('select[name=ft54]').val(freeTime[23]).blur();
					}
					if (1 == $('select[name=ft55]').val() && freeTime[24] == 0) {
						$('select[name=ft55]').val(freeTime[24]).blur();
					}
					if (1 == $('select[name=ft61]').val() && freeTime[25] == 0) {
						$('select[name=ft61]').val(freeTime[25]).blur();
					}
					if (1 == $('select[name=ft62]').val() && freeTime[26] == 0) {
						$('select[name=ft62]').val(freeTime[26]).blur();
					}
					if (1 == $('select[name=ft63]').val() && freeTime[27] == 0) {
						$('select[name=ft63]').val(freeTime[27]).blur();
					}
					if (1 == $('select[name=ft64]').val() && freeTime[28] == 0) {
						$('select[name=ft64]').val(freeTime[28]).blur();
					}
					if (1 == $('select[name=ft65]').val() && freeTime[29] == 0) {
						$('select[name=ft65]').val(freeTime[29]).blur();
					}
					if (1 == $('select[name=ft71]').val() && freeTime[30] == 0) {
						$('select[name=ft71]').val(freeTime[30]).blur();
					}
					if (1 == $('select[name=ft72]').val() && freeTime[31] == 0) {
						$('select[name=ft72]').val(freeTime[31]).blur();
					}
					if (1 == $('select[name=ft73]').val() && freeTime[32] == 0) {
						$('select[name=ft73]').val(freeTime[32]).blur();
					}
					if (1 == $('select[name=ft74]').val() && freeTime[33] == 0) {
						$('select[name=ft74]').val(freeTime[33]).blur();
					}
					if (1 == $('select[name=ft75]').val() && freeTime[34] == 0) {
						$('select[name=ft75]').val(freeTime[34]).blur();
					}

					/*if (0 >= $('select[name=grade]').val() && typeof(data.grade) != 'undefined') {
						$('select[name=grade]').val(data.grade).blur();
					}
					if (0 >= $('select[name=choice0]').val() && typeof(data.choice0) != 'undefined') {
						$('select[name=choice0]').val(data.choice0).blur();
					}
					if (0 >= $('select[name=choice1]').val() && typeof(data.choice1) != 'undefined') {
						$('select[name=choice1]').val(data.choice1).blur();
					}*/
					if (typeof(data.guid) != 'undefined') {
						$('input[name=guid]').val(data.guid).blur();
					}
					/*var $parent;
					if (0 == $('input[name=gender]').val() && (data.gender)) {
						$('input[name=gender]').val(data.gender);
						$parent = $('input[name=gender]').parents('.input');
						$parent.find('.checked').removeClass('checked');
						$parent.find('[data-value=' + parseInt(data.gender) + ']').addClass('checked');
					}
					if (0 == $('input[name=first-chose]').val() && (data.first_chose)) {
						$('input[name=first-chose]').val(data.first_chose);
						$parent = $('input[name=first-chose]').parents('.input');
						$parent.find('.checked').removeClass('checked');
						$parent.find('[data-value=' + parseInt(data.first_chose) + ']').addClass('checked');
					}
					if (0 == $('input[name=second-chose]').val() && (data.second_chose)) {
						$('input[name=second-chose]').val(data.second_chose);
						$parent = $('input[name=second-chose]').parents('.input');
						$parent.find('.checked').removeClass('checked');
						$parent.find('[data-value=' + parseInt(data.second_chose) + ']').addClass('checked');
					}*/
				}
			};
		})(window, window.jQuery);
	</script>
</body>
</html>