
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
});

describe('EditButtonLeavePage', function(){

	it('Should be able to tell if a button is clicked',function(){
		//Function that is supposed to be executed when button is clicked to check if button is clicked or not
		$("#hideButtonId").click(function(){
			$(this).data('clicked', true);
		});

		//Checking if a button is clicked
		expect($("#hideButtonId").data('clicked')).toBeTrue();
	});

	
	it("Should be able to respond accordingly to the choice on the notification", function(){
		//Checking if it is able to go to the right page when the alert is clicked / not clicked
		if(confirmation){
			expect(window.location).toMatch("./profile.php");
		} else {
			//You can change this into any other file name
			expect(window.location).toMatch("edit.php");
		}
	});

	it("Should be able to check if any changes is not saved when clicking yes to leavning", function(){
		//Save article content to the variables to compare with the actual article content
		var testArticleContent = article_data.content;
		var testArticleTitle = article_data.title;

		if(confirmation){
			expect(article_data.content).toMatch(testArticleContent);
			expect(article_data.title).toMatch(testArticleTitle);
		}

	});

});


