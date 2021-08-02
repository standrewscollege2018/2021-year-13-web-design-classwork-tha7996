// button to turn push notifications on/off
const pushButton = document.querySelector('.notifications-switch');

let isSubscribed = false;
let swRegistration = null;

// get notification permissions
if (!('Notification' in window)) {
  console.log('Notifications not supported in this browser');
}
Notification.requestPermission(status => {
  console.log('Notification permission status:', status);
});

// display notifications. note this function only used for testing - push notifications are sent from service worker
function displayNotification(notificationTitle) {
  if (Notification.permission === "granted") {
    navigator.serviceWorker.getRegistration().then(reg => {
      // options for notification
      const options = {
        body: 'First notification!',
        // icon: 'images/coffee1.jpg',
        vibrate: [100, 50, 100],
        data: {
          dateOfArrival: Date.now(),
          primaryKey: 1
        },
        // actions. these are buttons that can be pressed on notifciation
        // actions: [
        //   {action: 'explore', title: 'Go to the site',
        //     icon: 'images/coffee1.jpg'},
        //   {action: 'close', title: 'Close the notification',
        //     icon: 'images/coffee1.jpg'},
        // ]
      };
      // send notification
      var notification = new Notification(notificationTitle, options);
  });
  }
}

// const vapidPublicKey = 'BBKJ5esc7mHqXQB4Pif02rPjDu7NJnWkIqC8qaS7yeJ0N2ss5TN2Tk-qb69Sv8AUWUkTP5J19yLEzRE3aUT-HE0';
const vapidPublicKey = 'BDD_zKtxaL_P25T2C7AjeenIND2VabW2qBn6tsHyib3-ICZLZ1ovxh5ID1Ilh-EvDw9Fz-sNiJcp37SpCqVKahQ';

// initialize the UI
function initializeUI() {
  pushButton.addEventListener('click', () => {
    pushButton.disabled = true;
    if (isSubscribed) {
      unsubscribeUser();
    } else {
      subscribeUser();
    }
  });

  // Set the initial subscription value
  swRegistration.pushManager.getSubscription()
  .then(subscription => {
    isSubscribed = (subscription !== null);

    if (isSubscribed) {
      console.log('User is subscribed.');
      console.log('Subscription object: ', subscription);
      console.log('Endpoint URL: ', subscription.endpoint);
    } else {
      console.log('User is NOT subscribed.');
    }

    updateSubscriptionButton();
  });
}

// subescribe user to push notifications
function subscribeUser() {
  swRegistration.pushManager.subscribe({
    // this is a 'promise' meaning browser will only accept push notifications with value
    userVisibleOnly: true,
    // the vapidPublicKey in Uint8Array (because thats what they need).
    applicationServerKey: urlB64ToUint8Array(vapidPublicKey)
  })
  .then(subscription => {
    // object 'subscription' is created from this

    console.log('User is subscribed');

    console.log('Subscription object: ', subscription);
    console.log('Endpoint URL: ', subscription.endpoint);

    // to send notifications, the subscription object is used in node js along with public and private key.
    // this function will insert it into database for each user
    updateSubscriptionOnServer(subscription);

    isSubscribed = true;

    updateSubscriptionButton();
  })
  .catch(err => {
    if (Notification.permission === 'denied') {
      console.warn('Permission for notifications was denied');
    } else {
      console.error('Failed to subscribe the user: ', err);
    }
    updateSubscriptionButton();
  });
}

// unsubscribe user from push notifications
function unsubscribeUser() {
  swRegistration.pushManager.getSubscription()
  .then(subscription => {
    // check if subscription actually exists
    if (subscription) {
      // built in function = handy
      return subscription.unsubscribe();
    }
  })
  .catch(err => {
    console.log('Error unsubscribing', err);
  })
  .then(() => {

    // this will delete object from database.
    updateSubscriptionOnServer(null);

    console.log('User unsubscribed');
    isSubscribed = false;

    updateSubscriptionButton();
  });
}

// update subscription. currently just prints subscription object & endpoint
// later will contain php which will insert/delete subscription object from database.
function updateSubscriptionOnServer(subscription) {
  // Here's where you would send the subscription to the application server

  const subscriptionJson = document.querySelector('.js-subscription-json');
  const endpointURL = document.querySelector('.js-endpoint-url');
  const subAndEndpoint = document.querySelector('.js-sub-endpoint');

  if (subscription) {
    subscriptionJson.textContent = JSON.stringify(subscription);
    endpointURL.textContent = subscription.endpoint;
    subAndEndpoint.style.display = 'block';
  } else {
    subAndEndpoint.style.display = 'none';
  }

  // this will be sent to php script in order to insert into database
  const subscriptionData = new FormData();
  subscriptionData.append('subscription_object', JSON.stringify(subscription));

  fetch('update-subscription.php', {
    method: 'POST',
    body: subscriptionData,
  }).then((response) => response.text()).then((text) => {
      console.log(text);
    })

}

// display if user subscribed or not
function updateSubscriptionButton() {
  if (Notification.permission === 'denied') {
    pushButton.textContent = 'Push Messaging Blocked';
    pushButton.disabled = true;
    updateSubscriptionOnServer(null);
    return;
  }

  if (isSubscribed) {
    pushButton.textContent = 'Disable Push Messaging';
  } else {
    pushButton.textContent = 'Enable Push Messaging';
  }

  pushButton.disabled = false;
}

// function used to convert public vapid key string to uint8array (required)
function urlB64ToUint8Array(base64String) {
  const padding = "=".repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, "+")
    .replace(/_/g, "/");

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    console.log('Service Worker and Push supported');


    navigator.serviceWorker.register('js/service-worker.js')
    .then(swReg => {
      console.log('Service Worker registered!', swReg);

      swRegistration = swReg;

      initializeUI();
    })
    .catch(err => {
      console.error('Service Worker Error', err);
    });
  });
} else {
  console.warn('Push messaging is not supported');
  pushButton.textContent = 'Push Not Supported';
}
