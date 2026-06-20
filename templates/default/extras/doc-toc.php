<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*
doc-toc.header: <h4>Навигация по статье</h4>
*/
?>
<nav class="toc-container pos-sticky pos10-t" style="height: fit-content;"><?= getPageData('doc-toc.header') ?><ol id="toc" class="bor1 bor-dotted-l bor-primary500 pad20-b"></ol></nav>
<style>
#toc a.indent-h3 {margin-left: 20px;}
#toc a.indent-h4 {margin-left: 30px;}
#toc a.indent-h5 {margin-left: 40px;}
#toc a.indent-h6 {margin-left: 50px;}
#toc a.active {text-decoration: underline;}
h2, h3, h4, h5, h6 {scroll-margin-top: 2rem;}
</style>
<script>
(() => {
  const tocContainer = document.getElementById('toc');
  const mainContent = document.getElementById('page_content');
  
  if (!mainContent || !tocContainer) return;

  const headings = mainContent.querySelectorAll('h2, h3, h4, h5, h6');
  const tocLinks = [];
  
  const fragment = document.createDocumentFragment();

  headings.forEach((heading, index) => {
    let linkName = heading.textContent
      .replace(/<[^>]*>/g, "")
      .replace(/[^\p{L}\p{N}\s\-]/gu, "")
      .replace(/\s+/g, "-")
      .replace(/^-+|-+$/g, "")
      .toLowerCase();

    if (!linkName) linkName = `section-${index}`;
    if (document.getElementById(linkName)) {
        linkName = `${linkName}-${index}`;
    }

    heading.id = linkName;

    const li = document.createElement('li');
    const a = document.createElement('a');
    
    a.href = `#${heading.id}`;
    a.textContent = heading.textContent.trim();
    a.classList.add(`indent-${heading.tagName.toLowerCase()}`);
    
    li.appendChild(a);
    
    fragment.appendChild(li);
    tocLinks.push(a);
  });

  tocContainer.appendChild(fragment);

  const observerOptions = {
    root: null,
    rootMargin: '0px 0px -80% 0px',
    threshold: 0
  };

  const observerCallback = (entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        tocLinks.forEach(link => link.classList.remove('active'));
        const activeLink = tocContainer.querySelector(`a[href="#${entry.target.id}"]`);
        if (activeLink) {
          activeLink.classList.add('active');
        }
      }
    });
  };

  const observer = new IntersectionObserver(observerCallback, observerOptions);
  headings.forEach(heading => observer.observe(heading));
})();
</script>
