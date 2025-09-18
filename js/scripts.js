document.addEventListener("DOMContentLoaded", (event) => {

  const body = document.querySelector('body'),
        mobileBtn = document.querySelector('#mobile-menu');

  function toggleMobile() {
    if(body.classList.contains('mobile-open')) {
      body.classList.remove('mobile-open');
      mobileBtn.setAttribute('aria-expanded', false);
      mobileBtn.setAttribute('aria-label', 'Open Main Menu');
    } else {
      body.classList.add('mobile-open');
      mobileBtn.setAttribute('aria-expanded', true);
      mobileBtn.setAttribute('aria-label', 'Close Main Menu');
    }
  }

  mobileBtn.addEventListener('click', function() {
    toggleMobile();
  });

  const textAreas = document.querySelectorAll('.code-bloc textarea');
  if(textAreas !== null && textAreas.length > 0) {
    textAreas.forEach((ta, ndx) => {
      ta.style.height = 'auto';
      ta.style.height = ta.scrollHeight + 'px';
    });
  } else {
    console.log('no code blocks here');
  }

});
