/*
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function() {

	"use strict";

	// Methods/polyfills.

		// classList | (c) @remy | github.com/remy/polyfills | rem.mit-license.org
			!function(){function t(t){this.el=t;for(var n=t.className.replace(/^\s+|\s+$/g,"").split(/\s+/),i=0;i<n.length;i++)e.call(this,n[i])}function n(t,n,i){Object.defineProperty?Object.defineProperty(t,n,{get:i}):t.__defineGetter__(n,i)}if(!("undefined"==typeof window.Element||"classList"in document.documentElement)){var i=Array.prototype,e=i.push,s=i.splice,o=i.join;t.prototype={add:function(t){this.contains(t)||(e.call(this,t),this.el.className=this.toString())},contains:function(t){return-1!=this.el.className.indexOf(t)},item:function(t){return this[t]||null},remove:function(t){if(this.contains(t)){for(var n=0;n<this.length&&this[n]!=t;n++);s.call(this,n,1),this.el.className=this.toString()}},toString:function(){return o.call(this," ")},toggle:function(t){return this.contains(t)?this.remove(t):this.add(t),this.contains(t)}},window.DOMTokenList=t,n(Element.prototype,"classList",function(){return new t(this)})}}();

		// canUse
			window.canUse=function(p){if(!window._canUse)window._canUse=document.createElement("div");var e=window._canUse.style,up=p.charAt(0).toUpperCase()+p.slice(1);return p in e||"Moz"+up in e||"Webkit"+up in e||"O"+up in e||"ms"+up in e};

		// window.addEventListener
			(function(){if("addEventListener"in window)return;window.addEventListener=function(type,f){window.attachEvent("on"+type,f)}})();

	// Vars.
		var	$body = document.querySelector('body');

	// Disable animations/transitions until everything's loaded.
		$body.classList.add('is-loading');

		window.addEventListener('load', function() {
			window.setTimeout(function() {
				$body.classList.remove('is-loading');
			}, 100);
		});

	// Slideshow Background.
		(function() {

			// Settings.
				var settings = {

					// Images (in the format of 'url': 'alignment').
						images: {
							'images/bg01.jpg': 'center',
							'images/bg02.jpg': 'center',
							'images/bg03.jpg': 'center'
						},

					// Delay.
						delay: 6000

				};

			// Vars.
				var	pos = 0, lastPos = 0,
					$wrapper, $bgs = [], $bg,
					k, v;

			// Create BG wrapper, BGs.
				$wrapper = document.createElement('div');
					$wrapper.id = 'bg';
					$body.appendChild($wrapper);

				for (k in settings.images) {

					// Create BG.
						$bg = document.createElement('div');
							$bg.style.backgroundImage = 'url("' + k + '")';
							$bg.style.backgroundPosition = settings.images[k];
							$wrapper.appendChild($bg);

					// Add it to array.
						$bgs.push($bg);

				}

			// Main loop.
				$bgs[pos].classList.add('visible');
				$bgs[pos].classList.add('top');

				// Bail if we only have a single BG or the client doesn't support transitions.
					if ($bgs.length == 1
					||	!canUse('transition'))
						return;

				window.setInterval(function() {

					lastPos = pos;
					pos++;

					// Wrap to beginning if necessary.
						if (pos >= $bgs.length)
							pos = 0;

					// Swap top images.
						$bgs[lastPos].classList.remove('top');
						$bgs[pos].classList.add('visible');
						$bgs[pos].classList.add('top');

					// Hide last image after a short delay.
						window.setTimeout(function() {
							$bgs[lastPos].classList.remove('visible');
						}, settings.delay / 2);

				}, settings.delay);

		})();

	// Signup Form.
		(function() {

			// Vars.
				var $form = document.querySelectorAll('#signup-form')[0],
					$submit = document.querySelectorAll('#signup-form input[type="submit"]')[0],
					$message;

			// Bail if addEventListener isn't supported.
				if (!('addEventListener' in $form))
					return;

			// Message.
				$message = document.createElement('span');
					$message.classList.add('message');
					$form.appendChild($message);

				$message._show = function(type, text) {

					$message.innerHTML = text;
					$message.classList.add(type);
					$message.classList.add('visible');

					window.setTimeout(function() {
						$message._hide();
					}, 3000);

				};

				$message._hide = function() {
					$message.classList.remove('visible');
				};
				function getXmlHttp() {
				    var xmlhttp;
				    try {
				      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				    } catch (e) {
				    try {
				      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				    } catch (E) {
				      xmlhttp = false;
				    }
				    }
				    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
				      xmlhttp = new XMLHttpRequest();
				    }
				    return xmlhttp;
				  }
			// Events.
			// Note: If you're *not* using AJAX, get rid of this event listener.
				$form.addEventListener('submit', function(event) {

					event.stopPropagation();
					event.preventDefault();

					// Hide message.
						$message._hide();

					// Disable submit.
						$submit.disabled = true;
						 var emailval = document.getElementsByTagName("input")[0].value;
						 var result = false;

						 if (emailval !== "") {
			 /*$.ajax({
					 cache: false, // no cache
					 url: 'email.php', // your url; on jsfiddle /echo/json/
					 type: 'POST', // request method
					 dataType: 'json', // the data type, here json. it's simple to use with php -> json_decode
					 data: {
							 email: emailval // here the email
					 },
					 success: function (data) {
							 console.log(data);
							 result = true;
					 },
					 error: function (e) {
							result = false;
					 },
					 fail: function () {
							result = false;
					 }
 });*/
 var xmlhttp = getXmlHttp();
 xmlhttp.open("POST", "email.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("email="+emailval);
xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
      if (xmlhttp.readyState == 4) { // Ответ пришёл
        if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
        result = true;
        }
      }
    };
 }
					// Process form.
					// Note: Doesn't actually do anything yet (other than report back with a "thank you"),
					// but there's enough here to piece together a working AJAX submission call that does.
						window.setTimeout(function() {

							// Reset form.
								$form.reset();

							// Enable submit.
								$submit.disabled = false;

							// Show message.
							if(result){
								$message._show('success', 'Спасибо!');
							}else{
								$message._show('failure', 'Ошибка. Попробуйте позже');
							}
								//

						}, 750);

				});

		})();

})();
