/*  (c) https://maxsite.org/ */

function pursuingNav(selector, options = {}) {
    const element = document.querySelector(selector);
    if (!element) return;

    /* animation-top animation-fast animation-fade animation-slow */
    const myclass = options.myclass || 'animation-top animation-fast';
    const classList = myclass.split(/\s+/).filter(Boolean);
    const threshold = options.threshold || 30;
    const fixedClassList = ['pos-fixed', 'pos0-y', 'pos0-l', 'w100', 'transition-duration', 'z-index99'];

    const initialOffsetTop = element.offsetTop;
    let isFixed = false;
    let scrollUpStart = null;
    let lastScroll = window.scrollY;

    window.addEventListener('scroll', () => {
        const currentScroll = window.scrollY;

        if (currentScroll < lastScroll) {
            if (scrollUpStart === null) {
                scrollUpStart = lastScroll;
            }

            if (!isFixed && scrollUpStart - currentScroll > threshold) {
                fixedClassList.forEach(cls => element.classList.add(cls));
                classList.forEach(cls => element.classList.add(cls));
                element.style.transform = 'translateY(0)';
                isFixed = true;
            }
        }
        else {
            scrollUpStart = null;
            if (isFixed) {
                element.style.transform = 'translateY(-100%)';
                isFixed = false;
            }
        }

        if (currentScroll <= initialOffsetTop) {
            fixedClassList.forEach(cls => element.classList.remove(cls));
            classList.forEach(cls => element.classList.remove(cls));
            element.style.transform = '';
            isFixed = false;
            scrollUpStart = null;
        }

        lastScroll = currentScroll;
    });
}
