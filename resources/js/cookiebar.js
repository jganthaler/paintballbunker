(function (window) {
    'use strict';

    if (!!window.cookieBar) {
        return window.cookieBar;
    }

    /* global var definition */
    var document = window.document;
    var supportsTextContent = 'textContent' in document.body;

    var cookieName = 'cookieBar';
    var cookieValue = '1';

    var cookiebarId = 'cookiebar';
    var cookiebarButtonId = 'cookiebar-button';

    var languages = {
        'de': {
            'text': 'Durch die Nutzung dieser Internetseite stimmen Sie der Nutzung von Cookies zu. Informationen zu Cookies und ihrer Deaktivierung finden Sie in unserer ###textLink###.',
            'textLink': 'Datenschutz-Erklärung',
            'textButton': 'Ok'
        },
        'it': {
            'text': "Utilizzando il nostro sito Web, l'utente accetta l'uso dei cookie. Informazioni sui cookie e sulla loro disattivazione si possono trovare nella nostra ###textLink###.",
            'textLink': 'politica sulla privacy',
            'textButton': 'Ok'
        },
        'en': {
            'text': 'By using our website, you agree to the use of cookies. Information about cookies and their deactivation you can find in our ###textLink###.',
            'textLink': 'privacy policy',
            'textButton': 'Ok'
        }
    };

    //default language init
    var lang = languages['en'];

    var cookieBar = (function () {

        function showCookieBar(prefLang, infoLink) {


            _showCookieBar(prefLang, infoLink);

        }

        function _showCookieBar(prefLang, infoLink) {

            if (_isShowCookieBar()) {

                lang = languages[prefLang];

                //reset all
                _removeCookieBar();

                //create bar
                var cookieBarElement = _createElement('div', null, 'cookiebar', cookiebarId);

                //add text to bar
                cookieBarElement.appendChild(_createElement('div', lang['text'], 'cookiebar-text', null, null, true));

                //replace ###textLink## with Link
                var textLink = _createElement('a', lang['textLink'], 'cookiebar-link', null, infoLink);
                cookieBarElement.innerHTML = cookieBarElement.innerHTML.replace("###textLink###", textLink.outerHTML);

                cookieBarElement.appendChild(_createElement('span', lang['textButton'], 'cookiebar-button', cookiebarButtonId));

                //add bar to HTML
                var fragment = document.createDocumentFragment();
                fragment.appendChild(cookieBarElement);
                document.body.appendChild(fragment.cloneNode(true));

                document.getElementById(cookiebarButtonId).addEventListener('click', function (event) {
                    _setCookie();
                });


                return cookieBarElement;
            } else {
                //cookies already accepted
                activateCookies();
            }
        }

        function _setInnerText(element, text) {
            if (supportsTextContent) {
                element.textContent = text;
            } else {
                element.innerText = text;
            }
        }

        function _setInnerHTML(element, text) {
            element.innerHTML = text;
        }

        function _createElement(type, text, className, id, href, isHTML) {

            var element = document.createElement(type);
            if (id != null)
                element.id = id;
            if (className != null)
                element.className = className;
            if (text != null && isHTML) {
                _setInnerHTML(element, text);
            }
            else if (text != null) {
                _setInnerText(element, text);
            }
            if (href != null && type === 'a') {
                element.href = href;
                element.target = '_blank';
            }
            return element;
        }


        function _removeCookieBar() {
            var cookieBarElement = document.getElementById(cookiebarId);
            if (cookieBarElement != null) {
                cookieBarElement.parentNode.removeChild(cookieBarElement);
            }
        }

        function _replace(newNode, referenceNode) {
            referenceNode.parentNode.replaceChild(newNode, referenceNode);
        }

        function _insertAfter(newNode, referenceNode) {
            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
        }

        function _hasClass(element, className) {
            return element.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(element.className);
        }

        var buffer = "";

        function scriptListener(scriptTag, callback, parent) {
            scriptTag.onreadystatechange = scriptTag.onload = function () {
                var state = scriptTag.readyState;
                if (callback != null && (!state || /loaded|complete/.test(state))) {
                    callback(parent);
                }
            };
        }

        function insert(parent) {
            if (buffer !== "")
                parent.insertAdjacentHTML('beforeend', buffer);
            buffer = "";

            checkNextScript();
        }


        var documentWrite = document.write, documentWriteln = document.writeln;
        var scripts = document.getElementsByTagName("script");
        var i = -1;

        function checkNextScript() {
            i++;
            if (scripts != null && !scripts[i]) {
                document.write = documentWrite;
                document.writeln = documentWriteln;
                return true;
            }

            var script = scripts[i];
            if (script.type === "text/plain" && _hasClass(script, "_cookie_accept")) {
                var dynamicScript = document.createElement("script");
                dynamicScript.type = "text/javascript";

                if (script.src) {

                    var parent = script.parentNode;
                    var next = script.nextElementSibling;
                    if (!next) next = null;

                    dynamicScript.async = true;
                    dynamicScript.src = scripts[i].src;
                    if (dynamicScript.src.indexOf('?') === -1)
                        conCat = "?";
                    else
                        conCat = "&";

                    dynamicScript.src += (conCat + "_=" + Math.floor(Date.now()) + Math.floor(Math.random() * 1000));

                    parent.removeChild(script);

                    //console.log("insertBefore Parent",parent,next);
                    parent.insertBefore(dynamicScript, next);

                    scriptListener(dynamicScript, insert, parent);
                }
                else {
                    dynamicScript.text = script.text;
                    _replace(dynamicScript, script);
                    checkNextScript();
                }
            } else {
                checkNextScript();
            }
        }

        function activateCookies() {


            document.write = function (content) {
                buffer += content;
            };
            document.writeln = function (content) {
                buffer += content.concat("\n");
            };

            checkNextScript();


            //iframes
            var iframes = document.getElementsByTagName("iframe");
            for (var i = 0; i < iframes.length; i++) {
                if (_hasClass(iframes[i], "_cookie_accept") && iframes[i].getAttribute("cookiessrc") != null) {
                    iframes[i].setAttribute("src", iframes[i].getAttribute("cookiessrc"));
                    iframes[i].removeAttribute("cookiessrc");
                }
            }

            //imgs
            var imgs = document.getElementsByTagName("img");
            for (var i = 0; i < imgs.length; i++) {
                if (_hasClass(imgs[i], "_cookie_accept") && imgs[i].getAttribute("cookiessrc") != null) {
                    imgs[i].setAttribute("src", imgs[i].getAttribute("cookiessrc"));
                    imgs[i].removeAttribute("cookiessrc");
                }
            }
        }

        function _setCookie() {

            activateCookies();
            _removeCookieBar();
            var expireDate = new Date();
            expireDate.setFullYear(expireDate.getFullYear() + 1); //12 months
            document.cookie = cookieName + '=' + cookieValue + '; path=/; expires=' + expireDate.toGMTString();

            return false;
        }

        function _isShowCookieBar() {
            return !document.cookie.match(new RegExp(cookieName + '=([^;]+)'));
        }

        var exports = {};
        exports.showCookieBar = showCookieBar;
        return exports;
    })();

    window.cookieBar = cookieBar;
    return cookieBar;
})(this);