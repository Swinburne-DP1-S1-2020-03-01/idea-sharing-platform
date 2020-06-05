jasmine.getFixtures().fixturesPath = 'fixtures/';

// fit("See fixtures",function(){
//     setFixtures("<h1 id='ahoy'>Hello World</h1>");
//     expect($("#ahoy")).toExist();
//     alert($("html").html());
// });

describe("NewInvestmentView", function() {
    var view;
    beforeEach(function() {
        loadFixtures('NewInvestmentView.html');
        view = new NewInvestmentView({selector: '#new-investment'});
    });

    function NewInvestmentView(params) {
        this.$el = $(params.selector);
    }
    
    NewInvestmentView.prototype = {
        $: function () {
        return this.$el.find.apply(this.$el, arguments);
        },
        getSymbolInput: function () {
        return this.$('.new-investment-stock-symbol')
        }
       };
    
    NewInvestmentView.prototype.setSymbol = function(value) {
        this.$('.new-investment-stock-symbol').val(value);
    };
    
    it("should expose a property with its DOM element", function() {
        expect(view.$el).toExist();
    });

    it("should have an empty stock symbol", function() {
        expect(view.getSymbolInput()).toHaveValue('');
    })
})

// describe("InvestmentTracker", function() {
//     beforeEach(function() {
//         loadFixtures('NewInvestmentView.html');
//         appendLoadFixtures('InvestmentListView.html');
        
//         listView = new InvestmentListView({
//             id: 'investment-list'
//         });
    
//         newView = new NewInvestmentView({
//             id: 'new-investment'
//         });
        
//         application = new InvestmentTracker({
//             listView: listView,
//             newView: newView
//         });
//     });
//     describe("when a new investment is created", function() {
//         beforeEach(function() {
//             // fill form inputs
//             newView.create();
//             });
//         it("should add the investment to the list", function() {
//             expect(listView.count()).toEqual(1);
//         });
//     });
// });