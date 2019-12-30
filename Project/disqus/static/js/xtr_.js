	/*
		Profile Image View

		This below code will move to some were else....not decided
	*/

	let profileImage = $('div.editable_modal-profile'), inputFile = $('#file'), img;
		
	profileImage.prepend('');
	img = $('#uploadImg');
	$('#upload').on('click',() => {
		img.animate({opacity: 0}, 300);
		inputFile.click();
	});
	inputFile.on('change', (e) => {
		profileImage.find('label').html( inputFile.val() );
		
		let i = 0;
		for(i; i < e.originalEvent.srcElement.files.length; i++) {
			let file = e.originalEvent.srcElement.files[i], 
			reader = new FileReader();
			reader.onloadend = () => {
				img.attr('src', reader.result).animate({opacity: 1}, 700);
			}
			reader.readAsDataURL(file);
			img.removeClass('hidden');
		}
	});

	/*
		End of Image View
	*/