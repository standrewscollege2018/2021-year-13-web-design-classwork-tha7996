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

const pushSubscription = {"endpoint":"https://fcm.googleapis.com/fcm/send/cQsYrjRmzsU:APA91bGMmglCCrZVbImkVCvbowMdbjNhiFSU_5DPXqGRK1yTrpJ4D1-2ylNYiesxcVSVuONju-vPipBWG3Pk5sgDdntShj7LInJ2TNdvAgF2SiSG58xnWZk9J0HmdBN33MD-nftqihhA","expirationTime":null,"keys":{"p256dh":"BPwvGbG_59YPtkMvDadgDh96yzu_WZxYULXLlyUlp3KWgQE3gH6luqwdZBNOmlq4BrYGmKzOGBOjc5lyILjK-yc","auth":"s9BsXsw5s9y7aWuDW0q5-A"}};

    // webPush API function. Sends notfication
webPush.sendNotification(
  pushSubscription,
  payload,
  options
).catch(err => console.error(err));
