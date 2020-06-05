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

            it("check the correct tests displayed in each card", function() {
                var innerDeleteText = $(".delete-button:eq(0)").text();
                expect(innerDeleteText).toBe("Delete");

                var innerDeleteText = $(".delete-button:eq(1)").text();
                expect(innerDeleteText).toBe("Delete");
            });

            it("check when clicking delete button on the first card", function() {
                var first_card = $('.article-card:eq(0)');
                console.log(first_card);
                
                $('.delete-button:eq(0)').trigger("click");
                var numArticles = $(".article-card").length;

                // test if the total cards reduce by 1.
                expect(numArticles).toBe(1);

                // test if the number of articles in user details is displayed correctly
                expect($('#number-articles').text()).toBe("1");

            });

            it("check when clicking delete button on the second card", function() {

                $('.delete-button:eq(0)').trigger("click");
                var numArticles = $(".article-card").length;
                expect(numArticles).toBe(0);

                // test if the number of articles in user details is displayed correctly
                expect($('#number-articles').text()).toBe("0");
            });
    })
});