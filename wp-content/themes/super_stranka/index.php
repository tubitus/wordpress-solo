<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>

<!-- load theme stylesheet -->
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>">

<section class="portfolio-hero">
	<h1>Web Designer & Developer</h1>
	<p>Crafting responsive websites, UI prototypes and clean front-end code. Selected projects below — click to view details, demo or code.</p>
</section>

<nav class="filters" aria-label="Portfolio filters" id="portfolioFilters">
	<!-- componentized buttons -->
	<button class="filter-btn active" data-filter="all">All</button>
	<button class="filter-btn" data-filter="web">Websites</button>
	<button class="filter-btn" data-filter="ui">UI / Design</button>
	<button class="filter-btn" data-filter="code">Code</button>
</nav>

<main class="grid" id="portfolioGrid" role="list">
	<!-- existing project items remain as data-driven cards -->
	<article class="item card" data-type="web" data-demo="https://example.com/demo-portfolio" data-repo="https://github.com/yourname/portfolio-site" role="listitem">
		<img class="card-media" src="https://via.placeholder.com/1200x800?text=Portfolio+Site" alt="Portfolio Site screenshot">
		<div class="card-body meta">
			<h3 class="card-title">Personal Portfolio Site</h3>
			<p class="card-desc">Responsive, CMS-ready portfolio with performance optimizations.</p>
			<div class="tags"><span class="badge">HTML</span><span class="badge">CSS</span><span class="badge">WordPress</span></div>
		</div>
	</article>

	<!-- UI design (thumbnail) -->
	<article class="item" data-type="ui" data-demo="https://www.figma.com/file/..." role="listitem">
		<img src="https://via.placeholder.com/1200x800?text=UI+Kit" alt="UI Kit screenshot">
		<div class="meta">
			<h3>UI Kit & Components</h3>
			<p>Design system and reusable components for product interfaces.</p>
			<div class="tags"><span class="badge">Figma</span><span class="badge">Design Systems</span></div>
		</div>
	</article>

	<!-- Website project -->
	<article class="item" data-type="web" data-demo="https://example.com/agency" data-repo="https://github.com/yourname/agency-site" role="listitem">
		<img src="https://via.placeholder.com/1200x800?text=Agency+Site" alt="Agency Site screenshot">
		<div class="meta">
			<h3>Agency Landing</h3>
			<p>Landing page with animations, responsive grid and accessibility tweaks.</p>
			<div class="tags"><span class="badge">JavaScript</span><span class="badge">Accessibility</span></div>
		</div>
	</article>

	<!-- Code sample (no screenshot, shows code in modal) -->
	<article class="item" data-type="code" role="listitem">
		<div class="thumb">JS</div>
		<div class="meta">
			<h3>Interactive Grid Component</h3>
			<p>Reusable vanilla JS gallery with filter + modal logic.</p>
			<div class="tags"><span class="badge">JavaScript</span><span class="badge">ES6</span></div>
		</div>
		<pre class="code-snippet" style="display:none;">// Simple filter + modal
const items = document.querySelectorAll('.item');
items.forEach(i =&gt; { /* ...component code... */ });</pre>
	</article>

	<!-- UI case study (thumbnail) -->
	<article class="item" data-type="ui" role="listitem">
		<img src="https://via.placeholder.com/1200x800?text=Mobile+Prototype" alt="Mobile Prototype">
		<div class="meta">
			<h3>Mobile App Prototype</h3>
			<p>Prototype focused on onboarding and usability testing.</p>
			<div class="tags"><span class="badge">UX</span><span class="badge">Prototype</span></div>
		</div>
	</article>

	<!-- Small utility / tool -->
	<article class="item" data-type="code" data-repo="https://github.com/yourname/resize-observer-util" role="listitem">
		<div class="thumb">TS</div>
		<div class="meta">
			<h3>Resize Observer Utility</h3>
			<p>Small TypeScript utility used across projects.</p>
			<div class="tags"><span class="badge">TypeScript</span><span class="badge">Utility</span></div>
		</div>
		<pre class="code-snippet" style="display:none;">export function onResize(el: Element, cb: () =&gt; void) {
  const obs = new ResizeObserver(cb);
  obs.observe(el);
  return () =&gt; obs.disconnect();
}</pre>
	</article>
