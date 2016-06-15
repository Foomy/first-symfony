;User.Form = {

	init: function () {
		this.initCancelBtn();
	},

	initCancelBtn: function () {
		$('#user_cancel').on('click', function () {
			window.location.href = $('#back-url').data('url');
		});
	}

};