var myApp=angular.module("myApp",[]);myApp.directive("myGreatFooter",function(){return{template:"<p>&#169; 2015-"+(new Date).getFullYear()+' reading and spelling success</p><p>This site built by <a href="http://www.jimdeagen.com" target="_blank" title="Web Development and Web Craft">Jim Deagen</a></p></hr>'}});