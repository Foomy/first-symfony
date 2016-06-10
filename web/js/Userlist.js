;var Userlist = {

	init: function () {
		this.initDeleteButtons();
	},

	initDeleteButtons: function () {
		$('#userlist .btn-edit').on('click', function () {
			var uid = $(this).data('uid');
			var path = $(this).data('path');
			Userlist.handleDeleteButtonClick(uid, path);
		});
	},

	handleDeleteButtonClick: function (uid, path) {
		$.ajax({
			url: path,
			type: 'post',
			data: {
				userId: uid
			},
			dataType: 'json',
			success: function (response) {
				
			}
		})
	}

};

$(document).ready(function () {
	Userlist.init();
});