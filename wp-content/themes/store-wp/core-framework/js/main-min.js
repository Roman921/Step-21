!function(){function e(){for(var e=this;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}var t,a,n,s,o;if(t=document.getElementById("site-navigation"),t&&(a=t.getElementsByTagName("button")[0],"undefined"!=typeof a)){if(n=t.getElementsByTagName("ul")[0],"undefined"==typeof n)return void(a.style.display="none");n.setAttribute("aria-expanded","false"),-1===n.className.indexOf("nav-menu")&&(n.className+=" nav-menu"),a.onclick=function(){-1!==t.className.indexOf("toggled")?(t.className=t.className.replace(" toggled",""),a.setAttribute("aria-expanded","false"),n.setAttribute("aria-expanded","false")):(t.className+=" toggled",a.setAttribute("aria-expanded","true"),n.setAttribute("aria-expanded","true"))},s=n.getElementsByTagName("a"),o=n.getElementsByTagName("ul");for(var i=0,r=o.length;r>i;i++)o[i].parentNode.setAttribute("aria-haspopup","true");for(i=0,r=s.length;r>i;i++)s[i].addEventListener("focus",e,!0),s[i].addEventListener("blur",e,!0)}}(),function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,a=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||a)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t),e&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus()))},!1)}(),jQuery(document).ready(function(e){var t=e(".main-navigation"),a=e("<div />",{"class":"filter-drop-spacer",height:t.outerHeight()});t.size()&&e(window).scroll(function(){!t.hasClass("fix")&&e(window).width()>767&&e(window).scrollTop()>t.offset().top?(t.before(a),t.addClass("fix")):t.hasClass("fix")&&e(window).scrollTop()<a.offset().top&&(t.removeClass("fix"),a.remove())})}),jQuery(document).ready(function(e){e(window).scroll(function(){e(this).scrollTop()<200?e("#smoothup").fadeOut():e("#smoothup").fadeIn()}),e("#smoothup").on("click",function(){return e("html, body").animate({scrollTop:0},"slow"),!1}),e(".scrollto a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")||location.hostname==this.hostname){var t=e(this.hash);if(t=t.length?t:e("[name="+this.hash.slice(1)+"]"),t.length)return e("html,body").animate({scrollTop:t.offset().top},1e3),!1}})});
