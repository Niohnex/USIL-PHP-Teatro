var Site = {
	
	
   	init: function() { 
	   $('image').fade('hide');
	   $('header').setStyle('margin-bottom', 60);    

	   Site.smoothscroll();
	   Site.nav(); 
	   Site.subnav();
//	     Site.preload();   
	   Site.intro();

	},            
	
	smoothscroll: function() {
	   var mySmoothScroll = new SmoothScroll();
	},  
	
	nav: function() {      
		var links = $$('#nav ul li a');
		links.each(function(link){
	   		var myFx = new Fx.Tween(link, {link: 'chain'});
			var oldColor = link.getStyle('color'); 
			
			
			
			link.addEvent('mouseover',function(){
			   myFx.start('color', '#fff');
			}); 
			
			link.addEvent('mouseleave',function(){
			   myFx.start('color', oldColor);
			});
			
			link.addEvent('mousedown',function(){
			  	var imageout = new Fx.Morph('image', {duration: 'short', transition: Fx.Transitions.Sine.easeOut});

				imageout.start({
				    'padding-top': [250, 300], 
				    'opacity': [1, 0]
				});   
				
				var contentHeight = new Fx.Morph('content', {duration: 'long', transition: Fx.Transitions.Sine.easeOut});

				contentHeight.start({
				    'padding-top': [30, 0]
				});
			
			   //$('header').tween('background-color', '#000'); 
			   
				var headerMorph = new Fx.Morph('header', {duration: 'long', transition: Fx.Transitions.Sine.easeOut});

				headerMorph.start({
				    'margin-bottom': [0, -60],
					'background-color': '#000'
				});
			
			}); 
			
		});
	}, 
	
	subnav: function() {      
		var slinks = $$('#sidebar ul li a');
		slinks.each(function(slink){
	   		var subnavFx = new Fx.Morph(slink, {link: 'chain'});
			var oldColor = slink.getStyle('color'); 
			
			
			
			slink.addEvent('mouseover',function(){
			   subnavFx.start('color', '#sidebar li a:hover');
			}); 
			
			slink.addEvent('mouseleave',function(){
			   subnavFx.start('color', oldColor);
			}); 
			
		    slink.addEvent('click',function(){
			   var imageout = new Fx.Morph('image', {duration: 'short', transition: Fx.Transitions.Sine.easeOut});
			
			   $('header').tween('background-color', '#000');
			});
			
		});
	},
	
	intro: function() {
		var content = $$('#content');
		var image = $$('#image');
		var header = $$('#header');
		 
		var imageHeight = new Fx.Morph('image', {duration: 'long', transition: Fx.Transitions.Sine.easeOut});

		imageHeight.start({
		    'padding-top': [310, 250],
		    'opacity': [0, 1]
		}); 
		
		var contentHeight = new Fx.Morph('content', {duration: 'long', transition: Fx.Transitions.Sine.easeOut});

		contentHeight.start({
		    'padding-top': [0, 30]
		});
		
	      var headerColor = new Fx.Morph('header', {duration: 'normal', transition: Fx.Transitions.Sine.easeOut});
          var myColor = $('header').getStyle('background-color');  
			$('header').setStyle('background-color', '#000');
			headerColor.start({
	    	   'background-color': myColor,
			   'margin-bottom': [-60, 0]
			});
	},
	
	preload: function() {
		$('wrapper').fade('hide');

		 var myImages = new Asset.images(['assets/images/background/background1.jpg', 'assets/images/background/background2.jpg','assets/images/background/background3.jpg','assets/images/background/background4.jpg','assets/images/background/background5.jpg','assets/images/background/background6.jpg','assets/images/background/background7.jpg','assets/images/background/background8.jpg','assets/images/background/background9.jpg','assets/images/background/background10.jpg'], {
		    onComplete: function(){
		        //alert('All images loaded!'); 
				$('wrapper').fade('in');

		    }
		});
	}
       
};

window.addEvent('load', Site.init);