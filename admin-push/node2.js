const webPush = require('web-push');
const fetch = require('node-fetch');

// VAPID keys
const vapidPublicKey = 'BDD_zKtxaL_P25T2C7AjeenIND2VabW2qBn6tsHyib3-ICZLZ1ovxh5ID1Ilh-EvDw9Fz-sNiJcp37SpCqVKahQ';
const vapidPrivateKey = '0IqLNVKDgPSNz8sHL9eDGQguPnYqolZzIEJCyX2xUJY';

// will be set using fetch later
var pushSubscriptions;
const payload = 'Do your quizzes!!!';
const options = {
  TTL: 60,

  vapidDetails: {
    subject: 'mailto: tobyharvie@gmail.oom',
    publicKey: vapidPublicKey,
    privateKey: vapidPrivateKey
  }

};

const pushSubscription = {"endpoint":"https://fcm.googleapis.com/fcm/send/cFtLxrBo4rc:APA91bF6Oyw7YysJ9cogQsJOTzb0vIFX6IBLzzR42meTwCBM9tqLSQ2qyecRoTov6cXCPs1sRfRSr4yFWyYIJwm7Fdz5wnKmfK6lArhnhSIv99-HToEWA39l_JB-KJ3FZA8A1FeuhscY","expirationTime":null,"keys":{"p256dh":"BLlGCDOXDo0jleVpkk_ylTcQ4SubKC_Le9RlfjKBxsQOWmB82OG0Wab_-q82zlq177oqY1SU2fSZCqK1tO0zKOQ","auth":"mWF0GcbOBYzCKPuWglq_-Q"}}

    // webPush API function. Sends notfication
webPush.sendNotification(
  pushSubscription,
  payload,
  options
).catch(err => console.error(err));
