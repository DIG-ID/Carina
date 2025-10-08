import "./fancybox";
import './gsap';
import './swiper';
import './navigation';
import './sticky-header';
import './accordion';
import "./blog-pagination";


/*TEMP for mailchimp form*/
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.querySelector('.carina-newsletter .carina-btn');
  if (!btn) return;

  const lang = document.documentElement.lang || '';
  if (lang.startsWith('fr')) btn.value = 'Envoyer';
  else if (lang.startsWith('en')) btn.value = 'Send';
  else btn.value = 'Senden';
});