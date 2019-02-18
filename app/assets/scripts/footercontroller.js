var myApp = angular.module("myApp", []);

myApp.directive("myGreatFooter", function() {
  var currentDate = new Date();
  var currentYear = currentDate.getFullYear();
  return {
    template:
      "<p>&#169; 2015-" +
      currentYear +
      ' reading and spelling success</p><p>This site built by <a href="http://www.jimdeagen.com" target="_blank" title="Web craft and development">Jim Deagen</a></p></hr>'
  };
});
