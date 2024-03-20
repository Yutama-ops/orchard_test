
class General {
	constructor() {
		this.init();
	}

	init() {
		this.bindAnchorClicks();
	}
	
	bindAnchorClicks() {
		const anchors = document.querySelectorAll('a');
		anchors.forEach(anchor => {
		  anchor.addEventListener('click', (e) => {
			console.log('Anchor clicked:', e.currentTarget);
		  });
		});
	  }
	  
}

export default General;
