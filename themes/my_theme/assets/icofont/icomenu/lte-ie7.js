/* Use this script if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-pencil' : '&#xe3af;',
			'icon-basket' : '&#xe2b5;',
			'icon-cars' : '&#xe2b7;',
			'icon-enter' : '&#xe21e;',
			'icon-users' : '&#xe09e;',
			'icon-layers' : '&#xe14e;',
			'icon-equalizer' : '&#xe3ad;',
			'icon-calculate' : '&#xe2b6;',
			'icon-printer' : '&#xe505;',
			'icon-suitcase' : '&#xe36e;',
			'icon-bookmark' : '&#xe322;',
			'icon-cone' : '&#xe325;',
			'icon-screen' : '&#xe3e9;',
			'icon-broadcast' : '&#xe506;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^s'"]+/);
		if (c) {
			addIcon(el, icons[c[0]]);
		}
	}
};