</main>

<!-- templates for components (reusable in JS) -->
<template id="tpl-modal-links">
	<div class="modal-links">
		<a class="btn demo-link" href="#" target="_blank" rel="noopener noreferrer">Live demo</a>
		<a class="btn repo-link" href="#" target="_blank" rel="noopener noreferrer">Source</a>
	</div>
</template>

<!-- Modal for viewing photos, UI and code -->
<div class="modal" id="portfolioModal" aria-hidden="true">
	<div class="box" role="dialog" aria-modal="true">
		<button class="close-btn" id="modalClose" aria-label="Close">✕</button>
		<div class="modal-inner" id="modalInner">
			<!-- dynamic content injected here -->
		</div>
	</div>
</div>

<script>
/* componentized JS: filters, card handling, modal */
(function(){
	const grid = document.getElementById('portfolioGrid');
	const filters = document.getElementById('portfolioFilters');
	const modal = document.getElementById('portfolioModal');
	const modalInner = document.getElementById('modalInner');
	const closeBtn = document.getElementById('modalClose');
	const tplLinks = document.getElementById('tpl-modal-links');

	function initFilters(){
		filters.addEventListener('click', function(e){
			const btn = e.target.closest('.filter-btn');
			if(!btn) return;
			Array.from(filters.querySelectorAll('.filter-btn')).forEach(b=>b.classList.remove('active'));
			btn.classList.add('active');
			const f = btn.getAttribute('data-filter');
			Array.from(grid.children).forEach(item=>{
				item.style.display = (f==='all' || item.getAttribute('data-type')===f) ? '' : 'none';
			});
		});
	}

	function openModalForItem(item){
		const type = item.getAttribute('data-type');
		const meta = item.querySelector('.meta');
		const demo = item.getAttribute('data-demo');
		const repo = item.getAttribute('data-repo');
		let html = '';

		// show image for visual projects
		if((type === 'web' || type === 'ui') && item.querySelector('.card-media')){
			const img = item.querySelector('.card-media').src;
			const alt = item.querySelector('.card-media').alt || '';
			html += '<div class="modal-media"><img src="'+ img +'" alt="'+ escapeHtml(alt) +'"></div>';
		}

		// meta content
		html += '<div class="content">'+ meta.innerHTML +'</div>';

		// links
		if(demo || repo){
			const fragment = tplLinks.content.cloneNode(true);
			const demoLink = fragment.querySelector('.demo-link');
			const repoLink = fragment.querySelector('.repo-link');
			if(demo) demoLink.href = demo; else demoLink.remove();
			if(repo) repoLink.href = repo; else repoLink.remove();
			const div = document.createElement('div');
			div.appendChild(fragment);
			html += div.innerHTML;
		}

		// code snippet if present inside card
		const code = item.querySelector('.code-snippet');
		if(code){
			html += '<pre class="modal-code">'+ escapeHtml(code.textContent) +'</pre>';
		}

		modalInner.innerHTML = html;
		modal.classList.add('open');
		modal.setAttribute('aria-hidden','false');
	}

	function initCards(){
		grid.addEventListener('click', function(e){
			const card = e.target.closest('.card');
			if(!card) return;
			openModalForItem(card);
		});
	}

	function closeModal(){
		modal.classList.remove('open');
		modal.setAttribute('aria-hidden','true');
		modalInner.innerHTML = '';
	}

	function escapeHtml(str){
		return String(str).replace(/[&<>"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]; });
	}

	// init
	initFilters();
	initCards();
	closeBtn.addEventListener('click', closeModal);
	modal.addEventListener('click', function(e){ if(e.target===modal) closeModal(); });
	document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeModal(); });
})();
</script>

<?php get_footer(); ?>
