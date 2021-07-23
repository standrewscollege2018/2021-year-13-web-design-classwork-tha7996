const publicVapidKey = 'BN1J_fF_nuziO_qq2Mu3oCl1hi6cJgmb1UOBcyiakQqSV67CBcrC49f-Z7C6y79cdiIDV_DVEF16LvMsWbwd7Fw';

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

Notification.requestPermission(status => {
  console.log('Notification permission status: ', status);
})

// function to display notifications
function displayNotification(notificationTitle) {
  if (Notification.permission === "granted") {
    // if so, create a notification
    var notification = new Notification(notificationTitle);
  }
}


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
      }
    });
  })
   .catch(function(err) {
    console.log('Service Worker registration failed: ', err);
  });
}


if ('serviceWorker' in navigator) {
  navigator.serviceWorker.ready.then(function(reg) {

    reg.pushManager.subscribe({
      userVisibleOnly: true,
      applicationServerKey: urlBase64ToUint8Array(publicVapidKey)
    }).then(function(sub) {
      console.log('Endpoint URL: ', sub.endpoint);
    }).catch(function(e) {
      if (Notification.permission === 'denied') {
        console.warn('Permission for notifications was denied');
      } else {
        console.error('Unable to subscribe to push', e);
      }
    });
  })
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
