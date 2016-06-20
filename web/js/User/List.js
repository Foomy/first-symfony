;User.List = {

	init: function () {
		this.initDeleteBtns();
		this.initActiveToggles();
	},

	initActiveToggles: function () {

	},

	handleActiveToggle: function (uid) {

	},

	initDeleteBtns: function () {
		$('#userlist .btn-delete').on('click', function () {
			var uid = $(this).data('uid');
			var path = $(this).data('path');
			User.List.handleDeleteBtnClick(uid, path);
		});
	},

	handleDeleteBtnClick: function (uid, path) {
		$.ajax({
			url: path,
			type: 'post',
			data: {
				userId: uid
			},
			dataType: 'json',
			success: function (response) {
				console.log(response.msg);
				// @todo Show message and remove table row.
				$('#user-' + uid).fadeOut();
			},
			error: function (response) {
				console.log(response.responseText);
			}
		})
	}

};
