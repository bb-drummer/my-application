var expect = chai.expect;

describe('MyApplication', function() {
  it('should be a jQuery prototype function', function() {
    expect($.fn.myapplication).to.be.a('function');
  });
});
