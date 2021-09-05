// register service worker
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {

    navigator.serviceWorker.register('service-worker.js')
    .then(swReg => {
      console.log('Service Worker registered!', swReg);
    })
    .catch(err => {
      console.error('Service Worker Error', err);
    });
  });
}

// this script gets the display mode of the app - either in browswer or PWA mode
// it is called whenever a page loaded
function getPWADisplayMode() {

  // get display mode
  if (navigator.standalone || window.matchMedia('(display-mode: standalone)').matches || window.matchMedia('(display-mode: fullscreen)').matches || window.matchMedia('(display-mode: minimal-ui)').matches) {
    mode='app';
  } else {
    mode= 'browser';
  }

  console.log('Display Mode: ', mode);

  // get whether on iOS. Code found on Stack Overflow.
  if (['iPad','iPhone','iPod'].includes(navigator.platform)
      // iPad on iOS 13 detection
      || (navigator.userAgent.includes("Mac") && "ontouchend" in document)){
          isIos='ios';
      }
      else{
          isIos='notios';
      }


  console.log('On iOS: '+isIos);

  // fetch request will transfer this info to php
  fetch('index-content.php?app='+mode+'&ios='+isIos, {
    method: 'GET',
  })
}

// Initialize prompt for use later to show browser install prompt.
let prompt;

window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent the mini-infobar from appearing on mobile
  e.preventDefault();
  // Stash the event so it can be triggered later.
  prompt = e;
  // // Update UI notify the user they can install the PWA
  // showInstallPromotion();

  console.log(`'beforeinstallprompt' event was fired.`);
});


var installButton = document.querySelector('.install-button');

installButton.addEventListener('click', async function(){
  prompt.prompt();
  let result = await that.prompt.userChoice;

})

window.addEventListener('appinstalled', () => {
  // Clear the deferredPrompt so it can be garbage collected
  prompt = null;
  console.log('PWA was installed');
  // reload so that
  location.reload();
});
