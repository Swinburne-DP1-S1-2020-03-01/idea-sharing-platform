describe("DOM TESTS:***************", function() { 
    describe("Loading the HTML", function() {
            beforeAll(function(done) {
                $.get("../../Client/register.html",
                    function(html) {
                        var tempDom   = $('#fixture').append($.parseHTML(html, null, true)),
                        content   = tempDom.find('#register-form');
                        jasmine.getFixtures().set( content.html() );
                        done();
                });
            })
            
            it("check if the form has been loaded properly", function() {
                expect("#register-form").toExist();
            })

            it("check empty username", function() {
                $("#username").val("");
                expect(checkUsername()).toBe(false);
            })

            it ("Check valid username", function() {
                $('#username').val("Jenny Chan");
                expect(checkUsername()).toBe(true);
            });
            
            it ("Check empty email", function() {                
                $("#email").val("");
                expect(checkEmail()).toBe(false);               
            });

            it ("Check invalid email", function() {
                $('#email').val("invalid.email");
                expect(checkEmail()).toBe(false);
            });

            it ("Check invalid email", function() {
                $('#email').val("Jenny");
                expect(checkEmail()).toBe(false);
            });

            it ("Check valid email", function() {
                $('#email').val("1001112@student.swin.edu.au");
                expect(checkEmail()).toBe(true);
            });

            it ("Check empty password", function() {                
                $("#pwd").val("");
                expect(checkPassword()).toBe(false);               
            });

            it ("Check password too short", function() {
                $("#pwd").val("jus#A1");
                expect(checkPassword()).toBe(false);
            })
            it ("Check password not including uppercase", function() {
                $("#pwd").val("jus#a1aaa111");
                expect(checkPassword()).toBe(false);
            })

            it ("Check password not including digits", function() {
                $("#pwd").val("AaaaA_AAAA");
                expect(checkPassword()).toBe(false);
            })

            it ("Check password not including symbols", function() {
                $("#pwd").val("XYZSSaaaaaa1");
                expect(checkPassword()).toBe(false);
            })

            it ("Check password valid", function() {
                $("#pwd").val("XYZSSaaaaaa1#");
                expect(checkPassword()).toBe(true)
            })
    })
});