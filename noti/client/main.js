const publicVapidKey =
  "BAWr4lD9LJUJUpTyt5AxtL-XwJ4wPU2dc3B26DAq-w6vaO-PZBSVpGULA-T_iAnVfjMPEja-3iP9eBsxygkUP9g";


// function used to convert public vapid key string to uint8array (required in docs)
function urlBase64ToUint8Array(base64String) {
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


// ----------------------
// BASIC NOTIFICATIONS
// ----------------------

// check if browser supports notifications
if (!('Notification' in window)) {
  console.log('This browser does not support notifications!');
}
// request notification permissions
Notification.requestPermission(status => {
  console.log('Notification permission status: ', status);
})
// display notifications
function displayNotification(notificationTitle) {
  if (Notification.permission === "granted") {
    navigator.serviceWorker.getRegistration().then(reg => {
      const options = {
        body: 'First notification!',
        // icon: 'images/coffee1.jpg',
        vibrate: [100, 50, 100],
        data: {
          dateOfArrival: Date.now(),
          primaryKey: 1
        },
        // actions: [
        //   {action: 'explore', title: 'Go to the site',
        //     icon: 'images/coffee1.jpg'},
        //   {action: 'close', title: 'Close the notification',
        //     icon: 'images/coffee1.jpg'},
        // ]
      };
      var notification = new Notification(notificationTitle, options);
  });
  }
}

displayNotification('sdfsd');



if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('serviceWorker.js').then(function(reg) {
    console.log('Service Worker Registered!');

    reg.pushManager.getSubscription().then(function(sub) {
      if (sub === null) {
        // Update UI to ask user to register for Push
        console.log('Not subscribed to push service!');
      } else {
        // We have a subscription, update the database
        console.log('Subscription object: ', sub);
        console.log('Endpoint URL: ', sub.endpoint);
        updateSubscriptionOnServer(sub);
      }
    });
  })
   .catch(function(err) {
    console.log('Service Worker registration failed: ', err);
  });
}




function unsubscribe(){
  navigator.serviceWorker.ready.then(function(reg) {
    reg.pushManager.getSubscription().then(function(subscription) {
      subscription.unsubscribe().then(function(successful) {
        console.log('Successfully unsubscribed.');
      }).catch(function(e) {
        console.log('Unsubscription failed.');
      })
    })
  });
}

// display subscription object
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
}
