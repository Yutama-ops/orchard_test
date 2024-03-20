class General {
	constructor() {
		this.init();
	}

	init() {
		
		this.renderLatestPosts();
		this.bindAnchorClicks();
	}

	bindAnchorClicks() {
		document.body.addEventListener('click', (e) => {
			const anchor = e.target.closest('a');
			if (anchor) {
				console.log('Anchor clicked:', anchor);
			}
		});
	}

	renderLatestPosts() {
		if (document.getElementById('static')) {
			fetch('../orchard-theme/assets/src/content.json')
				.then((response) => response.json())
				.then((data) => {
					const latestPostsSection = document.querySelector('.latest-post .row');
					const latestPosts = data.sections.find((section) => section.id === 'latest-post').posts;
					const mainContentSection = data.sections.find((section) => section.id === 'main-content');
					if (mainContentSection && mainContentSection.images.length > 0) {
						const container = document.querySelector('.main-content .row');

					}

					latestPosts.forEach((post) => {
						latestPostsSection.innerHTML += `
							<div class="col-12 col-md-6 col-lg-4 post-container">
								<a href="${post.readMoreLink}" aria-label="Read more about ${post.title}">
								<article class="post-entry">
									<img src="${post.image.src}" class="w-100 border-danger border-bottom border-5 mb-3" alt="${post.image.alt}">
									<h5 class="fw-bold">${post.title}</h5>
									<p>${post.content}</p>
									<p class="read-more text-primary d-inline-block fw-bold border-danger border-bottom border-2 pb-1">Read More</p>
								</article>
								</a>
							</div>
							`;
					});
				})
				.catch((error) => console.error('Error loading latest posts:', error));
		}
	}
}
export default General;
