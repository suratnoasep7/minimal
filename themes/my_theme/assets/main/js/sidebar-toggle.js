
$(document).ready(function () {
    
	$('.action-toggle').bind('click', function(e) {
        e.preventDefault();
        var sidebarTarget = $('#sidebar');
        var containerTarget = $('#container');
        var containerMargin = 236;
        var containerNow = parseInt(containerTarget.css('margin-left'));
        if (containerNow == containerMargin) {
        	sidebarTarget.css('z-index',-1);
        	containerTarget.animate({'margin-left':0}, 125, function() {  });
        	//alert(margin);
        	//oFC.fnUpdate();
        }else{
        	containerTarget.animate({'margin-left':containerMargin}, 125, function() { sidebarTarget.css('z-index',0); });
        }
    });
	
});