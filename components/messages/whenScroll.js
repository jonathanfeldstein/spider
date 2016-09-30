angular.module('scroll', []).directive('whenScrolled', ['$timeout', function($timeout) {
    return function(scope, elm, attr) {
        var raw = elm[0];

        elm.bind('scroll', function() {
            if (raw.scrollTop <= 100) {
                var sh = raw.scrollHeight
                scope.$apply(attr.whenScrolled).then(function() {
                    $timeout(function() {
                        raw.scrollTop = raw.scrollHeight - sh;
                    })
                });
            }
        });
    };}]).directive('scrollBottomOn', ['$timeout', function($timeout) {
    return function(scope, elm, attr) {
        scope.$watch(attr.scrollBottomOn, function(value) {
            if (value) {
                $timeout(function() {
                    elm[0].scrollTop = elm[0].scrollHeight;
                });
            }
        });
    }}]);