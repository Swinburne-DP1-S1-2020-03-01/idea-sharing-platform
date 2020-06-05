// Before this test suite is run, make sure to log in as a user and this user must have exactly two articles.
//
describe("DOM TESTS:***************", function() { 
    describe("Loading the HTML", function() {
            beforeAll(function(done) {
                $.get("profile.php",
                    function(html) {
                        var tempDom   = $('#fixture').append($.parseHTML(html, null, true)),
                        content   = tempDom.find('#top-articles');
                        jasmine.getFixtures().set( content.html() );
                        done();
                });
            })
            
            it("check if the form has been loaded properly", function() {
                expect("#top-articles").toExist();
            })
            
            it("check if the number of articles have been loaded properly", function()
            {
                var numArticles = $(".article-card").length;
                expect(numArticles).toBe(2);
            })

            it("check if message is updated from 'not published' to 'published'", function() {

                expect($(".draft-message:eq(0)").text()).toBe("Not published");
                spyOnEvent($('.draft-message:eq(0)'), 'click');
                
                // click on the publish button of the first card
                $('.publish-button:eq(0)').trigger("click");

                // check if the draft message changed its text into "Published", after clicking "publish" 
                expect($(".draft-message:eq(0)").text()).toBe("Published");
                
                $('.publish-button:eq(0)').trigger("click");
                expect($(".draft-message:eq(0)").text()).toBe("Not published");
            });

            it("check if publish button is updated from 'Publish' to 'Hide'", function() {
                expect($(".publish-button:eq(0)").text()).toBe("Publish");
                $('.publish-button:eq(0)').trigger("click");
                expect($(".publish-button:eq(0)").text()).toBe("Hide");
                
                $('.publish-button:eq(0)').trigger("click");
                expect($(".publish-button:eq(0)").text()).toBe("Publish");
            });

            it("repeat the checking with second article-card: check if message is updated from 'not published' to 'published'", function() {
                expect($(".draft-message:eq(1)").text()).toBe("Not published");
                $('.publish-button:eq(1)').trigger("click");
                expect($(".draft-message:eq(1)").text()).toBe("Published");
                
                $('.publish-button:eq(1)').trigger("click");
                expect($(".draft-message:eq(1)").text()).toBe("Not published");

                // make sure clicking on the second card does not interfere the first card
                expect($(".draft-message:eq(0)").text()).toBe("Not published");
            });

    })
});