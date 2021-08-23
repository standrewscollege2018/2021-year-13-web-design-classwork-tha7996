const webPush = require('web-push');
const fetch = require('node-fetch');

// VAPID keys
const vapidPublicKey = 'BDD_zKtxaL_P25T2C7AjeenIND2VabW2qBn6tsHyib3-ICZLZ1ovxh5ID1Ilh-EvDw9Fz-sNiJcp37SpCqVKahQ';
const vapidPrivateKey = '0IqLNVKDgPSNz8sHL9eDGQguPnYqolZzIEJCyX2xUJY';

// will be set using fetch later
var pushSubscriptions;
const payload = 'Here is a payload!';
const options = {
  TTL: 60,

  vapidDetails: {
    subject: 'mailto: tobyharvie@gmail.oom',
    publicKey: vapidPublicKey,
    privateKey: vapidPrivateKey
  }

};

// get subscrbed user's subscriptions using php and mysql
fetch('http://localhost/2021-year-13-web-design-classwork-tha7996/admin-push/getusers.php')
  .then((response) => response.json())
  // pass responses to function to send notifcations. data is in form of json array
  .then(data => sendEachNotifcation(data))

function sendEachNotifcation(pushSubscriptions){

  for(var i = 0; i < pushSubscriptions.length; i++) {
    // push subscruptions passed as string, thus parse to return to object
    var pushSubscription = JSON.parse(pushSubscriptions[i][0]);

    console.log("Subscription "+(i+1)+":");
    console.log(pushSubscription);

    // webPush API function. Sends notfication
    webPush.sendNotification(
      pushSubscription,
      payload,
      options
    );
  }
}
