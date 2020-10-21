<!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>

	<select name="provinsi" id="provinsi">
	</select>

	<select name="kabupaten" id="kabupaten">
	</select>

	<select name="kelurahan" id="kelurahan">
	</select>

</body>
</html>


<script>

	$(function () {

		getProvinsi();


		$('#provinsi').change(function (e) {
			 var idProvinsi = $(this).val();
			 getKabupaten(idProvinsi);
		 });

		 $('#Kabupaten').change(function (e) {
			 var idKabupaten = $(this).val();
			 getKelurahan(idKabupaten);
		 });

		function getProvinsi() {
			$.ajax({
				type: "GET",
				url: "api.test/getProvinsi",
				success: function (response) {
					var data = JSON.parse(response.data)
					data.forEach(element => {
						var html = `<option value="${element.idProvinsi}">${element.nameProvinsi}</option>`;
						$('#provinsi').append(html);
					});
				}
			});
		 }

		function getKabupaten(idProvinsi) {
			$.ajax({
				type: "GET",
				data: {idProvinsi: idProvinsi},
				url: "api.test/getKabupaten",
				success: function (response) {
					var data = JSON.parse(response.data)
					data.forEach(element => {
						var html = `<option value="${element.idKabupaten}">${element.nameKaidKabupaten}</option>`;
						$('#kabupaten').append(html);
					});
				}
			});
		}

		function getKelurahan(idKabupaten) {
			$.ajax({
				type: "GET",
				data: {idKabupaten: idKabupaten},
				url: "api.test/getKelurahan",
				success: function (response) {
					var data = JSON.parse(response.data)
					data.forEach(element => {
						var html = `<option value="${element.idKelurahan}">${element.nameKaidKelurahan}</option>`;
						$('#kelurahan').append(html);
					});
				}
			});
		}
	});

</script>