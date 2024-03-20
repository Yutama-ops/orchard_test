class General {
	constructor() {
		this.init();
	}

	init() {
		this.renderPosts();
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

	renderPosts() {
		if (document.getElementById('static')) {
			fetch('../orchard-theme/assets/src/content.json')
				.then((response) => response.json())
				.then((data) => {
					const latestPostsSection = document.querySelector('.latest-post .row');
					const modalSection = document.querySelector('.section-modal');
					const latestPosts = data.sections.find((section) => section.id === 'latest-post').posts;
					const mainContentImages = data.sections.find((section) => section.id === 'main-content').images;
					const imageElements = document.querySelectorAll('#main-content .container .row .d-flex img');
					const mainContent = data.sections.find((section) => section.id === 'main-content');
					const mainContentSection = document.querySelector('#main-content-text');

					mainContentSection.innerHTML += `
						<div>
							<h2 class="fw-light text-uppercase border-bottom border-secondary pb-1 mb-2 main-title">${mainContent.title}</h2>
							<div class="content-overflow">
							<p class="pb-2 main-content-paragraph main-content">${mainContent.content}</p>
							<h6 class="pb-2 text-danger sub-title">${mainContent.subTitle}</h6>
							<p class="fw-bold pb-2 text-primary sub-content">${mainContent.subContent}</p>
						</div>
						`;

					imageElements.forEach((imgElement, index) => {
						const imageSource = mainContentImages[index] ? mainContentImages[index].src : '/web/app/themes/orchard-theme/assets/src/img/orchard_logo.jpeg';
						imgElement.src = imageSource;
						imgElement.alt = mainContentImages[index] ? mainContentImages[index].alt : 'Placeholder image';
						imgElement.setAttribute('data-bs-toggle', 'modal');
    					imgElement.setAttribute('data-bs-target', '#modal-' + mainContentImages[index].id);
						imgElement.onerror = () => {
							imgElement.src = '/web/app/themes/orchard-theme/assets/src/img/orchard_logo.jpeg';
							imgElement.alt = 'Placeholder image';
						};
						modalSection.innerHTML += `
						<div class="modal fade" id="modal-${mainContentImages[index].id}" tabindex="-1" aria-labelledby="modal-${mainContentImages[index].id}" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-body bg-light position-relative">
										<button type="button" class="btn-close end-0 position-absolute py-2 px-2 bg-primary mx-2 my-1" data-bs-dismiss="modal" aria-label="Close"></button>
										<img src="${imgElement.src}" class="img-fluid w-100 align-self-stretch" alt="${imgElement.alt}">
									</div>
								</div>
							</div>
						</div>
					`;

					});

					latestPosts.forEach((post) => {
						latestPostsSection.innerHTML += `
							<div class="col-12 col-md-6 col-lg-4 post-container">
								<a href="${post.readMoreLink}" aria-label="Read more about ${post.title}">
									<article class="post-entry">
										<img src="${post.image.src}" onerror="this.src='/web/app/themes/orchard-theme/assets/src/img/orchard_logo.jpeg';" class="w-100 border-danger border-bottom border-5 mb-3" alt="${post.image.alt}">
										<h5 class="fw-bold">${post.title}</h5>
										<p>${post.content}</p>
										<p class="read-more text-primary d-inline-block fw-bold border-danger border-bottom border-2 pb-1">Read More</p>
									</article>
								</a>
							</div>
						`;
					});
				})
				.catch((error) => console.error('Error could not fetch data :', error));
		}

		
	}
}
export default General;
