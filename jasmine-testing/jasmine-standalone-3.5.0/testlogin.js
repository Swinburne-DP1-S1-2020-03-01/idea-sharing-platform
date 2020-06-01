describe("DOM TESTS:***************", function() { 
    describe("Loading the HTML", function() {
            beforeAll(function(done) {
                $.get("../../Client/login.html",
                    function(html) {
                        var tempDom   = $('#fixture').append($.parseHTML(html, null, true)),
                        content   = tempDom.find('#login-form');
                        jasmine.getFixtures().set( content.html() );
                        done();
                });
            })
            
            it("check if the form has been loaded properly", function() {
                expect("#login-form").toExist();
            })

            it ("Check empty email input", function() {
                $('#email').val("");
                expect(checkEmail()).toBe(false);
                //$('#login-button').trigger( "click" );
            //expect('click').toHaveBeenTriggeredOn('#login-button');
            //expect(spyEvent).toHaveBeenTriggered();

            });
            
            it ("Check valid email input", function() {
                //   spyEvent = spyOnEvent('#btnHideMessage', 'click');
                //   $('#btnHideMessage').trigger( "click" );
                    
                //   expect('click').toHaveBeenTriggeredOn('#btnHideMessage');
                //   expect(spyEvent).toHaveBeenTriggered();
                
                $("#email").val("");
                expect(checkEmail()).toBe(false);
                //$('#login-button').trigger( "click" );
                
            });

            it ("Check password empty input", function() {
                $("#pwd").val("");
                expect(checkPassword()).toBe(false);
            })

            it ("Check password valid input", function() {
                $("#pwd").val("Just_password_valid_#");
                expect(checkPassword()).toBe(true);
            })
        })
    });
