    if (window.attachEvent) {
        observe = function (element, event, handler) {
            element.attachEvent('on'+event, handler);
        };
    }
    else {
        observe = function (element, event, handler) {
            element.addEventListener(event, handler, false);
        };
    }
    function init () {
        var messageInThread = document.getElementById('messageInThread');
        function resize () {
            messageInThread.style.height = 'auto';
            messageInThread.style.height = messageInThread.scrollHeight+'px';
        }
        /* 0-timeout to get the already changed messageInThread */
        function delayedResize () {
            window.setTimeout(resize, 0);
        }
        observe(messageInThread, 'change',  resize);
        observe(messageInThread, 'cut',     delayedResize);
        observe(messageInThread, 'paste',   delayedResize);
        observe(messageInThread, 'drop',    delayedResize);
        observe(messageInThread, 'keydown', delayedResize);

        messageInThread.focus();
        messageInThread.select();
        resize();
    }