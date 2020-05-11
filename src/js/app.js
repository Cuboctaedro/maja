import "lazysizes";
import * as PhotoSwipe from 'photoswipe';
import * as PhotoSwipeUI_Default from 'photoswipe/dist/photoswipe-ui-default'
import wpEmbed from "./modules/wp-embed.js";


wpEmbed();

window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.customMedia = {
    '--sm': '(max-width: 540px)',
    '--md': '(max-width: 768px)',
    '--lg': '(max-width: 1024px)',
    '--xl': '(max-width: 1280px)',
};

const pswpElement = document.querySelectorAll('.pswp')[0];
const options = {
    // optionName: 'option value'
    // for example:
    index: 0 // start at first slide
};

const galleryLinks = document.querySelectorAll('[data-gallery]');

Array.from(galleryLinks).forEach(link => {
    let options = {
        index: link.dataset.gallery,
    }
    let gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
    link.addEventListener('click', event => {
        event.preventDefault();
        gallery.init();
    })
})
