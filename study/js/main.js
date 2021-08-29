const container = document.querySelector(".container");
const coffees = [
  {
    name: "Perspiciatis",
    image: "images/coffee1.jpg"
  },
  {
    name: "Voluptatem",
    image: "images/coffee2.jpg"
  },
  {
    name: "Explicabo",
    image: "images/coffee3.jpg"
  },
  {
    name: "Rchitecto",
    image: "images/coffee4.jpg"
  },
  {
    name: " Beatae",
    image: "images/coffee5.jpg"
  },
  {
    name: " Vitae",
    image: "images/coffee6.jpg"
  },
  {
    name: "Inventore",
    image: "images/coffee7.jpg"
  },
  {
    name: "Veritatis",
    image: "images/coffee8.jpg"
  },
  {
    name: "Accusantium",
    image: "images/coffee9.jpg"
  }
];


if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {

    navigator.serviceWorker.register('service-worker.js')
    .then(swReg => {
      console.log('Service Worker registered!', swReg);

      swRegistration = swReg;

    })
    .catch(err => {
      console.error('Service Worker Error', err);
    });
  });
}

// this script gets the display mode of the app - either in browswer or PWA mode
function getPWADisplayMode() {
  console.log('Getting PWA Display Mode');
  const isStandalone = window.matchMedia('(display-mode: standalone)').matches;
  if (document.referrer.startsWith('android-app://')) {
    mode= 'twa';
  } else if (navigator.standalone || isStandalone) {
    mode= 'standalone';
  }
  else{
    mode= 'browser';

  }

  console.log('Display Mode: ', mode);

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
    }

  xhttp.open("GET", "index-content.php?app="+mode, true);
  xhttp.send();
}


function showInstallPromotion(){
  var installButton = document.querySelector('.install-button');

  installButton.addEventListener('click', async () => {

    deferredPrompt.prompt();
    // Wait for the user to respond to the prompt
    const { outcome } = await deferredPrompt.userChoice;
    // Optionally, send analytics event with outcome of user choice
    console.log(`User response to the install prompt: ${outcome}`);
    // We've used the prompt, and can't use it again, throw it away
    deferredPrompt = null;

  });
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

installButton.addEventListener('click', function(){
   prompt.prompt();
   let result = await that.prompt.userChoice;
    if (result&&result.outcome === 'accepted') {
       installed = true;
    }
})

window.addEventListener('appinstalled', () => {
  // Hide the app-provided install promotion
  hideInstallPromotion();
  // Clear the deferredPrompt so it can be garbage collected
  prompt = null;
  console.log('PWA was installed');
  // reload so that 
  location.reload();
});
