/*
describe('HideButtonFeature',function(){

	it('should be able to check if the button is clicked', function(){
		//Function that is supposed to be executed when button is clicked to check if button is clicked or not
		$("#hideButtonId").click(function(){
			$(this).data('clicked', true);
		});

		//Checking if a button is clicked
		expect($("#hideButtonId").data('clicked')).toBeTrue();
	});

	it('should be able to make sure the page is refreshed', function(){
		//Using navigation timing API to make sure page is refreshed
		expect(performance.navigation.type).toBe(1);
	});

	it('should be able to test if "published"/"not published" is displayed', function(){
		//The word publish/not published should be defined
		expect(draftMessage).toBeDefined();
		//They should be displayed on the page
		expect(document.documentElement.textContent || document.documentElement.innerText).indexOf(draftMessage) > -1;
		//They should be displayed Published / Not Published accordingly
		if(article.isDraft){
			expect(draftMessage).toMatch("Not Published");
		} else {
			expect(draftMessage).toMatch("Published");
		}
	});

	it('should be able to test if "hide"/"publish" button displays the correct text', function(){
		//The text of the button should be displayed accordingly
		if(article.isDraft){
			expect(hideButton.innerText).toMatch("Publish");
		} else {
			expect(hideButton.innerText).toMatch("Hide");
		}
	});
});*/

describe('Check password and username details on the edit profile page', function(){
	var EditProfile = require('./Scripts/edit-profile');
	var editProfile;

	beforeEach(function() {
		editProfile = new EditProfile();
	});

	it('Check if the characters in the username are correct', function(){
		var username = 'JackIsTest123';

		var result = editProfile.checkUsername(username);

		expect(result).toBe(true);
	});

	it('Check if username is empty', function(){
		var username = '';

		var result = editProfile.checkUsername(username);

		expect(result).toBe(false);
	});

	it('Check if the characters in the password are correct', function(){
		var password = 'JackIsTest123#';

		var result = editProfile.checkPassword(password);

		expect(result).toBe(true);
	});

	it('Check if the characters in the password are incorrect', function(){
		var password = 'JackIsTest';

		var result = editProfile.checkPassword(password);

		expect(result).toBe(false);
	});

	it('Check to see if password and confirm user are correct', function(){
		var password = 'JackIsTest123';
		var confirmedPassword = 'JackIsTest123';

		var result = editProfile.checkConfirmedPassword(password, confirmedPassword);

		expect(result).toBe(true);
	});

	it('Check to see if password and confirm user are incorrect', function(){
		var password = 'JackIsTest123#';
		var confirmedPassword = 'JackIsTestDifferent#';

		var result = editProfile.checkConfirmedPassword(password, confirmedPassword);

		expect(result).toBe(false);
	});
});


